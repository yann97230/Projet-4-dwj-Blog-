<?php $title = 'Blog Jean Forteroche'; ?>

<?php $content = ob_start(); ?>

<div class="alert alert-alert">
 
 	<H1>erreur 404 la page est introuvable ! </H1>

</div>	

<?php $content = ob_get_clean(); ?>

<?php require('Template.php'); ?>