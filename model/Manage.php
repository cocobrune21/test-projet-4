<?php

namespace P4\Model;

class Manage
{
    protected function dbConnect()
    {
        try {
            $db = new \PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', '');

            return $db;
        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }
}
