
<?php $title = 'Blog Jean Forteroche'; ?>
<?php ob_start(); ?>

<div class="contenair"class="article">
    <div>
        <h3 class="col-md-12">
            <?php echo htmlspecialchars($post['titre']); ?>
            <em>le <?php echo $post['date_creation_fr']; ?></em>
        </h3>
            
        <p>
            <?php echo nl2br(htmlspecialchars($post['contenu'])); ?>
        </p>
    </div>    
    
  <div id="form">
    <form class="commentaire" action="index.php?action=addcoment&amp;id=<?= $_GET['id']?>"  method="POST">
        <label for="auteur">auteur</label> : <input  class="form-control" type="text" name="auteur" placeholder="Auteur"/><br/>
        <label for="commentaire">commentaires</label> :
        <textarea  class="form-control" name="commentaire" placeholder="Commentaire" row="3"></textarea>
        <input  name="billet" type="hidden"><br />
        <input class="btn btn-primary" type="submit" value="envoyer le commentaire" name="submit_commentaire" />
    </form>
</div>


<div class="comment">    
    
    <?php if(isset($_GET['msg'])) { 
        echo$_GET['msg']; 
    } 
    ?>
            
    <h2 id="TitreComment">Commentaires</h2> 
    <?
    while ($comment = $donnees->fetch())
    {
    ?>
    
    <div class="backgroundComment">
        <p>Nom:<br><strong><?php echo htmlspecialchars($comment['auteur']); ?></p></strong> 
        <p>Date: <strong><?php echo $comment['date_commentaire_fr']; ?></p></strong>
        <p>Commentaire:<br><strong><?php echo nl2br(htmlspecialchars($comment['commentaire'])); ?></p></strong>
        <button class="btn btn-info"><a href="index.php?action=viewComment&amp;id=<?= $comment['id']?>&amp;postId=<?= $post['id'] ?>">Signaler un commentaire</a></button>
    </div>    

    <?php
    }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>