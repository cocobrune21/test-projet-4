<?php ob_start(); ?>

<div id="error">
    <p>ATTENTION<br />DES CHAMPS SONT VIDES OU INCORRECTS
    </p>
    <p class="nav-fluid startChapter">
        <a href="index.php?action=chapterView&id=13&page=1" class="btn btn-primary">Retourner à la lecture</a>
    </p>
</div>



<?php $content = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>