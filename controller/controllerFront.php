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

    try {
        if (isset($_SESSION['pseudo']) && $_SESSION['password']) {
            $autor = $_SESSION['pseudo'];
            $addComment = $commentManager->postComment($postId, $autor, $content);
            header('Location: index.php?action=chapterView&id='.$postId);
        } elseif (!isset($_SESSION['pseudo']) && !isset($_SESSION['password'])) {
            require 'view/logView.php';
        } else {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
    } catch (Exception $error) {
        echo 'Erreur : '.$error->getMessage();
    }
}