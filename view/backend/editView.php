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

<h5>Modifier un chapitre</h5>

<nav aria-label="Navigation chapter" class="nav_chapter">Chapitres
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="index.php?action=prevBackChapter&amp;id=<?= $post['id']; ?>"
                aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>

        <li class="page-item">
            <a class="page-link" href="index.php?action=viewEditChapter&amp;id=">1</a>
        </li>

        <li class="page-item">
            <a class="page-link" href="index.php?action=nextBackChapter&amp;id=<?= $post['id']; ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>


<div id="edit">
    <div class="input-group">
        <form class="backEnd" action="index.php?action=editChapter&amp;id=<?= $post['id']; ?>" method="post">
            <input type="text" class="form-control" id="title" name="title"
                value="<?= htmlspecialchars($post['title']); ?>">
            <textarea id="script" name="script"><?= nl2br(htmlspecialchars($post['script'])); ?></textarea>
            <div class="editDel">
                <input type="submit" class="btn btn-primary btn-chat" name="editChapter" value="Modifier">
        </form>
        <form class="backEnd" action="index.php?action=delateChapter&amp;id=<?= $post['id']; ?>" method="post">
            <input type="submit" class="btn btn-primary btn-chat" name="id" value="Supprimer">
        </form>
    </div>

</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>