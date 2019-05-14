<?php ob_start(); ?>


<!-- home -->
<section class="container-fluid" id="home">
    <div class="home" col-lg-12>
        <h2>Prologue</h2>
        <article class="bookClosed">
            <p>Plus qu'un simple roman, ce livre est aussi l'aventure d'une vie.
                <br /> Il est conçu comme un blog, afin que tout le monde puisse s'approprier l'histoire et
                peut-être également aider Jean Foteroche.
                <br />N'hésitez pas à partager vos avis dans le café littéraire, au bas de chaque chapitre.
                <br />L'inter-activité entre vos commentaires et la rédaction de cet ouvrage, permettra peut-être
                de sauver le monde !
            </p>
            <p class="nav-fluid startChapter">
                <a href="index.php?action=chapterView&amp;id=1" class="btn btn-primary">Entrer dans l'aventure</a>
            </p>
        </article>
    </div>
</section><!-- end home -->


<?php $content = ob_get_clean(); ?>

<?php require 'view/template.php'; ?>