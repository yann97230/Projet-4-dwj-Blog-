<?php $title = "Mettre a jour l'article"; ?>
 
<?php ob_start(); ?>
 <?php if (isset($_SESSION['admin'])): ?>    
	<header>
            
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({selector:'textarea'});</script>
        <link href="public/css/style.css" rel="stylesheet"/>
    </header>


<?php foreach ($articles as $article) { ?>
    <div id="addupdatepost">
        <h1>Modifier Article</h1>
        <button class="btn btn-info"><a href="index.php?controller=frontend&action=listPosts">Retour à la liste des Articles</a></button>
    <div>
 
    <div class="contenairPost">
        <h3>
            <?= htmlspecialchars_decode($article->getTitre());?>
            <em>le <?=  htmlspecialchars_decode($article->getDate_creation()); ?></em>
        </h3>
                
        <p>
            <?=  htmlspecialchars_decode($article->getContenu()); ?>
        </p>
        <div><button id="delete" class="btn btn-danger"><a href="index.php?action=delete&amp;postId=<?= $article->getId() ?>">supprimer l'article</a></div>
    </div>
    
    <?php if(!empty($error)): ?>
        <div class="alert alert-danger">
            <p>Les champs n'ont pas étés remplis correctement.</p>
            <ul>
                <?php foreach($error as $errors): ?>
                   <li><?= $errors; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    
   <?php if(!empty($valide)): ?>
    <div class="alert alert-success">
        <ul>
          <?php foreach($valide as $valider): ?>
              <li><?= $valider; ?></li>
          <?php endforeach; ?>
        </ul>
    </div>
   <?php endif; ?>   
<?
}
?>    
   
<div id="form"> 
    <form class="commentaire" action="index.php?controller=backend&action=editPost&amp;postId=<?=$article->getId() ?>" method="post">
        <div>
        	<label for="titre">Titre de l'article</label> : <input  class="form-control" type="text" name="titre" placeholder="Auteur"/><br/>
            <label for="contenu">Modifier le contenu :</label><br />
            <textarea class="form-control" id="contenu" name="contenu" rows="10" cols="30"></textarea>
        </div>
        <div class="bouton-Article">
            <input class="btn btn-primary" type="submit" value="Modifier" name="submit_modifier" />
        </div>
    </form>
</div>
 <?php else: ?> 
      
      <div class="alert alert-alert">
 
 		<H1>erreur 404 la page est introuvable ! </H1>

	  </div>
 <?php endif; ?>      

<?php $content = ob_get_clean(); ?>
<?php require('Template.php'); ?>