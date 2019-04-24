<?php

require_once("model/Manager.php");

class FrontModel extends Manager
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

}
