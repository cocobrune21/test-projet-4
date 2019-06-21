<?php

require_once 'model/Chapter.php';
require_once 'model/Comment.php';

function frontView()
{
    require 'view/frontend/indexView.php';
}

function chapterView()
{
    $frontChapter = new Chapter();
    $commentManager = new Comment();

    $comment = $commentManager->getCommentChapter($_GET['id']);

    $post = $frontChapter->getChapter($_GET['id']);
    require 'view/frontend/bookChatView.php';
}

function addComment($postId, $autor, $content)
{
    $commentManager = new Comment();

    $addComment = $commentManager->postComment($postId, $autor, $content);

    try {
        if ($addComment === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } elseif ((isset($_SESSION['pseudo']) && $_POST['pseudo'] != 'Jean')
    && (isset($_SESSION['password']) && $_POST['password'] != 'Mentor007')) {
            header('Location: index.php?action=chapterView&id='.$postId);
        } else {
            require 'view/registrerView.php';
        }
    } catch (Exception $e) {
        echo 'Erreur : '.$e->getMessage();
    }
}