<?php

namespace P4\Model;

require_once 'model/Manage.php';

class Comment extends Manage
{
    public function getCommentChapter($postId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('SELECT id, autor, content, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments WHERE id_comment = ? ORDER BY date_comment DESC LIMIT 1');
        $comment->execute(array($postId));

        return $comment;
    }

    public function postComment($postId, $autor, $content)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('INSERT INTO comments(id_comment, autor, content, date_comment) VALUES (?, ?, ?, NOW())');
        $addComment = $comment->execute(array($postId, $autor, $content));

        return $addComment;
    }

    public function updateComment($content, $date_comment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET content = :newContent WHERE date_comment = :newDate');
        $updateChapter = $req->execute(array(
        'newContent' => $newContent,
        'newDate' => $newDate,
    ));

        return $updateComment;
    }

    public function delateComment($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE (id_comment, autor, content, date_comment)');
        $delateComment = $req->execute(array($postId, $autor, $content, $date_comment));

        return $delateComment;
    }
}
