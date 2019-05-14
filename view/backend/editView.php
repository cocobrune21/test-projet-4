<?php ob_start(); ?>


<h5>Modifier un chapitre</h5>

<nav aria-label="Navigation chapter" class="nav_chapter">Chapitres
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="index.php?action=chapterView&amp;id=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li class="page-item"><a class="page-link" href="index.php?action=chapterView&amp;id=1">1</a>
        </li>
        <li class="page-item"><a class="page-link" href="index.php?action=chapterView&amp;id=2">2</a>
        </li>
        <li class="page-item"><a class="page-link" href="index.php?action=chapterView&amp;id=3">3</a>
        </li>
        <li class="page-item"><a class="page-link" href="index.php?action=chapterView&amp;id=4">4</a>
        </li>
        <li class="page-item"><a class="page-link" href="index.php?action=chapterView&amp;id=5">5</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="index.php?action=chapterView&amp;id=2" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>


<div id="write">
    <div class="input-group">
        <form action="index.php?action=editChapter&amp;$postId=?" method="post">
            <input type="text" class="form-control" id="title" name="title"
                placeholder="<?= htmlspecialchars($post['title']); ?>">
            <textarea id="script" name="script"><?= nl2br(htmlspecialchars($post['script'])); ?></textarea>
            <span class="input-group-btn">
                <input type="submit" class="btn btn-primary" id="btn-chat" value="Modifier">
            </span>
        </form>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'view/template.php'; ?>