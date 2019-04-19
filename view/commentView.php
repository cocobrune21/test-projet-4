<?php ob_start(); ?>

<?php
while ($comment = $comments->fetch()) 
{
?>

    <p><?= nl2br(htmlspecialchars($comment['content'])); ?></p>
    <time datetime="2009-11-13T20:00"><?= htmlspecialchars($comment['autor']); ?>•
        <?= $comment['date_comment_fr']; ?></time>

<?php
}
$comments->closeCursor();
?>

<?php $commentAutor = ob_get_clean(); ?>

<?php require('template.php'); ?>