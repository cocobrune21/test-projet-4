<?php ob_start(); ?>
<header class="row">
    <div class="col-md-12 text-center">
        <h1 class="mt-0 mb-3">Billet simple pour l'Alaska</h1>
        <div class="breadcrumbs">
            <p class="mb-0 text-white"><a class="text-white" href="#connect">Se connecter</a></p>
        </div>
    </div>
</header>


<div class="row container_chapter">
    <!-- Start container_chapter -->

    <div class="col-lg-12 chapter">
        <!-- Start chapter -->
        <h2 class="display-4"><?= htmlspecialchars($post['title']); ?></h2>
        <hr class="my-4">
        <nav aria-label="Navigation chapter" class="nav_chapter">Chapitres
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="index.php?action=chapterView&amp;id=1" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="index.php?action=chapterView&amp;id=1">1</a></li>                
                <li class="page-item">
                    <a class="page-link" href="index.php?action=chapterView&amp;id=2" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
        <p class="lead"><?= nl2br(htmlspecialchars($post['script'])); ?></p>
    </div> <!-- End chapter -->

</div> <!-- End container_chapter -->

<div class="container_chat_autor_login">
    <!-- Start container_chat -->
    <div class="row chat-window col-xs-12 col-lg-5" id="chat_window_1">
        <!-- Start chat -->
        <div class="panel panel-default">
            <div class="panel-heading top-bar">
                <div class="col-md-8 col-xs-8">
                    <h3 class="panel-title">Café littéraire</h3>
                </div>
            </div>
            <div class="panel-body msg_container_base">
                <?php
    while ($comments = $comment->fetch()) {
        ?>
                <div class="row msg_container base_sent">
                    <div class="col-md-10 col-xs-10">
                        <div class="messages msg_sent">
                            <p><?= nl2br(htmlspecialchars($comments['content'])); ?></p>
                            <time><?= htmlspecialchars($comments['autor']); ?>•
                                <?= $comments['date_comment_fr']; ?></time>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-2 avatar">
                        <img src="public/images/TypewriterWithHands.jpg" class=" img-responsive ">
                    </div>
                </div>

                <div class="row msg_container base_receive">
                    <div class="col-md-2 col-xs-2 avatar">
                        <img src="public/images/Comment.jpg" class=" img-responsive ">
                    </div>
                    <div class="col-md-10 col-xs-10">
                        <div class="messages msg_receive">
                            <p><?= nl2br(htmlspecialchars($comments['content'])); ?></p>
                            <time><?= htmlspecialchars($comments['autor']); ?>•
                                <?= $comments['date_comment_fr']; ?></time>
                            <a class="btn btn-danger btn-sm" href="#">Signaler</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-footer">
                <div class="input-group">
                    <form action="index.php?action=addComment&amp;id=<?= $post['id']; ?>" method="post">
                        <input type="text" id="content" name="content" class="form-control input-sm chat_input"
                            placeholder="Votre message ici..." />
                        <span class="input-group-btn">
                            <input type="text" class="form-control" id="autor" name="autor" placeholder="pseudo">
                            <input type="submit" class="btn btn-primary" id="btn-chat" value="Envoyer">
                        </span>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }
            $comment->closeCursor();
            ?>
    </div> <!-- End chat -->


    <?php $content = ob_get_clean(); ?>

    <?php require 'template.php'; ?>