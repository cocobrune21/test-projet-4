<?php ob_start(); ?>

<div class="adminAutor">
    <h4>Bonjour Jean !</h4>
    <p>
        <img src=".\public\images\Typewriter.jpg" class="imgTyp">
    </p>
    <div class="navAutor">
        <ul>
            <li><a href="index.php?action=backEnd">Ecrire un nouveau chapitre </a></li>
            <li><a href="index.php?action=viewEditChapter&id=13">Modifier un chapitre </a></li>
            <li><a href="index.php?action=getAllComment">Accéder aux commentaires </a></li>
            <li><a href="index.php?action=chapterView&id=13&page=1">Retourner sur le site </a></li>
        </ul>
    </div>
    <h5>Tous les commentaires</h5>
</div>

<?php
while ($data = $allComments->fetch()) {
    ?>

<div class="comment">
    <article class="commentContent">
        <h6 class="titleName"><?= htmlspecialchars($data['autor']); ?></h6>

        <p><?= nl2br($data['content']); ?></p>
    </article>
    <article class="allComments">
        <div id="manageComment">
            <p>
                <a id="modif" href="index.php?action=viewEditComment&id=<?= $data['id']; ?>"
                    class="btn btn-primary">Modifier</a>
            </p>
            <?php
            if ($data['report'] == 1) {
                ?>
            <form action="index.php?action=reportComment&id=<?= $data['id']; ?>" method="post">
                <input type="number" name="report" class="phantomButtom" value=0>
                <input id="accept" type="submit" class="btn btn-primary" value='Accepter'>
            </form>
            <?php
            } ?>
            <form class="backEnd" action="index.php?action=delateComment&id=<?= $data['id']; ?>" method="post">
                <input id="sup" type="submit" class="btn btn-primary" name="id" value="Supprimer">
            </form>
        </div>
    </article>
</div>


<?php
}
?>



<?php $content = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>