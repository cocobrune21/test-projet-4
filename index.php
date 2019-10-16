<?php
 session_start();

 try {
     if (isset($_POST['password']) && (isset($_POST['pseudo']))) {
         $_SESSION['password'] = $_POST['password'];
         $_SESSION['pseudo'] = $_POST['pseudo'];
     }
 } catch (Exception $error) {
     echo 'Erreur : '.$error->getMessage();
 }

 try {
     if (isset($_POST['numChapter'])) {
         $_SESSION['page'] = $_POST['numChapter'];
     }
 } catch (Exception $error) {
     echo 'Erreur : '.$error->getMessage();
 }

require_once __DIR__.'/vendor/autoload.php';

require_once 'controller/chaptersController.php';
require_once 'controller/commentsController.php';
require_once 'controller/userController.php';

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'frontView') {
            frontView();
        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] >= 0) {
                if (isset($_POST['autor']) && isset($_POST['content'])) {
                    addComment($_GET['id'], $_POST['autor'], $_POST['content']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'chapterView') {
            chapterView();
        } elseif ($_GET['action'] == 'nextChapter') {
            nextChapter();
        } elseif ($_GET['action'] == 'prevChapter') {
            prevChapter();
        } elseif ($_GET['action'] == 'registrer') {
            registrer();
        } elseif ($_GET['action'] == 'backEnd') {
            backEnd();
        } elseif ($_GET['action'] == 'log') {
            loggin();
        } elseif ($_GET['action'] == 'logUser') {
            logUser($_POST['pseudo'], $_POST['password']);
        } elseif ($_GET['action'] == 'addUser') {
            addUser($_POST['userName'], $_POST['email'], $_POST['pseudo'], $_POST['userPassword']);
        } elseif ($_GET['action'] == 'logout') {
            logout();
        } elseif ($_GET['action'] == 'addChapter') {
            if (isset($_POST['numChapter']) && isset($_POST['title']) && isset($_POST['content'])) {
                addChapter($_POST['numChapter'], $_POST['title'], $_POST['content']);
            } else {
                throw new Exception('Vous avez déjà un chapitre a ce numéro !');
            }
        } elseif ($_GET['action'] == 'viewEditChapter') {
            viewEditChapter();
        } elseif ($_GET['action'] == 'nextBackChapter') {
            nextBackChapter();
        } elseif ($_GET['action'] == 'prevBackChapter') {
            prevBackChapter();
        } elseif ($_GET['action'] == 'editChapter') {
            if (isset($_POST['title']) && isset($_POST['content'])) {
                editChapter($_GET['id'], $_POST['title'], $_POST['content']);
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
        } elseif ($_GET['action'] == 'reportComment') {
            var_dump($_POST['report']);
            var_dump($_GET['id']);
            reportComment($_GET['id'], $_POST['report']);
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