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

function logUser($name, $password)
{
    $userControl = new User();

    $user = $userControl->getUser($name);

    $isPasswordCorrect = password_verify($password, $user['userPassword']);

    try {
        if ($user) {
            $_SESSION['logUser'] = $user['userAdmin'];
            if ($user['userAdmin'] == true) {
                require 'view/backend/backView.php';
            } else {
                header('Location: index.php?action=chapterView&id=13&page=1');
            }
        } else {
            require 'view/registrerView.php';
        }
    } catch (Exception $error) {
        echo 'Erreur : '.$error->getMessage();
    }
}

function logout()
{
    session_destroy();
    header('Location: index.php?action=log');
}