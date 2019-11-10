
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
<div class="bouton-Article"><button class="btn btn-info"><a href="index.php?controller=frontend&action=listPosts">Retour à la page des Articles</a></button></div>


<?php $content = ob_get_clean(); ?>

<?php require('Template.php'); ?>