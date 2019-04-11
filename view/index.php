<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <title>Billet simple pour l'Alaska</title>
    <link href="../public/css/style.css" rel="stylesheet" />

</head>

<body>
    <!--  ?php
    require 'vendor/autoload.php';
?  -->
    <header class="row">
        <div class="col-md-12 text-center">
            <h1 class="mt-0 mb-3">Billet simple pour l'Alaska</h1>
            <div class="breadcrumbs">
                <p class="mb-0 text-white"><a class="text-white" href="#connect">Se connecter</a></p>
            </div>
        </div>
    </header>

    <div class="container">

        <div class="row container_chapter">

            <div class="col-lg-8 chapter">
                <h2 class="display-4">Ici le titre du chapitre</h2>
                <hr class="my-4">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="lead">Ici le texte</p>
            </div>

            <div class="card col-lg-3 login">
                <div class="card-header">
                    <h3 id="connect">Se connecter</h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="pseudo">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="mot de passe">
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
                        Vous n'avez pas de compte ?<a href="#">S'enregistrer</a>
                    </div>
                </div>
            </div>

        </div> <!-- End container_chapter -->

        <div class="container_chat">
            <div class="row chat-window col-xs-5 col-lg-3" id="chat_window_1">

                <div class="panel panel-default">
                    <div class="panel-heading top-bar">
                        <div class="col-md-8 col-xs-8">
                            <h4 class="panel-title"><span class="glyphicon glyphicon-comment"></span>Café littéraire
                                </h3>
                        </div>
                        <div class="col-md-4 col-xs-4">
                            <a href="#"><span id="minim_chat_window"
                                    class="glyphicon glyphicon-minus icon_minim"></span></a>
                            <a href="#"><span class="glyphicon glyphicon-remove icon_close"
                                    data-id="chat_window_1"></span></a>
                        </div>
                    </div>
                    <div class="panel-body msg_container_base">
                        <div class="row msg_container base_sent">
                            <div class="col-md-10 col-xs-10">
                                <div class="messages msg_sent">
                                    <p>that mongodb thing looks good, huh?
                                        tiny master db, and huge document store</p>
                                    <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                </div>
                            </div>
                            <div class="col-md-2 col-xs-2 avatar">
                                <img src="../public/images/TypewriterWithHands.jpg" class=" img-responsive ">
                            </div>
                        </div>
                        <div class="row msg_container base_receive">
                            <div class="col-md-2 col-xs-2 avatar">
                                <img src="../public/images/Comment.jpg" class=" img-responsive ">
                            </div>
                            <div class="col-md-10 col-xs-10">
                                <div class="messages msg_receive">
                                    <p>that mongodb thing looks good, huh?
                                        tiny master db, and huge document store</p>
                                    <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                    <a class="btn btn-danger btn-sm" href="#">Signaler</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="input-group">
                            <input id="btn-input" type="text" class="form-control input-sm chat_input"
                                placeholder="Votre message ici..." />
                            <span class="input-group-btn">
                                <button class="btn btn-primary" id="btn-chat">Envoyer</button>
                            </span>
                        </div>
                    </div>
                </div>

            </div>

        </div>


        <footer class="row">
            <div class="col-lg-12">
                Pied de page
            </div>
        </footer>

    </div> <!-- END DIV CONTAINER -->

    <!-- Bootstrap -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>