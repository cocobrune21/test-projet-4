<?php

require_once 'model/Chapter.php';
require_once 'model/Comment.php';

function addChapter($page, $title, $script)
{
    $chapterManager = new Chapter();

    $pageExiste = $chapterManager->searchChapterExiste();
    $lastPage = $chapterManager->lastChapter();
    $firstChapter = $chapterManager->firstChapter();

    $thisPage = $lastPage['numChapter'];

    $page = $_SESSION['page'];

    if ($page == $pageExiste['numChapter']) {
        $page = $thisPage + 1;
        $addChapter = $chapterManager->postChapter($page, $title, $script);
        if ($addChapter === false) {
            throw new Exception('Impossible d\'ajouter le chapitre !');
        } else {
            header('Location: index.php?action=chapterView&id='.$firstChapter['id'].'&page=1');
        }
    } else {
        $addChapter = $chapterManager->postChapter($page, $title, $script);
        if ($addChapter === false) {
            throw new Exception('Impossible d\'ajouter le chapitre !');
        } else {
            header('Location: index.php?action=chapterView&id=?&page='.$page);
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
        viewEditChapter();
    }
}