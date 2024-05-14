<?php
namespace App\Model;
//use Db;

use Base\Db;

class Message
{
    private $id;
    private $text;
    private $createdAt;
    private $authorId;
    /** @var User */
    private $author;
    private $image;


    public function __construct($data) {
        $this->text = $data['text'];
        $this->createdAt = $data['created_at'];
        $this->authorId = $data['author_id'];
        $this->image = $data['image'] ?? '';
    }

    public static function deleteMessage(int $messageId)
    {
        $db = Db::getInstance();
       // $query = "DELETE FROM messages WHERE id = $messageId";
        return $db->exec("DELETE FROM messages WHERE id = $messageId", __METHOD__);
    }

    public function save()
    {
        $db = Db::getInstance();
        $result = $db->exec(
            "INSERT INTO messages (`text`, `created_at`, `author_id`, `image`) 
                    VALUES (:text, :created_at, :author_id, :image)",
            __FILE__,
            [':text' => $this->text,
            ':created_at' => $this->createdAt,
            ':author_id' => $this->authorId,
            ':image' => $this->image
        ]);
        return $result;
    }

    public static function getMessages()
    {
        $db = Db::getInstance();
        $data = $db->fetchAll('SELECT * FROM (SELECT * FROM messages ORDER BY `id` DESC LIMIT 20) 
                                        sub ORDER BY `id` ASC',__METHOD__);
        if (!$data)
        {
            return [];
        }
        $messages = [];

        foreach ($data as $item)
        {
            $message = new self($item);
            $message->id = $item['id'];
            $messages[] = $message;
        }

        return $messages;
    }

    public static function getUserMessages($userId)
    {
        $db = Db::getInstance();
        $data = $db->fetchAll("SELECT * FROM (SELECT * FROM messages WHERE `author_id` = $userId 
                                      ORDER BY `id` DESC LIMIT 20) sub ORDER BY `id` ASC",__METHOD__);
        if (!$data)
        {
            return [];
        }
        $messages = [];

        foreach ($data as $item)
        {
            $message = new self($item);
            $message->id = $item['id'];
            $messages[] = $message;
        }

        return $messages;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }

    public function setAuthor(User $author)
    {
        $this->author = $author;
    }

    public function loadFile($file)
    {
        if (file_exists($file))
        {
            $this->image = $this->createFileName();
            move_uploaded_file($file, getcwd() . '/images/' . $this->image);
        }
    }

    private function createFileName()
    {
        return sha1(microtime(1) . mt_rand(0,99999999) . '.jpg');
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    public function getData()
    {
        return [
            'id' => $this->id,
            'text' => $this->text,
            'created_at' => $this->createdAt,
            'author_id' => $this->authorId,
            'image' => $this->image
        ];
    }

}
