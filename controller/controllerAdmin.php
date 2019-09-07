<?php

require_once 'model/Chapter.php';
require_once 'model/Comment.php';

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

function addChapter($page, $title, $script)
{
    $chapterManager = new Chapter();
    $pageSearch = new Pagination();

    $pageExiste = $pageSearch->searchhapterExiste();
    $lastPage = $pageSearch->lastChapter();
    $firstChapter = $pageSearch->firstChapter();

    $thisPage = $lastPage['page'];

    $page = $_SESSION['page'];

    if ($page == $pageExiste['page']) {
        $page = $thisPage + 1;
        $addChapter = $chapterManager->postChapter($page, $title, $script);
        if ($addChapter === false) {
            throw new Exception('Impossible d\'ajouter le chapitre !');
        } else {
            header('Location: index.php?action=chapterView&id='.$firstChapter['id'].';&page=1');
        }
    } else {
        $addChapter = $chapterManager->postChapter($page, $title, $script);
        if ($addChapter === false) {
            throw new Exception('Impossible d\'ajouter le chapitre !');
        } else {
            header('Location: index.php?action=chapterView&id=?;&page='.$page);
        }
    }
}

function editChapter($id, $title, $script)
{
    $editManager = new Chapter();

    $newChapter = $editManager->updateChapter($id, $title, $script);

    if ($newChapter === false) {
        throw new Exception('Impossible de modifier le chapitre !');
    } else {
        header('Location: index.php?action=chapterView&id='.$id);
    }
}

function delateChapter($id)
{
    $delateManager = new Chapter();

    $supChapter = $delateManager->delateChapter($id);

    if ($supChapter === false) {
        throw new Exception('Impossible de supprimer le chapitre !');
    } else {
        header('Location: index.php?action=chapterView&id='.$id);
    }
}

function getAllComment()
{
    $commentManager = new Comment();
    $allComments = $commentManager->getAllComments();

    require 'view/backend/commentView.php';
}

function viewEditComment()
{
    $backComment = new Comment();

    $oneComment = $backComment->getOneComment($_GET['id']);

    require 'view/backend/editComment.php';
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
        header('Location: index.php?action=getAllComment');
    }
}