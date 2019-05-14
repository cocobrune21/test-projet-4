<?php

require_once 'model/Chapter.php';
require_once 'model/Comment.php';

function backEnd()
{
    require 'view/backend/backView.php';
}

function addChapter($post_id, $title, $script)
{
    $chapterManager = new Chapter();

    $addChapter = $chapterManager->postChapter($post_id, $title, $script);

    if ($addChapter === false) {
        throw new Exception('Impossible d\'ajouter le chapitre !');
    } else {
        header('Location: index.php?action=chapterView&id=?');
    }
}

function editChapter($postId, $title, $script)
{
    $editManager = new Chapter();

    $editChapter = $editManager->updateChapter(SpostId, $title, $script);

    require 'view/backend/editView.php';

    if ($editChapter === false) {
        throw new Exception('Impossible de modifier le chapitre !');
    } else {
        header('Location: index.php?action=chapterView&id=?');
    }
}