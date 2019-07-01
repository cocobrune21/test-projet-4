<?php

require_once 'model/Manage.php';

class User extends Manage
{
    public function getUsers()
    {
        $db = $this->dbConnect();
        $users = $db->query('SELECT id, userAdmin, userName, email, pseudo, userPassword FROM users');

        return $users;
    }

    public function getUser($pseudo)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, userAdmin, userName, email, pseudo, userPassword FROM users WHERE pseudo = :pseudo');
        $req->execute(array(
            'pseudo' => $pseudo,
        ));
        $user = $req->fetch();

        return $user;
    }

    public function addUsers($id, $userAdmin, $userName, $email, $pseudo, $userPassword)
    {
        $db = $this->dbConnect();

        $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $req = $db->prepare('INSERT INTO users(id, userAdmin, userName, email, pseudo, userPassword) VALUES (:id, :userAdmin, :userName, :email, :pseudo, :userPassword)');
        $addUser = $req->execute(array(
            'id' => $id,
            'userAdmin' => $userAdmin,
            'userName' => $userName,
            'email' => $email,
            'pseudo' => $pseudo,
            'userPassword' => $pass_hache,
        ));

        return $addUser;
    }
}