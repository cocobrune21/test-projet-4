<?php

function getChapters()
{
    $db = dbConnect();
    $req = $db->query('SELECT id, title, script FROM episodes LIMIT 1');

    return $req;
}

function getPostsVisitors()
{
    $db = dbConnect();
    $postsVisitors = $db->query('SELECT id, autor, post, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_post_fr FROM posts ORDER BY date_post DESC  LIMIT 0, 4');

    return $postsVisitors;
}

function getPost($postId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT id, autor, post, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_post_fr FROM posts WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}

function getComments($postId)
{
    $db = dbConnect();
    $comments = $db->prepare('SELECT id, autor, content, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments WHERE id_post = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));

    return $comments;
}

function dbConnect()
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', '');

        return $db;
    } catch (Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}
