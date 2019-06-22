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

function addUser($id, $userName, $email, $pseudo, $userPassword)
{
    $userControl = new User();

    $addUser = $userControl->addUsers($id, $userName, $email, $pseudo, $userPassword);

    var_dump($addUser);

    if ($addUser === false) {
        throw new Exception('Impossible de créer votre compte utilisateur !');
    } else {
        header('Location: index.php?action=log');
    }
}

function logAdmin()
{
    $userControl = new User();

    $user = $userControl->getUser();

    try {
        if (isset($_POST['password']) && $_POST['password'] == 'Mentor007') {
            require 'view/backend/backView.php';
        } elseif ((isset($_SESSION['pseudo']) && $_POST['pseudo'] != 'Jean')
    && (isset($_SESSION['password']) && $_POST['password'] != 'Mentor007')) {
            require 'view/frontend/indexView.php';
        } else {
            require 'view/registrerView.php';
        }
    } catch (Exception $e) {
        echo 'Erreur : '.$e->getMessage();
    }
}

function sDestroy() {
    session_destroy();
    require 'view/frontend/indexView.php';
}