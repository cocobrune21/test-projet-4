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

    public function getChapter($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, script, DATE_FORMAT(date_post_episode,\'%d/%m/%Y à %Hh%imin%ss\') AS date_post_episode_fr FROM chapters WHERE id=?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function postChapter($post_id, $title, $script)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO `chapters`(`id`, `title`, `script`, `date_post_episode`, `dat_modif_episode`) VALUES (?,?,?,NOW(),NOW())');
        $addChapter = $req->execute(array($post_id, $title, $script));

        return $addChapter;
    }

    public function updateChapter($postId, $title, $script)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE chapters SET script = :newScript WHERE title = :newTitle');
        $updateChapter = $req->execute(array(
        'newpost' => $postId,
        'newScript' => $script,
        'newtitle' => $title,
    ));

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