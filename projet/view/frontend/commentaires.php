<?php $title = 'Blog Jean Forteroche'; ?>
<?php ob_start(); ?>
<header>
    <div class="Menu">
        <?php include "menu.php" ?>
    </div>
            
    <div class="titre">
        <?php include "titre.php" ?>
    </div>    
</header>
    <h1>Mon super blog !</h1>
    <p><a href="index.php">Retour à la liste des billets</a></p>
 

<div class="news">
    <h3>
        <?php echo htmlspecialchars($post['titre']); ?>
        <em>le <?php echo $post['date_creation_fr']; ?></em>
    </h3>
            
    <p>
        <?php echo nl2br(htmlspecialchars($post['contenu'])); ?>
    </p>
</div>

<div id="form">
    <form class="commentaire"  method="POST">
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
            
    <h2>Commentaires</h2> 
    <?
    while ($comment = $donnees->fetch())
    {
    ?>
    <div>
        <p>Nom:<br><strong><?php echo htmlspecialchars($comment['auteur']); ?></p></strong> 
        <p>Date: <strong><?php echo $comment['date_commentaire_fr']; ?></p></strong>
        <p>Commentaire:<br><strong><?php echo nl2br(htmlspecialchars($comment['commentaire'])); ?></p></strong>
    </div>    

    <?php
    }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>