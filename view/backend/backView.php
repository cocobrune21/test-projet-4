<?php ob_start(); ?>

<div class="adminAutor">
    <h5>Bonjour Jean !</h5>
    <p>Que souhaitez vous faire aujourd'hui ?</p>
    <ul>
        <li><a href="#write">Ecrire un nouveau chapitre ?</a></li>
        <li><a href="index.php?action=editChapter">Modifier un chapitre ?</a></li>
        <li><a href="#moderate">Modérer les commentaires ?</a></li>
        <li><a href="index.php?action=frontView">Retourner sur le site ?</a></li>
    </ul>
</div>


<div id="write">
    <div class="input-group">
        <form action="index.php?action=addChapter&amp;$post_id=?" method="post">
            <input type="text" class="form-control" id="title" name="title" placeholder="Titre">
            <textarea id="script" name="script">Votre texte ici...</textarea>
            <span class="input-group-btn">
                <input type="submit" class="btn btn-primary" id="btn-chat" value="Poster">
            </span>
        </form>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require 'view/template.php'; ?>