<?php

class FrontModel
{ 

    public function getChapters()
{
    $db = $this->dbConnect();
    $req = $db->query('SELECT id, title, script FROM episodes LIMIT 1');

    return $req;
}

    public function getPostsVisitors()
{
    $db = $this->dbConnect();
    $postsVisitors = $db->query('SELECT id, autor, post, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_post_fr FROM posts ORDER BY date_post DESC  LIMIT 1');

    return $postsVisitors;
}

    public function getCommentsAutor()
{
    $db = $this->dbConnect();
    $comments = $db->query('SELECT id, autor, content, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments ORDER BY date_comment');

    return $comments;
}

    private function dbConnect()
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', '');

        return $db;
    } catch (Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}
}
