
<?php $title = 'Blog Jean Forteroche'; ?>

<?php $content = ob_start(); ?>
   <?php if(!empty($valide)): ?>
    <div class="alert alert-success">
        <ul>
          <?php foreach($valide as $valider): ?>
              <li><?= $valider; ?></li>
          <?php endforeach; ?>
        </ul>
    </div>
   <?php endif; ?>
<?php if (isset($_SESSION['admin'])): ?>
  <div class="bouton-Article"><button class="btn btn-info"><a href="index.php?controller=frontend&action=listPosts">Retour à la page des articles</a></button></div>
<?php else: ?> 
      
      <div class="alert alert-alert">
 
 		<H1>erreur 404 la page est introuvable ! </H1>

	  </div>
 <?php endif; ?>

<?php $content = ob_get_clean(); ?>

<?php require('Template.php'); ?>