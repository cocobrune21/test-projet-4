<?php

require_once 'model/Chapter.php';
require_once 'model/Comment.php';

function backEnd()
{
    require 'view/backend/backView.php';
}

function viewEditChapter()
{
    $backChapter = new Chapter();

    $post = $backChapter->getChapter($_GET['id']);

    require 'view/backend/editView.php';
}

function addChapter($post_id, $title, $script)
{
    $chapterManager = new Chapter();

    $addChapter = $chapterManager->postChapter($post_id, $title, $script);

    if ($addChapter === false) {
        throw new Exception('Impossible d\'ajouter le chapitre !');
    } else {
        header('Location: index.php?action=chapterView&id='.$post_id);
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