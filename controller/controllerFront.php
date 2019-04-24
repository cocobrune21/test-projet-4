<?php

require_once('model/Chapter.php');
require_once('model/Post.php');

function frontView()
{
    $frontChapter = new Chapter();
    $req = $frontChapter-> getChapters();
    $comments = $frontChapter-> getCommentChapter();

    $frontPost = new Post();
    $postsVisitors = $frontPost-> getPostsVisitors();

    require 'view/frontend/indexView.php';
}

function manageAutor()
{
    $manageChapter = new Chapter();
    $addChapter = $manageChapter-> postChapter();
    $updateChapter = $manageChapter-> updateChapter();

    require 'view/frontend/manageView.php';
}