<?php $title = 'Blog Jean Forteroche'; ?>
<?php ob_start(); ?>
<div id="btn-return-list">
  <button class="btn btn-info"><a href="index.php?controller=frontend&action=listPosts">Retour à la liste des Articles</a></button>
</div>  
<?php foreach ($articles as $article) { ?>
    <div class="contenair"class="article">
        <div class="contenairPost">
            <h3 class="col-md-12">   
                <?= htmlspecialchars_decode($article->getTitre()); ?>
                <em>le <?=  htmlspecialchars_decode($article->getDate_creation()); ?></em>
            </h3>
                
            <p>
                <?=  htmlspecialchars_decode($article->getContenu()); ?>
            </p>
            <?php if (isset($_SESSION['admin'])): ?>
                <div class="bouton-Article">
                    <button class="btn btn-info"><a href="index.php?controller=backend&action=viewPost&amp;postId=<?= $article->getId() ?>">Modifier l'article</a></button>
                    <button id="delete" class="btn btn-danger"><a href="index.php?controller=backend&action=delete&amp;postId=<?= $article->getId() ?>">supprimer l'article</a></button>
                </div>

            <?php else: ?>  
                <br>
            <?php endif; ?>
        </div>
    </div>        
<?
}
?>    


<div id="form">
    <form class="commentaire" action="index.php?controller=frontend&action=commentAdd&amp;id=<?= $_GET['id']?>"  method="POST">
        <label for="auteur">auteur : </label> <input  class="form-control" type="text" name="auteur" placeholder="Auteur"/><br/>
        <label for="commentaire">commentaires : </label> 
        <textarea  class="form-control" name="commentaire" placeholder="Commentaire" row="3"></textarea>
        <input  name="billet" type="hidden"><br />
        <input id="addcoment" class="btn btn-primary" type="submit" value="envoyer le commentaire" name="submit_commentaire" />
        <?php if(isset($_SESSION['flash'])): ?>
            <?php foreach($_SESSION['flash'] as $type => $message): ?>
                <div class="alert alert-<?= $type; ?>">
                    <?= $message; ?>
                </div>
        <?php endforeach; ?>
           <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>

         <?php if(isset($_SESSION['error'])): ?>
            <?php foreach($_SESSION['error'] as $type => $message): ?>
                <div class="alert alert-<?= $type; ?>">
                    <?= $message; ?>
                </div>
        <?php endforeach; ?>
           <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
    </form>
</div>

  
<br>        
<h2 id="TitreComment" class="col-md-12">Commentaires</h2> 
<?
foreach ($donnees as $commentaire)
{
?>
    <div class="contenair">    
        <div class="backgroundComment">
            <p>Nom :<br><strong><?=  htmlspecialchars($commentaire->getAuteur()); ?></strong>.</p>
            <p>Date :<br><strong><?=  htmlspecialchars($commentaire->getDate_commentaire()); ?></strong>.</p>
            <p>Commentaire :<br><strong><?=  htmlspecialchars($commentaire->getCommentaire()); ?></strong>.</p>
            <p><?  $tab['report'] =htmlspecialchars($commentaire->getReport()); ?></p>
           
           <?php if ($tab["report"] === "1"): ?>
               <div class="alert alert-danger ?>">
                    <p><strong>Le commentaire a été signaler</strong></p>
                </div>
            <?php else: ?> 
               <div class ="bouton-Article">
                    <button class="btn btn-info"><a href="index.php?action=report&amp;comment=<?= $commentaire->getId(); ?>&amp;id=<?= $commentaire->getId_billet(); ?>">Signaler un commentaire</a></button>
               </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['admin'])): ?>
                 <div class ="bouton-Article"><button class="btn btn-info"><a href="index.php?controller=backend&action=deleteComment&amp;id=<?= $commentaire->getId(); ?>">Supprimer le commentaire</a></button>
                 </div>
            <?php endif; ?>
        </div>
    </div>        
<?php
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('Template.php'); ?>