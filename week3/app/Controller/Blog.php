<?php
namespace App\Controller;

use App\Model\Message;
use App\Model\User;
use Base\AbstractController;

class Blog extends AbstractController
{
    public function index()
    {
        if(!$this->getUser())
        {
            $this->redirect('/login');
        }
        $messages = Message::getMessages();
        if($messages)
        {
            $userIds = array_map(function($message) {
                return $message->getAuthorId();
            }, $messages);
            $users = User::getByIds($userIds);
            array_walk($messages, function($message) use ($users) {
                if(isset($users[$message->getAuthorId()]))
                {
                    $message->setAuthor($users[$message->getAuthorId()]);
                }
            });
        }
        return $this->view->render('blog.phtml', [
            'messages' => $messages,
            'user' => $this->getUser()
        ]);
    }

    public function addMessage()
    {
        if(!$this->getUser())
        {
            $this->redirect('/login');
        }

        $text = (string)$_POST['text'];
        if(!$text)
        {
            $this->error('Пустое сообщение');
        }

        $message = new Message([
            'text' => $text,
            'author_id' => $this->getUserId(),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if(isset($_FILES['image']['tmp_name']))
        {
            $message->loadFile($_FILES['image']['tmp_name']);
        }

        $message->save();
        $this->redirect('/blog');
    }

    private function error()
    {

    }
}
