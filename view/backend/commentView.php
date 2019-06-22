<?php ob_start(); ?>

<div class="adminAutor">
    <h4>Bonjour Jean !</h4>
    <p>Que souhaitez vous faire aujourd'hui ?</p>
    <ul>
        <li><a href="index.php?action=backEnd">Ecrire un nouveau chapitre ?</a></li>
        <li><a href="#edit">Modifier un chapitre ?</a></li>
        <li><a href="index.php?action=getAllComment">Accéder aux commentaires ?</a></li>
        <li><a href="index.php?action=frontView">Retourner sur le site ?</a></li>
    </ul>
</div>

<h5>Tous les commentaires</h5>
<?php
while ($data = $allComments->fetch()) {
    ?>

<div class="comment">

    <h6><?= htmlspecialchars($data['autor']); ?></h6>
    <p><?= nl2br($data['content']); ?></p>
    <div class="nav-fluid startChapter allComments">
        <span><a href="index.php?action=viewEditComment&amp;id=<?= $data['id']; ?>"
                class="btn btn-primary">Modifier</a></span>
        <span>
            <form class="backEnd" action="index.php?action=delateComment&amp;id=<?= $data['id']; ?>" method="post">
                <input type="submit" class="btn btn-primary btn-chat" name="id" value="Supprimer">
            </form>
        </span>
    </div>

</div>

<?php
}
?>



<?php $content = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>