<?php

namespace P4\Model;

require_once 'model/Manage.php';

class Chapter extends Manage
{
    public function getChapters()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, script FROM chapters LIMIT 1');

        return $req;
    }

    public function getChapter($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, script FROM chapters WHERE id=?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function postChapter($postId, $title, $script)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO chapters(title, script) VALUES (?, ?');
        $addChapter = $req->execute(array($postId, $_POST['title'], $_POST['script']));

        return $addChapter;
    }

    public function updateChapter($title, $script)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE chapters SET script = :newScript WHERE title = :newTitle');
        $updateChapter = $req->execute(array(
        'newScript' => $_POST['script'],
        'newtitle' => $_POST['title'],
    ));

        return $updateChapter;
    }
}
