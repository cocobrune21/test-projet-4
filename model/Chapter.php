<?php

require_once("model/Manage.php");

class Chapter extends Manage
{

    public function getChapters()
    {
    $db = $this->dbConnect();
    $req = $db->query('SELECT id, title, script FROM episodes LIMIT 1');

    return $req;
    }

    public function getChapter($episodeId)
    {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT id, title, script FROM episodes WHERE id=?');
    $req->execute(array($episodeId));
    $episode = $req->fetch();

    return $episode;
    }
  
    public function postChapter($episodeId, $title, $script)
    {
    $db = $this->dbConnect();
    $req = $db->prepare('INSERT INTO episodes(title, script) VALUES (?, ?');
    $addChapter = $req->execute(array($episodeId, $_POST['title'], $_POST['script']));
   
    return $addChapter;
    }

    public function updateChapter($title, $script)
    {
    $db = $this->dbConnect();
    $req = $db->prepare('UPDATE episodes SET script = :newScript WHERE title = :newTitle');
    $updateChapter = $req->execute(array(
        'newScript' => $_POST['script'],
        'newtitle' => $_POST['title']
    ));
   
    return $updateChapter;
    }

    public function getCommentChapter($episodeId)
    {
    $db = $this->dbConnect();
    $commentVisitors = $db->prepare('SELECT id, autor, post, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_post_fr FROM posts WHERE id_post = ? ORDER BY date_post DESC');
    $commentVisitors->execute(array($episodeId));

    return $commentVisitors;
    }

}