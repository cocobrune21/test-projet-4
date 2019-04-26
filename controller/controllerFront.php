<?php

use P4\Model\Chapter;
use P4\Model\Comment;

require_once 'model/Chapter.php';
require_once 'model/Comment.php';

function frontView()
{
    $frontChapter = new Chapter();
    $frontComment = new Comment();
    $req = $frontChapter->getChapters();

    $post = $frontComment->getChapter($_GET['id']);

    $comment = $frontComment->getCommentChapter($_GET['id']);

    require 'view/frontend/indexView.php';
}

function manageAutor()
{
    $manageChapter = new Chapter();

    $addChapter = $manageChapter->postChapter($postId, $title, $script);
    $updateChapter = $manageChapter->updateChapter($title, $script);

    require 'view/frontend/manageView.php';
}

function addComment($postId, $autor, $content)
{
    $commentManager = new Comment();

    $addComment = $commentManager->addComment($postId, $autor, $content);

    if ($addComment === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: indexView.php?action=post&id='.$postId);
    }
}
