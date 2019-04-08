<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8" />
        <title>Billet simple pour l'Alaska</title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Billet simple pour l'Alaska</h1>
        <p><a href="index.php">Retour à la liste des billets</a></p>

        <div class="news">
            <h3>
                <?= htmlspecialchars($episodes['title']) ?>
                <em>le <?= $episodes['date_post_episode'] ?></em>
            </h3>
            
            <p>
                <?= nl2br(htmlspecialchars($episodes['text'])) ?>
            </p>
        </div>

        <h2>Commentaires</h2>

        <?php
        while ($comment = $comments->fetch())
        {
        ?>
            <p><strong><?= htmlspecialchars($comment['autor']) ?></strong> le <?= $comment['date_comments_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comments'])) ?></p>
        <?php
        }
        ?>
    </body>
</html>