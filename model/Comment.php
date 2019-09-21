<?php

require_once 'model/Manage.php';

class Comment extends Manage
{
    public function getAllComments()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, chapterLink, autor, content, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr, report 
        FROM comments 
        ORDER BY date_comment DESC');

        return $req;
    }

    public function getOneComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, chapterLink, autor, content, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr, report 
        FROM comments 
        WHERE id= ?');
        $req->execute(array($id));
        $comment = $req->fetch();

        return $comment;
    }

    public function getCommentChapter($postId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('SELECT id, chapterLink, autor, content, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr, report 
        FROM comments 
        WHERE chapterLink = ? 
        ORDER BY date_comment DESC');
        $comment->execute(array($postId));

        return $comment;
    }

    public function postComment($postId, $autor, $content)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('INSERT INTO comments(chapterLink, autor, content, date_comment, report) VALUES (?, ?, ?, NOW(),0)');
        $addComment = $comment->execute(array($postId, $autor, $content));

        return $addComment;
    }

    public function updateComment($id, $content, $autor)
    {
        $data = [
            'id' => $id,
            'content' => $content,
            'autor' => $autor,
        ];
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments 
        SET content =:content, autor =:autor, date_comment=NOW()  
        WHERE id=:id');
        $updateComment = $req->execute($data);

        return $updateComment;
    }

    public function reportComment($id, $report)
    {
        $data = [
            'id' => $id,
            'report' => $report,
        ];
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments 
        SET report=:report 
        WHERE id=:id');
        $reportComment = $req->execute($data);

        return $reportComment;
    }

    public function delateComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id=:id');
        $delateComment = $req->execute(array('id' => $id));

        return $delateComment;
    }
}