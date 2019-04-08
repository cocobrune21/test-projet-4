<?php
require('model/frontend/postView.php');

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $episodes = getPost($_GET['id']);
    $comments = getComments($_GET['id']);
    require('view/frontend.php');
}
else {
    echo 'Erreur : aucun identifiant de billet envoyé';
}

 