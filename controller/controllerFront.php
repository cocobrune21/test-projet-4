<?php

use P4\Model\Chapter;
use P4\Model\Comment;

require_once 'model/Chapter.php';
require_once 'model/Comment.php';

function frontView()
{
    $frontChapter = new Chapter();
    $req = $frontChapter->getChapters();
    /*$comments = $frontChapter->getCommentChapter();*/

    $frontComment = new Comment();
    $postsVisitors = $frontComment->getPostsVisitors();

    require 'view/frontend/indexView.php';
}

function manageAutor()
{
    $manageChapter = new Chapter();
    $addChapter = $manageChapter->postChapter();
    $updateChapter = $manageChapter->updateChapter();

    require 'view/frontend/manageView.php';
}
