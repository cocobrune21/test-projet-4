<?php ob_start(); ?>
<section>
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
</section>

<section>
    <div class="container">
        <div class="row">
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
                        <button type="button" id="supComBtn" class="btn btn-primary sup" data-toggle="modal"
                            data-target="#exampleModal">
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
                                        Etes-vous sur de vouloir supprimer ce commentaire?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Retour</button>
                                        <form class="backEnd"
                                            action="index.php?action=delateComment&id=<?= $data['id']; ?>"
                                            method="post">
                                            <input id="sup" type="submit" class="btn btn-primary" name="id"
                                                value="Supprimer">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>


            <?php
}
?>
        </div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>