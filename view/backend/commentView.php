<?php ob_start(); ?>

<div class="adminAutor">
    <h4>Bonjour Jean !</h4>
    <p>Que souhaitez vous faire aujourd'hui ?</p>
    <ul>
        <li><a href="index.php?action=backEnd">Ecrire un nouveau chapitre ?</a></li>
        <li><a href="#edit">Modifier un chapitre ?</a></li>
        <li><a href="index.php?action=getComment&amp;id=1">Accéder aux commentaires ?</a></li>
        <li><a href="index.php?action=frontView">Retourner sur le site ?</a></li>
    </ul>
</div>

<h5>Tous les commentaires</h5>

<nav aria-label="Navigation chapter" class="nav_chapter">Modérer les commentaires
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="index.php?action=getComment&amp;id=12" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li class="page-item"><a class="page-link" href="index.php?action=getComment&amp;id=12">1</a>
        </li>
        <li class="page-item"><a class="page-link" href="index.php?action=getComment&amp;id=13">2</a>
        </li>
        <li class="page-item"><a class="page-link" href="index.php?action=getComment&amp;id=14">3</a>
        </li>
        <li class="page-item"><a class="page-link" href="index.php?action=getComment&amp;id=15">4</a>
        </li>
        <li class="page-item"><a class="page-link" href="index.php?action=getComment&amp;id=16">5</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="index.php?action=getComment&amp;id=12" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>




<?php
    while ($comments = $comment->fetch()) {
        ?>
<div class="comment">

    <h6><?= htmlspecialchars($comments['autor']); ?></h6>
    <p><?= nl2br($comments['content']); ?></p>
    <p class="nav-fluid startChapter">
        <a href="index.php?action=viewEditComment&amp;id=<?= $comments['id']; ?>" class="btn btn-primary">Modérer</a>
    </p>

</div>
<?php
    }
    $comment->closeCursor();
    ?>

</div>


<?php $content = ob_get_clean(); ?>

<?php require 'view/template.php'; ?>