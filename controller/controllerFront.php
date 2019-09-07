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