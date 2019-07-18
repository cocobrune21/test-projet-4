<?php ob_start();
?>

<div class="container">
    <!--start container chapter chat-->
    <div class="row">
        <!-- Start chapter -->

        <article class="col-lg-8 chapter">

            <div class="chapterHeader">
                <nav aria-label="Navigation chapter" class="nav_chapter">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="index.php?action=prevChapter&amp;id=<?= $post['id']; ?>"
                                aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php    while ($req = $paginChapter->fetch()) {
    ?>
                        <li class="page-item">
                            <a class="page-link" href="index.php?action=paginChapters&amp;id=<?= $req['id']; ?>">
                                1</a>
                        </li>
                        <?php
}
 $req->closeCursor();
            ?>

                        <li class="page-item">
                            <a class="page-link" href="index.php?action=nextChapter&amp;id=<?= $post['id']; ?>"
                                aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <h2 class="display-4"><?= htmlspecialchars($post['title']); ?></h2>
            </div>

            <hr class="my-4">

            <p class="lead"><?= nl2br($post['script']); ?></p>
        </article> <!-- end chapter -->

        <!--container chat -->
        <article class="col-lg-4 chatContainer">
            <div class="row chat-window" id="chat_window_1">
                <div class="panel-heading top-bar">
                    <div class="col-md-8 col-xs-8">
                        <h3 class="panel-title">Café littéraire</h3>
                    </div>
                </div>
                <!-- Start container_chat -->
                <aside class="col-lg-12 col-xs-12 col-md-12">
                    <!-- Start chat -->
                    <div class="panel panel-default">
                        <div class="row msg_container">

                            <?php    while ($comments = $comment->fetch()) {
                ?>

                            <?php
                            try {
                                if ($comments['autor'] == 'Jean') {
                                    ?>

                            <div class=" col-md-10 col-xs-10 ">
                                <div class=" messages msg_sent ">
                                    <p>
                                        <?= nl2br(htmlspecialchars($comments['content'])); ?>
                                    </p>
                                    <time>
                                        <?= htmlspecialchars($comments['autor']); ?> •
                                        <?= $comments['date_comment_fr']; ?> </time>
                                </div>
                            </div>
                            <div class="col-md-2 avatar col-xs-2">
                                <img src="public/images/TypewriterWithHands.jpg" alt="Mains sur une machine à écrire"
                                    class="img-responsive">
                            </div>

                            <?php
                                } else {
                                    ?>

                            <div class="col-md-2 col-xs-2 avatar">
                                <?php try {
                                        if ($comments['report'] == 1) {
                                            ?>
                                <img src="public/images/Anger.png" alt="Smiley en colère" class="img-responsive">
                                <?php
                                        } else {
                                            ?>
                                <img src="public/images/Comment.jpg" alt="Bulle de commentaire" class="img-responsive">
                                <?php
                                        }
                                    } catch (Exception $error) {
                                        echo 'Erreur : '.$error->getMessage();
                                    } ?>

                            </div>
                            <div class="col-md-10 col-xs-10">
                                <div class="messages msg_receive">
                                    <?php
                                        try {
                                            if ($comments['report'] == 1) {
                                                ?>
                                    <p><span id="report">Contenu signalé en attente de modération</span></p>
                                    <?php
                                            } else {
                                                ?>
                                    <p><?= nl2br($comments['content']); ?></p>

                                    <time><?= htmlspecialchars($comments['autor']); ?>•
                                        <?= $comments['date_comment_fr']; ?></time>
                                    <form action="index.php?action=reportComment&amp;id=<?= $comments['id']; ?>"
                                        method="post">

                                        <input type="number" name="report" class="phantomButtom" value=1>
                                        <input type="submit" class="btn btn-danger btn-sm" value='Signaler'>
                                    </form>
                                    <?php
                                            }
                                        } catch (Exception $error) {
                                            echo 'Erreur : '.$error->getMessage();
                                        } ?>
                                </div>
                            </div>
                            <?php
                                }
                            } catch (Exception $error) {
                                echo 'Erreur : '.$error->getMessage();
                            } ?>
                            <?php
            }
 $comment->closeCursor();
            ?>
                        </div>
                    </div>




                </aside>
                <div class="panel-footer">
                    <div class="input-group">
                        <form action="index.php?action=addComment&amp;id=<?= $post['id']; ?>" method="post">
                            <input type="text" id="content" name="content" class="form-control input-sm chat_input"
                                placeholder="Votre message ici..." />
                            <span class="input-group-btn">
                                <input type="text" class="form-control" id="autor" name="autor"
                                    value="<?= isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : ''; ?>"
                                    placeholder="<?= !isset($_SESSION['pseudo']) ? 'Pseudo' : ''; ?>">
                                <input type="submit" class="btn btn-primary" id="btn-chat" value="Envoyer">
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </article><!-- end chat -->

    </div><!-- end row chat chapter -->
</div> <!-- end container_chapter_chat -->

<?php $content = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>