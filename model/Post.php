<?php 

class Post
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

    /*Ajouter fonction pour ajouter un post et une pour supprimer */
    /*Ou alors voir pour faire un constructeur de post et lui attribuer des méthodes*/


    private function dbConnect()
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', '');
    
            return $db;
        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

}
