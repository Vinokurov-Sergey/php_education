<?php
namespace Base;
class Session
{
    public function init()
    {
        session_start();
    }

    public function authUser($id)
    {
        $_SESSION['user_id'] = $id;
    }

    public function getSessionUserId()
    {
        return $_SESSION['user_id'] ?? false;
    }
}
