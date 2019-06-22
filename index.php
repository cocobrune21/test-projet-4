<?php

session_start();

require_once __DIR__.'/vendor/autoload.php';
require_once 'controller/ControllerView.php';
require_once 'controller/ControllerAdmin.php';
require_once 'controller/ControllerUser.php';

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'frontView') {
            frontView();
        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] >= 0) {
                if (!empty($_POST['autor']) && !empty($_POST['content'])) {
                    addComment($_GET['id'], $_POST['autor'], $_POST['content']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'chapterView') {
            chapterView();
        } elseif ($_GET['action'] == 'registrer') {
            registrer();
        } elseif ($_GET['action'] == 'backEnd') {
            backEnd();
        } elseif ($_GET['action'] == 'log') {
            loggin();
        } elseif ($_GET['action'] == 'logAdmin') {
            logAdmin();
        } elseif ($_GET['action'] == 'addUser') {
            addUser($_GET['id'], $_POST['userName'], $_POST['email'], $_POST['pseudo'], $_POST['userPassword']);
        } elseif ($_GET['action'] == 'sDestroy') {
            sDestroy();
        } elseif ($_GET['action'] == 'addChapter') {
            if (!empty($_POST['title']) && !empty($_POST['script'])) {
                addChapter($_GET['id'], $_POST['title'], $_POST['script']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        } elseif ($_GET['action'] == 'viewEditChapter') {
            viewEditChapter();
        } elseif ($_GET['action'] == 'editChapter') {
            if (!empty($_POST['title']) && !empty($_POST['script'])) {
                editChapter($_GET['id'], $_POST['title'], $_POST['script']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        } elseif ($_GET['action'] == 'delateChapter') {
            if (isset($_GET['id']) && $_GET['id'] >= 0) {
                delateChapter($_GET['id']);
            } else {
                throw new Exception('Nous ne pouvons répondre à votre demande !');
            }
        } elseif ($_GET['action'] == 'getAllComment') {
            getAllComment();
        } elseif ($_GET['action'] == 'viewEditComment') {
            viewEditComment();
        } elseif ($_GET['action'] == 'editComment') {
            if (!empty($_POST['content']) && !empty($_POST['autor'])) {
                editComment($_GET['id'], $_POST['content'], $_POST['autor']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        } elseif ($_GET['action'] == 'delateComment') {
            if (isset($_GET['id']) && $_GET['id'] >= 0) {
                delateComment($_GET['id']);
            } else {
                throw new Exception('Nous ne pouvons répondre à votre demande !');
            }
        }
    } else {
        frontView();
    }
} catch (Exception $e) {
    echo 'Erreur : '.$e->getMessage();
}