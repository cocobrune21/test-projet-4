<?php

require_once('model/FrontModel.php');

function listChapter()
{
    $frontModel = new FrontModel();
    $req = $frontModel-> getChapters();

    require 'view/frontend/chapterView.php';
}

function listComment()
{
    $frontModel = new FrontModel();
    $comments = $frontModel-> getCommentsAutor();
 
    require 'view/frontend/commentView.php';
}

function listPost()
{
    $frontModel = new FrontModel();
    $postsVisitors = $frontModel-> getPostsVisitors();

    require 'view/frontend/postView.php';
}

/*dessus controller*/