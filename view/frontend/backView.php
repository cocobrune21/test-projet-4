<?php ob_start(); ?>


<form method="post">
    <textarea id="content">Hello, World! lolool</textarea>
  </form>


<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>