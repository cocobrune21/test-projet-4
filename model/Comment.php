<?php

namespace P4\Model;

require_once 'model/Manage.php';

class Comment extends Manage
{
    public function getComment()
    {
        $db = $this->dbConnect();
        $comment = $db->query('SELECT id, autor, content, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments ORDER BY date_comment DESC  LIMIT 1');

        return $comment;
    }

    public function getCommentChapter($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, autor, content, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments WHERE id = ?');
        $req->execute(array($commentId));
        $commentChapter = $req->fetch();

        return $commentChapter;
    }

    public function postComment($commentId, $autor, $content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO comments(id_comment, autor, content, date_comment) VALUES (?, ?, ?, NOW())');
        $addComment = $req->execute(array($commentId, $_POST['identity'], $_POST['message']));

        return $addComment;
    }

    public function delateComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE (id_comment, autor, content, date_comment)');
        $delateComment = $req->execute(array($commentId, $autor, $content, $date_comment));

        return $delateComment;
    }
}
