<?php

require_once 'model/Manage.php';

class Chapter extends Manage
{
    public function getChapters()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, script, DATE_FORMAT(date_post_episode,\'%d/%m/%Y à %Hh%imin%ss\') AS date_post_episode_fr FROM chapters ORDER BY date_post_episode LIMIT 1');

        return $req;
    }

    public function getChapter($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, script, DATE_FORMAT(date_post_episode,\'%d/%m/%Y à %Hh%imin%ss\') AS date_post_episode_fr, DATE_FORMAT(dat_modif_episode,\'%d/%m/%Y à %Hh%imin%ss\') AS dat_modif_episode_fr FROM chapters WHERE id=?');
        $req->execute(array($id));
        $post = $req->fetch();

        return $post;
    }

    public function postChapter($post_id, $title, $script)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO chapters(id, title, script, date_post_episode, dat_modif_episode) VALUES (?,?,?,NOW(),NOW())');
        $addChapter = $req->execute(array($post_id, $title, $script));

        return $addChapter;
    }

    public function updateChapter($id, $title, $script)
    {
        $data = [
            'title' => $title,
            'script' => $script,
            'id' => $id,
        ];
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE chapters SET title=:title, script=:script, date_post_episode= NOW(), dat_modif_episode= NOW() WHERE id=:id');
        $updateChapter = $req->execute($data);

        return $updateChapter;
    }

    public function delateChapter($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM chapters WHERE (title, script, date_post_episode, dat_modif_episode)');
        $delateChapter = $req->execute(array($postId, $title, $script, $date_post_episode, $dat_modif_episode));

        return $delateChapter;
    }
}