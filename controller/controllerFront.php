<?php

use P4\Model\Chapter;
use P4\Model\Comment;

require_once 'model/Chapter.php';
require_once 'model/Comment.php';

function frontView()
{
    $frontChapter = new Chapter();
    $commentManager = new Comment();

    $comment = $commentManager->getCommentChapter(1);

    $post = $frontChapter->getChapter(1);
    require 'view/frontend/indexView.php';
}

function chapterView()
{
    $frontChapter = new Chapter();
    $commentManager = new Comment();

    $comment = $commentManager->getCommentChapter($_GET['id']);

    $post = $frontChapter->getChapter($_GET['id']);
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

    $addComment = $commentManager->postComment($postId, $autor, $content);

    if ($addComment === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?action=chapterView&id='.$postId);
    }
}
