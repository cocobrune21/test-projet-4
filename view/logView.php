<?php ob_start(); ?>

<div class="containerLogAuthor">
    <div class="row">
        <!-- Start login -->
        <aside class="card col-md-12 login">
            <div class="card-header">
                <h5 id="connect">Se connecter</h5>
            </div>
            <div class="card-body">
                <form class="backEnd" action="index.php?action=logAdmin&amp;id=?" method="post">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="pseudo" placeholder="pseudo">
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="mot de passe">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Connexion" class="btn float-right login_btn">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Vous n'avez pas de compte ?<a href="index.php?action=registrer">S'enregistrer</a>
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


<?php $content = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>