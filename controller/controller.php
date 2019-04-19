<?php

require('model/model.php');

function listChapter()
{
    $req = getChapters();

    require 'view/frontend/chapterView.php';
}

function listComment()
{
    if (isset($_GET['id']) && $_GET['id'] > 0) {
        $post = getPost($_GET['id']);
        $comments = getComments($_GET['id']);
 
        require 'view/frontend/commentView.php';
    } 
    else 
    {
        echo 'Erreur : aucun identifiant de billet envoyé';
    }
}

function listPost()
{
    $postsVisitors = getPostsVisitors();

    require 'view/frontend/postView.php';
}