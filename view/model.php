<?php

function getChapter()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : '.$e->getMessage());
    }

    $req = $bdd->query('SELECT id, title, script FROM episodes LIMIT 1');

    return $req;
}

function getPost()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : '.$e->getMessage());
    }

    $postComment = $bdd->query('SELECT id, autor, comments, DATE_FORMAT(date_comments, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comments_fr FROM comments ORDER BY date_comments DESC  LIMIT 0, 4');

    return $postComment;
}
