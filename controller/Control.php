<?php

namespace controller;

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $episodes = getPost($_GET['id']);
    $comments = getComments($_GET['id']);
    require 'vendor/autoload.php';
} else {
    echo 'Erreur : aucun identifiant de billet envoyé';
}
