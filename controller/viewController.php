<?php

require_once 'model/Chapter.php';
require_once 'model/Comment.php';
require_once 'model/Pagination.php';

function frontView()
{
    require 'view/frontend/indexView.php';
}

function chapterView()
{
    $frontChapter = new Chapter();
    $commentManager = new Comment();
    $pagin = new Pagination();

    $data = $pagin->countPage();
    $nbrChapt = $data['nbrChapt'];

    $id = $_GET['id'];

    try {
        if ($id) {
            $comment = $commentManager->getCommentChapter($id);
            $oneCommentReport = $commentManager->getOneComment($id);
            $post = $frontChapter->getChapter($id);
            $currentChapter = $frontChapter->getChapters();

            require 'view/frontend/bookChatView.php';
        } else {
            echo 'RIEN';
        }
    } catch (Exception $error) {
        echo 'Erreur : '.$error->getMessage();
    }
}

function viewEditChapter()
{
    $backChapter = new Chapter();
    $pagin = new Pagination();

    $data = $pagin->countPage();
    $nbrChapt = $data['nbrChapt'];

    $post = $backChapter->getChapter($_GET['id']);
    $currentChapter = $backChapter->getChapters();

    require 'view/backend/editView.php';
}

function viewEditComment()
{
    $backComment = new Comment();

    $oneComment = $backComment->getOneComment($_GET['id']);

    require 'view/backend/editComment.php';
}