<?php

require_once 'model/Manage.php';

class User extends Manage
{
    public function getUser()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, userName, email, pseudo, userPassword FROM users');
        $user = $req->fetch();

        return $user;
    }

    public function addUsers($id, $userName, $email, $pseudo, $userPassword)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO users(id, userName, email, pseudo, userPassword) VALUES (?,?,?,?,?)');
        $addUser = $req->execute(array($id, $userName, $email, $pseudo, $userPassword));

        return $addUser;
    }
}