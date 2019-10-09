<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- tinymce -->
    <script src="vendor/tinymce/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
    tinymce.init({
        selector: '#script, #scriptEdit, #commentEdit',
        mode: 'textareas'
    });
    </script>

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <title>Billet simple pour l'Alaska</title>
    <meta name="description"
        content="Le nouveau roman de Jean Forteroche, un nouveau chapitre en ligne chaque semaine" />
    <link href="public/css/style.css" rel="stylesheet" />

</head>

<body>
    <header>
        <div class="navbar" id="nav">
            <div class="container-fluid">
                <div class="navbar-header">
                    <nav>
                        <ul class="nav nav-pills">

                            <li class="nav-item nav-link">
                                <a href="index.php?action=frontView">Accueil</a></li>
                            <?php
                            try {
                                if (isset($_SESSION['logUser'])) {
                                    ?>
                            <li class="nav-item nav-link">
                                <a href="index.php?action=logout">Se déconnecter</a></li>
                            <?php if (isset($_SESSION['logUser']) && $_SESSION['logUser'] == true) {
                                        ?>
                            <li class="nav-item nav-link">
                                <a href="index.php?action=backEnd">Admin</a></li><?php
                                    } ?>
                            <?php
                                } else {
                                    ?> <li class="nav-item nav-link connexion">
                                <a href="index.php?action=log">Connexion</a></li> <?php
                                }
                            } catch (Exception $error) {
                                echo 'Erreur : '.$error->getMessage();
                            }?>
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
            </div>
        </section>


        <?= $content; ?>

    </main>

    <footer class="nav">
        <div class="container">
            <p class="float-right">
                <a href="#nav">Haut de page</a>
            </p>
            <p>Copyright 2019 - Mentions Légales</p>
        </div>
    </footer>

    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>

</html>