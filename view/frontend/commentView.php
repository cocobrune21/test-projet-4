<?php ob_start(); ?>

<?php
while ($comment = $comments->fetch()) 
{
?>

    <p><?= nl2br(htmlspecialchars($comment['content'])); ?></p>
    <time><?= htmlspecialchars($comment['autor']); ?>•
        <?= $comment['date_comment_fr']; ?></time>

<?php
}
$comments->closeCursor();
?>

<?php $commentAutor = ob_get_clean(); ?>

<?php require('template.php'); ?>