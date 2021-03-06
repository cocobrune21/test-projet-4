<?php ob_start(); ?>

<div class="adminAutor">
    <h4>Bonjour Jean !</h4>
    <p>
        <img src=".\public\images\Typewriter.jpg" class="imgTyp">
    </p>
    <div class="navAutor">
        <ul>
            <li><a href="index.php?action=backEnd">Ecrire un nouveau chapitre ?</a></li>
            <li><a href="#edit">Modifier un chapitre ?</a></li>
            <li><a href="index.php?action=getAllComment">Accéder aux commentaires ?</a></li>
            <li><a href="index.php?action=chapterView&id=13&page=1">Retourner sur le site ?</a></li>
        </ul>
    </div>
    <h5>Modifier un chapitre</h5>
</div>

<nav aria-label="Navigation chapter" class="nav_chapter">
    <ul class="pagination">

        <?php
             $indexPage = 1;
                            for ($page = 1; $page <= $nbrChapt; ++$page) {
                                while ($currentPage = $currentChapter->fetch()) {
                                    $page = $currentPage['numChapter']; ?>

        <li class="page-item">
            <a class="page-link_back"
                href="index.php?action=viewEditChapter&id=<?=$currentPage['id']; ?>& page=<?= $page; ?> ">
                <?= $indexPage++; ?></a>
        </li>
        <?php
                                }
                            }?>

    </ul>
</nav>


<div id="edit">
    <div class="input-group">
        <form class="backEnd" action="index.php?action=editChapter&id=<?= $post['id']; ?>" method="post">
            <input type="text" class="form-control titleName" name="title"
                value="<?= htmlspecialchars($post['title']); ?>">
            <textarea id="script" name="content"><?= nl2br(htmlspecialchars($post['content'])); ?></textarea>
            <div class="editDel">
                <input type="submit" class="btn btn-primary btn-chat" name="editChapter" value="Modifier">
        </form>
        <button type="button" lass="btn btn-primary sup" data-toggle="modal" data-target="#exampleModal">
            Supprimer
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">ATTENTION</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Etes-vous sur de vouloir supprimer ce chapitre ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
                        <form class="backEnd" action="index.php?action=delateChapter&id=<?= $post['id']; ?>"
                            method="post">
                            <input type="submit" class="btn btn-primary sup" name="id" value="Supprimer">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>




<?php $content = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>