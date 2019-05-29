<?php ob_start(); ?>

<div class="adminAutor">
    <h4>Bonjour Jean !</h4>
    <p>Que souhaitez vous faire aujourd'hui ?</p>
    <ul>
        <li><a href="index.php?action=backEnd">Ecrire un nouveau chapitre ?</a></li>
        <li><a href="#edit">Modifier un chapitre ?</a></li>
        <li><a href="#moderate">Modérer les commentaires ?</a></li>
        <li><a href="index.php?action=frontView">Retourner sur le site ?</a></li>
    </ul>
</div>

<h5>Modifier un chapitre</h5>

<nav aria-label="Navigation chapter" class="nav_chapter">Chapitres
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="index.php?action=viewEditChapter&amp;id=12" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li class="page-item"><a class="page-link" href="index.php?action=viewEditChapter&amp;id=12">1</a>
        </li>
        <li class="page-item"><a class="page-link" href="index.php?action=viewEditChapter&amp;id=13">2</a>
        </li>
        <li class="page-item"><a class="page-link" href="index.php?action=viewEditChapter&amp;id=14">3</a>
        </li>
        <li class="page-item"><a class="page-link" href="index.php?action=viewEditChapter&amp;id=15">4</a>
        </li>
        <li class="page-item"><a class="page-link" href="index.php?action=viewEditChapter&amp;id=16">5</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="index.php?action=viewEditChapter&amp;id=2" aria-label="Next">
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
            <span class="input-group-btn">
                <input type="submit" class="btn btn-primary btn-chat" name="editChapter" value="Modifier le chapitre">
        </form>
        <form class="backEnd" action="index.php?action=delateChapter&amp;id=<?= $post['id']; ?>" method="post">
            <input type="submit" class="btn btn-primary btn-chat" name="id" value="Supprimer">

        </form>
        </span>

    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'view/template.php'; ?>