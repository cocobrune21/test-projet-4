<?php ob_start(); ?>

<?php
while ($post = $posts->fetch()) {
?>

                <p><?= nl2br(htmlspecialchars($post['post'])); ?></p>
                <time datetime="2009-11-13T20:00"><?= htmlspecialchars($post['autor']); ?>•
                    <?= $post['date_post_fr']; ?></time>
    
<?php
}
$posts->closeCursor();
?>

<?php $postBlog = ob_get_clean(); ?>

<?php require('template.php'); ?>
