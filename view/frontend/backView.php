<?php ob_start(); ?>


  <form action="traitement.php" method="post"><textarea style="width: 100%;" name="content"><br /> </textarea>
<input name="send" type="submit" value="Envoyer" /></form>


<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>