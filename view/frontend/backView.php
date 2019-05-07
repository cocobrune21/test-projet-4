<?php ob_start(); ?>



<h5>TinyMCE Quick Start Guide</h5>
  <form method="post">
    <textarea id="content">Hello, World!</textarea>
  </form>


<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>