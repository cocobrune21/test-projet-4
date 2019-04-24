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

/*dessus controller avant regroupement dans controllerFront en une seule fonction*/

<? php

class Manager
{
    protected function dbConnect()
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', '');
    
            return $db;
        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }
}

/*dessus manager en class qui ne marche pas*/