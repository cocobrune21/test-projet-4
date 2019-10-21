<?php

require_once 'config.php';

class Manage
{
    protected function dbConnect()
    {
        $dsn = 'mysql:host='.dbHost.';dbname='.dbBase;
        try {
            $db = new PDO($dsn, dbUser, dbPassword, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            return $db;
        } catch (Exception $error) {
            die('Erreur : '.$error->getMessage());
        }
    }
}