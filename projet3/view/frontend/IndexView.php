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
   <div id="button-indexview"> 
        <div id="addArticle">
            <button class="btn btn-info"><a href="index.php?controller=backend&action=formPost">Ajouter un article</a></button>
        </div>
    <?php else: ?>  
        <br><br>
<?php endif; ?>
        <div class="button-return">
            <button class="btn btn-info"><a href="index.php">Retour à la page d'acceuil</a></button>
        </div>
    </div>        
<?php foreach ($posts as $article) { ?>
    <div class="news">
        <div class="backgroundNew">
            <article class="contenair">   
                <h2>
                    <?=  htmlspecialchars_decode($article->getTitre()); ?>
                    <br><em>le <?=  htmlspecialchars_decode($article->getDate_creation()); ?></em>
                </h2>
                
                <p class="Postcontenair">
                   <?=  htmlspecialchars_decode($article->getContenu()); ?>
                <br />
                <em><button id="boutonPost" class="btn btn-info"><a class="button-return" href="index.php?controller=frontend&action=post&amp;id=<?= $article->getId() ?>">Ajouter un commentaires</a></button></em>
                </p>
            </article>     
        </div>
    </div>
<?
}
?>    
<?php $content = ob_get_clean(); ?>

<?php require('Template.php'); ?>