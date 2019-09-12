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

<h5>Modérer</h5>




<div id="moderate">

    <div class="input-group">
        <form class="backEnd" action="index.php?action=editComment&id=<?= $oneComment['id']; ?>" method="post">
            <input type="text" class="form-control" id="autor" name="autor"
                value="<?= htmlspecialchars($oneComment['autor']); ?>">
            <textarea id="commentEdit" name="content"><?= nl2br($oneComment['content']); ?></textarea>
            <div class="editDel">
                <input type="submit" class="btn btn-primary btn-chat" name="editComment" value="modifier">
        </form>
    </div>

</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>