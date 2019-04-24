<?php setcookie('identity' , $_POST['identity'], time() + 365*24*3600, null, null, false, true); ?>
<?php setcookie('password' , $_POST['password'], time() + 365*24*3600, null, null, false, true); ?>

<?php
    if (isset($_POST['password']) AND $_POST['password'] ==  "Mentor007")
    {
        require 'view/frontend/manageView.php';
    }
    elseif ((isset($_COOKIE['identity']) AND $_POST['identity'] != Jean) 
    && (isset($_POST['password']) AND $_POST['password'] !=  "Mentor007")) 
    {
        require 'view/frontend/indexView.php';
    }  
    else 
    {
        require 'view/frontend/inscriptionView.php');
    }
    ?>

<?php

/* control log + message */

if(isset($_POST['identity']) AND isset($_POST['message']))
{
    $db = $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', '');
    $req = $db->prepare('INSERT INTO posts(autor, post) VALUES (?, ?)');
    $req->execute(array($_POST['identity'], $_POST['message']));
}


?>