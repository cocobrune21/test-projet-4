<?php

require_once 'model/User.php';

function registrer()
{
    require 'view/registrerView.php';
}

function loggin()
{
    require 'view/logView.php';
}

function backEnd()
{
    require 'view/backend/backView.php';
}

function addUser($userName, $email, $pseudo, $userPassword)
{
    $userControl = new User();

    $email = $_POST['email'];
    $regEx = "#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#";

    if (preg_match($regEx, $email)) {
        $addUser = $userControl->addUsers($userName, $email, $pseudo, $userPassword);
        header('Location: index.php?action=log');
    } else {
        require 'view/registrerView.php';
    }
}

function logUser($pseudo, $userPassword)
{
    $userControl = new User();

    $user = $userControl->getUser($pseudo);

    $postPass = $_POST['password'];
    $pass = $user['userPassword'];

    if ($user) {
        if (password_verify($postPass, $pass)) {
            $_SESSION['logUser'] = $user['userAdmin'];
            if ($user['userAdmin'] == true) {
                require 'view/backend/backView.php';
            } else {
                header('Location: index.php?action=chapterView&id=13&page=1');
            }
        } else {
            error();
        }
    } else {
        require 'view/registrerView.php';
    }
}

function error()
{
    require 'view/errorView.php';
}

function logout()
{
    session_destroy();
    header('Location: index.php?action=log');
}