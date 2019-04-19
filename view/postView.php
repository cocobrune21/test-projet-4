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
    <?php
    while ($episodes = $req->fetch()) {
        ?>

    <header class="row">
        <div class="col-md-12 text-center">
            <h1 class="mt-0 mb-3">Billet simple pour l'Alaska</h1>
            <div class="breadcrumbs">
                <p class="mb-0 text-white"><a class="text-white" href="#connect">Se connecter</a></p>
            </div>
        </div>
    </header>


    <?php
    while ($episodes = $req->fetch()) {
        ?>
        
    <div class="row msg_container base_receive">
        <div class="col-md-2 col-xs-2 avatar">
            <img src="../public/images/Comment.jpg" class=" img-responsive ">
        </div>
        <div class="col-md-10 col-xs-10">
            <div class="messages msg_receive">
                <p><?= nl2br(htmlspecialchars($post['post'])); ?></p>
                <time datetime="2009-11-13T20:00"><?= htmlspecialchars($post['autor']); ?>•
                    <?= $post['date_post_fr']; ?></time>
                <a class="btn btn-danger btn-sm" href="#">Signaler</a>
            </div>
        </div>
    </div>

    <footer class="row">
        <div class="col-lg-12 footer">
            Pied de page
        </div>
    </footer>

    <?php
    }
    $req->closeCursor();
    ?>

    <!-- Bootstrap -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>