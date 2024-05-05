<?php

class BurgerOrders
{
    public function getUserByEmail($email){
        $db = Db::getInstance();
        $query = "SELECT * FROM `users` WHERE `email` = :email";
        return $db->fetchOne($query, __METHOD__, [':email' => $email]);
    }

    public function createUser($email, $name, $phone)
    {
        $db = Db::getInstance();
        $query = "INSERT INTO `users` (`email`, `name`, `phone`) VALUES (:email, :name, :phone)";
        $result = $db->exec($query, __METHOD__, [':email' => $email, ':name' => $name, ':phone' => $phone]);
        if (!$result){
            return false;
        }
        return $db->lastInsertId();
    }

    public function orderInc($user_id)
    {
        $db = Db::getInstance();
        $query = "UPDATE `users` SET `orders_count` = `orders_count` + 1 WHERE `id` = $user_id";
        return $db->exec($query, __METHOD__);
    }

    public function addOrder($user_id, array $data)
    {
        $db = Db::getInstance();
        $query = "INSERT INTO `orders` (`user_id`, `created_at`, `address`) VALUES (:user_id, :created_at, :address)";
        $result = $db->exec($query, __METHOD__, [
            ':user_id' => $user_id,
            ':created_at' => date('Y-m-d H:i'),
            ':address' => $data['address']
        ]);
        if (!$result){
            return false;
        }
        return $db->lastInsertId();
    }

}