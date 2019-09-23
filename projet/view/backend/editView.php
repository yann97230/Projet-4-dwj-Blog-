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
    
</div>

<p>Ancien commentaire : <?= nl2br(htmlspecialchars($viewcomment['commentaire'])); ?></p>

<div id="form"> 
    <form class="commentaire" action="index.php?action=editComment&amp;id=<?= $_GET['id']?>&amp;postId=<?= $_GET['postId'] ?>" method="post">
        <div>
        	<label for="auteur">auteur</label> : <input  class="form-control" type="text" name="auteur" placeholder="Auteur"/><br/>
            <label for="commentaire">Modifier le commentaire :</label><br />
            <textarea class="form-control" id="comment" name="comment" rows="8" cols="30"></textarea>
        </div>
        <div>
            <input class="btn btn-primary" type="submit" value="Modifier" name="submit_modifier" />
        </div>
    </form>
</div>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>