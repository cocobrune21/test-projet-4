<?php ob_start();
?>

<div class="container">
    <!--start container chapter chat-->
    <div class="row">
        <!-- Start chapter -->

        <article class="col-lg-8 chapter">
            <h2 class="display-4"><?= htmlspecialchars($post['title']); ?></h2>
            <hr class="my-4">
            <nav aria-label="Navigation chapter" class="nav_chapter">Chapitres
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="index.php?action=chapterView&amp;id=12" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="index.php?action=chapterView&amp;id=12">1</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="index.php?action=chapterView&amp;id=13">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="index.php?action=chapterView&amp;id=14">3</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="index.php?action=chapterView&amp;id=15">4</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="index.php?action=chapterView&amp;id=16">5</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="index.php?action=chapterView&amp;id=17" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <p class="lead"><?= nl2br($post['script']); ?></p>
        </article> <!-- end chapter -->

        <!--container chat -->
        <div class="col-lg-4">
            <div class="row">
                <!-- Start container_chat -->
                <aside class="col-md-12" id="chat_window_1">
                    <!-- Start chat -->
                    <div class="panel panel-default">
                        <div class="panel-heading top-bar">
                            <div class="col-md-8 col-xs-8">
                                <h3 class="panel-title">Café littéraire</h3>
                            </div>
                        </div>
                        <div class="panel-body msg_container_base">

                            <div class="row msg_container base_receive">
                                <?php    while ($comments = $comment->fetch()) {
    ?>
                                <div class="col-md-2 col-xs-2 avatar">
                                    <img src="public/images/Comment.jpg" class="angry">
                                </div>
                                <div class="col-md-10 col-xs-10">
                                    <div class="messages msg_receive">
                                        <?php
                                            if ($comments['report'] == 1) {
                                                ?>
                                        <p><img src="public/images/Anger.png" alt="Contenu signalé" /></p>
                                        <?php
                                            } else {
                                                ?>
                                        <p><?= nl2br($comments['content']); ?></p>

                                        <time><?= htmlspecialchars($comments['autor']); ?>•
                                            <?= $comments['date_comment_fr']; ?></time>
                                        <form action="index.php?action=reportComment&amp;id=<?= $comments['id']; ?>"
                                            method="post">

                                            <input type="number" name="report" class="phantomButtom" value=1>
                                            <input type="submit" id="report" class="btn btn-danger btn-sm"
                                                value='Signaler'>
                                        </form>
                                        <?php
                                            } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
}
            $comment->closeCursor();
            ?>

                        <div class="panel-footer">
                            <div class="input-group">
                                <form action="index.php?action=addComment&amp;id=<?= $post['id']; ?>" method="post">
                                    <input type="text" id="content" name="content"
                                        class="form-control input-sm chat_input" placeholder="Votre message ici..." />
                                    <span class="input-group-btn">
                                        <input type="text" class="form-control" id="autor" name="autor"
                                            value="<?= isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : ''; ?>"
                                            placeholder="<?= !isset($_SESSION['pseudo']) ? 'pseudo' : ''; ?>">
                                        <input type="submit" class="btn btn-primary" id="btn-chat" value="Envoyer">
                                    </span>
                                </form>
                            </div>
                        </div>
                    </div>
                </aside> <!-- end chat -->
            </div>
        </div>
    </div><!-- end container chat -->
</div> <!-- end container_chapter_chat -->

<?php $content = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>