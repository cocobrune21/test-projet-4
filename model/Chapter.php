<?php

require_once 'model/Manage.php';

class Chapter extends Manage
{
    public function getChapters()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, numChapter, title, content, DATE_FORMAT(datePostChapter,\'%d/%m/%Y à %Hh%imin%ss\') AS datePostChapter_fr, DATE_FORMAT(dateModifChapter,\'%d/%m/%Y à %Hh%imin%ss\') AS dateModifChapter_fr 
        FROM chapters 
        WHERE id 
        ORDER BY numChapter');

        return $req;
    }

    public function getChapter($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, numChapter, title, content, DATE_FORMAT(datePostChapter,\'%d/%m/%Y à %Hh%imin%ss\') AS datePostChapter_fr, DATE_FORMAT(dateModifChapter,\'%d/%m/%Y à %Hh%imin%ss\') AS dateModifChapter_fr 
        FROM chapters 
        WHERE id=?');
        $req->execute(array($id));
        $post = $req->fetch();

        return $post;
    }

    public function postChapter($numChapter, $title, $content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO chapters(numChapter, title, content, datePostChapter, dateModifChapter) 
        VALUES (?,?,?,NOW(),NOW())');
        $addChapter = $req->execute(array($numChapter, $title, $content));

        return $addChapter;
    }

    public function updateChapter($id, $title, $content)
    {
        $data = [
            'title' => $title,
            'content' => $content,
            'id' => $id,
        ];
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE chapters 
        SET title=:title, content=:content, datePostChapter= NOW(), dateModifChapter= NOW() 
        WHERE id=:id');
        $updateChapter = $req->execute($data);

        return $updateChapter;
    }

    public function delateChapter($idChapter)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE chapters, comments
        FROM chapters LEFT OUTER JOIN comments
        ON chapters.id = comments.chapterLink
        WHERE chapters.id=:idChapter');
        $delateChapter = $req->execute(array('idChapter' => $idChapter));

        return $delateChapter;
    }
}