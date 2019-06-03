<?php

require_once 'model/Manage.php';

class Comment extends Manage
{
    public function getOneComment($idComment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, id_comment, autor, content, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments WHERE id= ?');
        $req->execute(array($idComment));
        $oneComment = $req->fetch();

        return $oneComment;
    }

    public function getCommentChapter($postId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('SELECT id, id_comment, autor, content, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments WHERE id_comment = ? ORDER BY date_comment DESC LIMIT 0, 5');
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

    public function updateComment($id, $content, $autor)
    {
        $data = [
            'content' => $content,
            'autor' => $autor,
            'idComment' => $id,
        ];
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET content =:content, autor =:autor, date_comment=NOW()  WHERE id_comment =:idComment');
        $updateComment = $req->execute($data);

        return $updateComment;
    }

    public function delateComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id_comment =:idComment');
        $delateComment = $req->execute(array('idComment' => $id));

        return $delateComment;
    }
}