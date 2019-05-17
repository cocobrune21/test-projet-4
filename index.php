<?php

require_once __DIR__.'/vendor/autoload.php';
require_once 'controller/ControllerFront.php';
require_once 'controller/ControllerBackEnd.php';

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
        } elseif ($_GET['action'] == 'registrer') {
            registrer();
        } elseif ($_GET['action'] == 'chapterView') {
            if (isset($_GET['id']) && $_GET['id'] >= 0) {
                chapterView();
            } else {
                throw new Exception('Aucun identifiant de chapitre envoyé');
            }
        }
    } else {
        frontView();
    }
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'backEnd') {
            backEnd();
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
        }
    }
} catch (Exception $e) {
    echo 'Erreur : '.$e->getMessage();
}