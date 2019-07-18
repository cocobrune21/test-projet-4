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

    $addUser = $userControl->addUsers($userName, $email, $pseudo, $userPassword);

    var_dump($addUser);

    if ($addUser === false) {
        throw new Exception('Impossible de créer votre compte utilisateur !');
    } else {
        header('Location: index.php?action=log');
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
            var_dump($_SESSION['logUser']);
            if ($user['userAdmin'] == true) {
                require 'view/backend/backView.php';
            } else {
                header('Location: index.php?action=chapterView&id=12');
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