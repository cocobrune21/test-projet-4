<?php ob_start(); ?>
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
                                    <p><?= nl2br(htmlspecialchars($comments['content'])); ?></p>
                            <time><?= htmlspecialchars($comments['autor']); ?>•
                                <?= $comments['date_comment_fr']; ?></time>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-2 avatar">
                        <img src="public/images/TypewriterWithHands.jpg" class=" img-responsive ">
                    </div> 
                </div> -->
                                          <?php
    while ($comments = $comment->fetch()) {
        ?>
                <div class="row msg_container base_receive">
                    <div class="col-md-2 col-xs-2 avatar">
                        <img src="public/images/Comment.jpg" class=" img-responsive ">
                    </div>
                    <div class="col-md-10 col-xs-10">
                        <div class="messages msg_receive">
                            <p><?= //nl2br(htmlspecialchars($comments['content'])); ?></p>
                            <time><?= //htmlspecialchars($comments['autor']); ?>•
                                <?= //$comments['date_comment_fr']; ?></time>
                            <a class="btn btn-danger btn-sm" href="#">Signaler</a>
                        </div>
                    </div>
                </div>
            </div>
       
            <div class="panel-footer">
                <div class="input-group">
                    <form action="index.php?action=addComment&amp;id=<?=// $comments['id']; ?>" method="post">
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
            ?> -->
    </div> <!-- End chat -->
    <?php $contentChat = ob_get_clean(); ?>

    <?php ob_start(); ?>
    <div class="card col-xs-12 col-lg-3 autor">
        <!-- Start autor -->
        <img src="public/images/Autor.jpg" class="card-img-top" alt="Jean Forteroche">
        <hr class="separate">
        <div class="card-body">
            <h4>Jean Forteroche</h4>
            <p class="card-text">Acteur écrivain et aventurier, j'ai décider de mettre en ligne et
                de pulier les épisodes de prochain roman au fur et à mesure de leurs rédactions.
                Ce nouveau roman est un roman auto-biographique, qui a sa conclusion, je l'espère, sauvera le
                monde.
            </p>
        </div>
    </div> <!-- End autor -->
    <?php $contentAutor = ob_get_clean(); ?>

    <?php ob_start(); ?>
    <div class="card col-xs-12 col-lg-4 login">
        <!-- Start login -->
        <div class="card-header">
            <h5 id="connect">Se connecter</h5>
        </div>
        <div class="card-body">
            <form>
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" id="autor" name="autor" placeholder="pseudo">
                </div>
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control" name="password" placeholder="mot de passe">
                </div>
                <div class="row align-items-center remember">
                    <input type="checkbox">Se souvenir de moi
                </div>
                <div class="form-group">
                    <input type="submit" value="Connexion" class="btn float-right login_btn">
                </div>
            </form>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-center links">
                Vous n'avez pas de compte ?<a href="inscriptionView.php">S'enregistrer</a>
            </div>
        </div>
    </div> <!-- End login -->
</div> <!-- END CONTAINER CHAT AUTOR LOGIN -->
<footer class="row.fluid">
        <div class="col-lg-12 footer">
            Pied de page
        </div>
    </footer>
<?php $contentLogin = ob_get_clean(); ?>

