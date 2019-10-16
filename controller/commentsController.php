<?php

require_once 'model/Comment.php';

function viewEditComment()
{
    $backComment = new Comment();

    $oneComment = $backComment->getOneComment($_GET['id']);

    require 'view/backend/editComment.php';
}

function getAllComment()
{
    $commentManager = new Comment();
    $allComments = $commentManager->getAllComments();

    require 'view/backend/commentView.php';
}

function editComment($id, $content, $autor)
{
    $modifComment = new Comment();

    $newComment = $modifComment->updateComment($id, $content, $autor);

    if ($newComment === false) {
        throw new Exception('Impossible de modifier le commentaire !');
    } else {
        header('Location: index.php?action=getAllComment');
    }
}

function delateComment($id)
{
    $delComment = new Comment();

    $supComment = $delComment->delateComment($id);

    if ($supComment === false) {
        throw new Exception('Impossible de supprimer le commentaire !');
    } else {
        getAllComment();
    }
}

function addComment($postId, $autor, $content)
{
    $commentManager = new Comment();

    $autor = $_SESSION['pseudo'];

    try {
        if (isset($_SESSION['pseudo']) && $_SESSION['password']) {
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

function reportComment($id, $report)
{
    $commentManager = new Comment();

    $reportComment = $commentManager->reportComment($id, $report);

    header('Location: index.php?action=chapterView&id=12');
}