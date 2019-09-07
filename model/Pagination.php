<?php

require_once 'model/Manage.php';

class Pagination extends Manage
{
    public function countPage()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT COUNT(id) as nbrChapt 
        FROM chapters');

        $data = $req->fetch();
        $nbrChapt = $data['nbrChapt'];

        return $data;
    }

    public function searchChapterExiste()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT numChapter 
        FROM chapters 
        WHERE numChapter="'.$_SESSION['page'].'"');

        $pageExiste = $req->fetch();

        return $pageExiste;
    }

    public function lastChapter()
    {
        $db = $this->dbconnect();
        $req = $db->query('SELECT numChapter 
        FROM chapters 
        ORDER BY numChapter DESC LIMIT 1');

        $lastChapter = $req->fetch();

        return $lastChapter;
    }

    public function firstChapter()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id 
        FROM chapters 
        ORDER BY id ASC LIMIT 1');

        $firstChapter = $req->fetch();

        return $firstChapter;
    }
}