<?php
namespace App\Controller;
use App\Model\User;
use Base\AbstractController;

class Login extends AbstractController
{
    public function index() {
        if ($this->getUser())
        {
            $this->redirect('/blog');
        }
        return $this->view->render('register.phtml', [
            'user' => $this->getUser(),
        ]);
    }

    public function register()
    {
        $name = (string)$_POST['name'];
        $email = (string)$_POST['email'];
        $password = (string)$_POST['password'];
        $password2 = (string)$_POST['password2'];

        if (!$name || !$password || !$email)
        {
            return 'Должны быть заданы имя, пароль и email';
        }

        if ($password !== $password2)
        {
            return 'Введенные пароли не совпадают';
        }

        if (mb_strlen($password) < 4)
        {
            return 'Длина пароля должна быть не менее 4-х символов';
        }

        $userData = [
            'name' => $name,
            'created_at' => date('Y-m-d H:i:s'),
            'email' => $email,
            'password' => $password

        ];
        $user = new User($userData);
        $user->save();
        $this->session->authUser($user->getId());
        $this->redirect('/blog');
       // return 'Успешная регистрация';
    }

    public function auth()
    {
        $email = (string)$_POST['email'];
        $password = (string)$_POST['password'];
        $user = User::getByEmail($email);
        if (!$user)
        {
            return 'Неверные email и пароль';
        }

        if ($user->getPassword() !== User::getPasswordHash($password))
        {
            return 'Неверные email и пароль';
        }

        $this->session->authUser($user->getId());

        $this->redirect('/blog');
    }
}
