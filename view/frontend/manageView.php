<?php ob_start(); ?>

    <div class="container">
     
    <div id="manage">
    <h1>Heureux de vous revoir Jean</h1>
    <p><strong>Quoi de neuf aujourd'hui ?</strong></p>  
    </div>
        

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
                        <div class="row msg_container base_sent">
                            <div class="col-md-10 col-xs-10">
                                <div class="messages msg_sent">
                                    <?php
while ($comment = $comments->fetch()) {
        ?>

                                    <p><?= nl2br(htmlspecialchars($comment['content'])); ?></p>
                                    <time><?= htmlspecialchars($comment['autor']); ?>•
                                        <?= $comment['date_comment_fr']; ?></time>

                                    <?php
    }
$comments->closeCursor();
?>

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
                                    <?php
while ($postVisitor = $postsVisitors->fetch()) {
    ?>

                                    <p><?= nl2br(htmlspecialchars($postVisitor['post'])); ?></p>
                                    <time><?= htmlspecialchars($postVisitor['autor']); ?>•
                                        <?= $postVisitor['date_post_fr']; ?></time>

                                    <?php
}
$postsVisitors->closeCursor();
?>

                                    <a class="btn btn-danger btn-sm" href="#">Signaler</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="input-group">
                            <input type="text" class="form-control input-sm chat_input"
                                placeholder="Votre message ici..." />
                            <span class="input-group-btn">
                                <button class="btn btn-primary" id="btn-chat">Envoyer</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div> <!-- End chat -->

           

    </div> <!-- END DIV CONTAINER -->

    <?php $content = ob_get_clean(); ?>
    <?php require 'template.php'; ?>