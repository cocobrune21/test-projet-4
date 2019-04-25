<?php 

namespace P4\Model;

require_once("model/Manage.php");

class Post extends Manage
{
    public function getPostsVisitors()
    {
        $db = $this->dbConnect();
        $postsVisitors = $db->query('SELECT id, autor, post, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_post_fr FROM posts ORDER BY date_post DESC  LIMIT 1');
    
        return $postsVisitors;
    }

    public function getPostVisitor($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, autor, post, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_post_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

   public function postPostVisitor($postId, $autor, $post) 
   {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO posts(id_post, autor, post, date_post) VALUES (?, ?, ?, NOW())');
        $addPost = $req->execute(array($postId, $_POST['identity'], $_POST['message']));
   
        return $addPost;
    }

    public function delatePostVisitor($postId) 
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM posts WHERE (id_post, autor, post, date_post)');
        $delatePost = $req->execute(array($postId, $autor, $post,$date_post));
   
        return $delatePost;
    }

}
