<?php

class Chapter {

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

    public function getCommentChapter($episodeId)
    {
    $db = $this->dbConnect();
    $commentVisitors = $db->prepare('SELECT id, autor, post, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_post_fr FROM posts WHERE id_post = ? ORDER BY date_post DESC');
    $commentVisitors->execute(array($episodeId));

    return $commentVisitors;
    }

    /*ajouter un constructeur et une fonction destructrice*/
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