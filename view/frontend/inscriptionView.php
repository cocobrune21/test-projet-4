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
</div> <!-- End login -->
<?php require 'template.php'; ?>