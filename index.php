<?php

require_once 'controller/ControllerFront.php';

require 'vendor/autoload.php';

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
        } elseif ($_GET['action'] == 'manageAutor') {
            manageAutor();
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
} catch (Exception $e) {
    echo 'Erreur : '.$e->getMessage();
}
