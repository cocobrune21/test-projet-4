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
    $oneCommentReport = $commentManager->getOneComment($_GET['id']);
    $post = $frontChapter->getChapter($_GET['id']);

    require 'view/frontend/bookChatView.php';
}

function prevChapter()
{
    $frontChapter = new Chapter();
    $commentManager = new Comment();

    $id = $_GET['id'];

    try {
        if ($id) {
            $comment = $commentManager->getCommentChapter($id - 1);
            $oneCommentReport = $commentManager->getOneComment($id - 1);
            $post = $frontChapter->getChapter($id - 1);
            require 'view/frontend/bookChatView.php';
        } else {
            header('Location: index.php?action=chapterView');
        }
    } catch (Exception $error) {
        echo 'Erreur : '.$error->getMessage();
    }
}

function paginChapters()
{
    $frontChapter = new Chapter();
    var_dump($frontChapter);

    $paginChapter = $frontChapter->getChaptersAsc();

    require 'view/frontend/bookChatView.php';
}

function nextChapter()
{
    $frontChapter = new Chapter();
    $commentManager = new Comment();

    $post = $frontChapter->getChapter($_GET['id']);

    $id = $_GET['id'];

    try {
        if ($id && ($id == $post['id'])) {
            $comment = $commentManager->getCommentChapter($id + 1);
            $oneCommentReport = $commentManager->getOneComment($id + 1);
            $post = $frontChapter->getChapter($id + 1);
            require 'view/frontend/bookChatView.php';
        } else {
            header('Location: index.php?action=chapterView');
        }
    } catch (Exception $error) {
        echo 'Erreur : '.$error->getMessage();
    }
}

function addComment($postId, $autor, $content)
{
    $commentManager = new Comment();

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