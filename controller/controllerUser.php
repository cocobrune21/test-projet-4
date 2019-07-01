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

function addUser($id, $userAdmin, $userName, $email, $pseudo, $userPassword)
{
    $userControl = new User();

    $addUser = $userControl->addUsers($id, $userAdmin, $userName, $email, $pseudo, $userPassword);

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

      var_dump($user);
    
    try {
        if ($user) {
            if ($user['userAdmin'] == true) {
                require 'view/backend/backView.php';
            } else {
                require 'view/frontend/indexView.php';
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
    require 'view/frontend/indexView.php';
}