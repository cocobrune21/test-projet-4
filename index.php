
<?php
require('controller/controller.php');



if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listChapter') {
        listChapter();
    }
    elseif (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPost')
        listPost();
    }
    elseif ($_GET['action'] == 'listComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            listComment();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
}
else {
    listChapter();
}

