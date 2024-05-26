<?php
namespace App\Controller;

use App\Model\User;

class UsersAdmin extends Admin
{
    public function index()
    {
        return $this->view->render(
            'users.phtml',
            [
                'users' => User::getUsers()
            ]
        );
    }

    public function saveUser()
    {
        $id = (int)$_POST['id'];
        $name = (string)$_POST['name'];
        $email = (string)$_POST['email'];
        $password = (string)$_POST['password'];

        $user = User::getById($id);
        if (!$user)
        {
            return $this->response(['error' => 'Пользователя нет']);
        }

        if (!$name)
        {
            return $this->response(['error' => 'не введено имя']);
        }

        if (!$email)
        {
            return $this->response(['error' => 'не введен email']);
        }

        if ($password && mb_strlen($password) < 4)
        {
            return $this->response(['error' => 'Длина пароля должна быть не менее 4-х символов']);
        }

        $user->name = $name;
        $user->email = $email;
        $emailUser = User::getByEmail($email);
        if ($emailUser && $emailUser->id !== $id)
        {
            return $this->response(['error' => 'email уже существует']);
        }

        if ($password)
        {
            $user->password = User::getPasswordHash($password);
        }

        $user->save();
        return $this->response(['result' => 'Пользователь сохранен']);
    }

    public function deleteUser()
    {
        $id = (int)$_POST['id'];
        $user = User::getById($id);
        if (!$user)
        {
            return $this->response(['error' => 'Такого пользователя нет']);
        }

        $user->delete();
        return $this->response(['result' => 'Пользователь удален']);
    }

    public function addUser()
    {
        $name = (string)$_POST['name'];
        $email = (string)$_POST['email'];
        $password = (string)$_POST['password'];

        if (!$name)
        {
            return $this->response(['error' => 'не введено имя']);
        }

        if (!$email)
        {
            return $this->response(['error' => 'не введен email']);
        }

        if (!$password || mb_strlen($password) < 4)
        {
            return $this->response(['error' => 'Длина пароля должна быть не менее 4-х символов']);
        }

        $emailUser = User::getByEmail($email);
        if ($emailUser)
        {
            return $this->response(['error' => 'email уже существует']);
        }

        $userData = [
            'name' => $name,
            'created_at' => date('Y-m-d H:i:s'),
            'email' => $email,
            'password' => User::getPasswordHash($password)

        ];
        $user = new User($userData);
        $user->save();
        return $this->response(['result' => 'Пользователь добавлен']);
    }

    public function response($data)
    {
        header('Content-type: application/json');
        return json_encode($data);
    }
}
