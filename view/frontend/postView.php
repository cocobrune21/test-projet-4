<?php ob_start(); ?>

<?php
while ($postVisitor = $postsVisitors->fetch()) {
?>

                <p><?= nl2br(htmlspecialchars($postVisitor['post'])); ?></p>
                <time><?= htmlspecialchars($postVisitor['autor']); ?>•
                    <?= $postVisitor['date_post_fr']; ?></time>
    
<?php
}
$postsVisitors->closeCursor();
?>

<?php $postBlog = ob_get_clean(); ?>

<?php require('template.php'); ?>
