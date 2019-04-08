<?php
function getEpisodes()
{
    $db = dbConnect();
    $req = $db->query('SELECT id, title, text, DATE_FORMAT date_post_episode FROM episodes ORDER BY date_post_episode DESC LIMIT 0, 5');

    return $req;
} 

function getEpisodes($episodesId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT id, title, text, DATE_FORMAT date_post_episode FROM posts WHERE id = ?');
    $req->execute(array($episodesId));
    $episodes = $req->fetch();

    return $episodes;
}

function getComments($episodesId)
{
    $db = dbConnect();
    $comments = $db->prepare('SELECT id, autor, comments, DATE_FORMAT(date_comments, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comments_fr FROM comments WHERE episodes_id = ? ORDER BY date_comments DESC');
    $comments->execute(array($episodesId));

    return $comments;
}

function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}
