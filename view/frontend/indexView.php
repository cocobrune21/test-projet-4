<?php ob_start(); ?>

<header>
    <div class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <h3 class="navbar">Un roman de Jean Forteroche</h3>
                <nav>
                    <ul class="nav nav-pills">
                        <li class="nav-item nav-link active"><a href=#slide>Accueil</a></li>
                        <li class="nav-item nav-link"><a href="#chat_window_1">Café littéraire</a></li>
                        <li class="nav-item nav-link"><a href="#connect">Connexion</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

<main role="main">
    <section id="slide">
        <div class="jumbotron">
            <h1>Billet simple pour l'Alaska</h1>
            <p class="buttom">
                <a href="#connect" class="btn btn-primary">Connexion</a>
            </p>
        </div>
    </section>


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
                            <a class="page-link" href="index.php?action=chapterView&amp;id=1" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="index.php?action=chapterView&amp;id=1">1</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="index.php?action=chapterView&amp;id=2">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="index.php?action=chapterView&amp;id=2" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="lead"><?= nl2br(htmlspecialchars($post['script'])); ?></p>
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
                                <?php
    while ($comments = $comment->fetch()) {
        ?>
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
                            <?php
    }
            $comment->closeCursor();
            ?>
                            <div class="panel-footer">
                                <div class="input-group">
                                    <form action="index.php?action=addComment&amp;id=<?= $post['id']; ?>" method="post">
                                        <input type="text" id="content" name="content"
                                            class="form-control input-sm chat_input"
                                            placeholder="Votre message ici..." />
                                        <span class="input-group-btn">
                                            <input type="text" class="form-control" id="autor" name="autor"
                                                placeholder="pseudo">
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


    <div class="containerLogAuthor">
        <div class="row">
            <!-- Start login -->
            <aside class="card col-md-12 login">
                <div class="card-header">
                    <h5 id="connect">Se connecter</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" id="author" name="autor" placeholder="pseudo">
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
                <!-- Start autor -->
                <aside class="col-md-4 autor">
                    <img src="public/images/Autor.jpg" class="card-img-top" alt="Jean Forteroche">
                    <hr class="separate">
                    <div class="card-body">
                        <h4>Jean Forteroche</h4>
                        <p class="card-text">Acteur écrivain et aventurier, j'ai décider de mettre en ligne et
                            de pulier les épisodes de prochain roman au fur et à mesure de leurs rédactions.
                            Ce nouveau roman est un roman auto-biographique, qui a sa conclusion, je l'espère,
                            sauvera
                            le
                            monde.
                        </p>
                    </div>
                </aside><!-- End autor -->
            </aside> <!-- End login -->
        </div>
    </div>



</main>











<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>