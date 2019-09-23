<?php $title = 'Modification du commentaire'; ?>
 
<?php ob_start(); ?>
<header>    
    <div class="titre">
        <?php include "titre.php" ?>
    </div>    
</header>
    <h1>Mon super blog !</h1>
    <button class="btn btn-info"><a href="index.php">Retour à la liste des billets</a></p></button>
 
 <div class="news">
    <h3>
        <?php echo htmlspecialchars($post['titre']); ?>
        <em>le <?php echo $post['date_creation_fr']; ?></em>
    </h3>
            
    <p>
        <?php echo nl2br(htmlspecialchars($post['contenu'])); ?>
    </p>
    <div><button class="btn btn-danger"><a href="index.php?action=deleteArticle&amp;postId=<?= $_GET['billet'] ?>">Supprimer</a></button></div>
</div>



<div id="form"> 
    <form class="commentaire" action="index.php?action=editArticle&amp;postId=<?= $_GET['postId'] ?>" method="post">
        <div>
        	<label for="titre">Titre de l'article</label> : <input  class="form-control" type="text" name="titre" placeholder="Auteur"/><br/>
            <label for="contenu">Modifier le contenu :</label><br />
            <textarea class="form-control" id="contenu" name="contenu" rows="8" cols="30"></textarea>
        </div>
        <div>
            <input class="btn btn-primary" type="submit" value="Modifier" name="submit_modifier" />
        </div>
    </form>
</div>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>