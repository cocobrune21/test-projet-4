<?php ob_start();
?>


<div class="containerInscription containerLogAuthor">
    <div class="row">
        <!-- Start login -->
        <aside class="card col-md-12 login">
            <div class="card-header">
                <h5 id="connect">S'enregistrer</h5>
            </div>
            <div class="card-body">
                <form class="backEnd" action="index.php?action=addUser" method="post">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                        </div>
                        <input type="text" class="form-control" id="userName" name="userName" placeholder="Votre nom">
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email">
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="pseudo">
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" name="userPassword" placeholder="mot de passe">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Enregistrer" class="btn float-left login_btn">
                    </div>
                </form>
            </div>

        </aside> <!-- End inscription -->
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>