   
    <?php ob_start(); ?>
     
    <?php
    while ($episodes = $req->fetch()) {
    ?>

            <div class="col-lg-12 chapter">
                <!-- Start chapter -->
                <h2 class="display-4"><?= htmlspecialchars($episodes['title']); ?></h2>
                <hr class="my-4">
                <nav aria-label="Navigation chapter" class="nav_chapter">Chapitres
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
                <p class="lead"><?= nl2br(htmlspecialchars($episodes['script'])); ?></p>
            </div> <!-- End chapter -->

    <?php
    }
    $req->closeCursor();
    ?>

    <?php $chapter = ob_get_clean(); ?>

    <?php require('template.php'); ?>

