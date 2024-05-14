<?php
namespace App\Model;

use Base\Db;

class User
{
    private $id;
    private $name;
    private $createdAt;
    private $email;
    private $password;

    public function __construct($data) {
        $this->name = $data['name'];
        $this->createdAt = $data['created_at'];
        $this->email = $data['email'];
        $this->password = $data['password'];
    }

    public static function getByEmail($email)
    {
        $db = Db::getInstance();
        $data = $db->fetchOne('SELECT * FROM `users` WHERE `email` = :email', __METHOD__,
                                        [':email' => $email]);
        if (!$data)
        {
            return null;
        }
        $user = new self($data);
        $user->id=$data['id'];
        return $user;
    }

    public static function getById($id)
    {
        $db = Db::getInstance();
        $data = $db->fetchOne('SELECT * FROM `users` WHERE `id` = :id', __METHOD__,[':id' => $id]);
        if (!$data)
        {
            return null;
        }
        $user = new self($data);
        $user->id=$data['id'];
        return $user;
    }

    public static function getByIds(array $userIds)
    {
        $db = Db::getInstance();
        $idsString = implode(',',$userIds);
        $data = $db->fetchAll("SELECT * FROM `users` WHERE `id` IN ($idsString)",__METHOD__);
        if (!$data)
        {
            return [];
        }
        $users = [];

        foreach ($data as $item)
        {
            $user = new self($item);
            $user->id = $item['id'];
            $users[$user->id] = $user;
        }

        return $users;
    }

    public function save()
    {
        $db = Db::getInstance();
        $result = $db->exec(
            "INSERT INTO users (`name`, `created_at`, `email`, `password`) 
                    VALUES (:name, :created_at, :email, :password)",
            __FILE__,
            [':name' => $this->name,
            ':created_at' => $this->createdAt,
            ':email' => $this->email,
            ':password' => self::getPasswordHash($this->password)]
        );
        $this->id = $db->lastInsertId();

        return $result;
    }

    public static function getPasswordHash(string $password) {
        return sha1('hfoyk7sk1,' . $password);
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    public function isAdmin()
    {
        return in_array($this->id, ADMIN_ID);
    }

}
