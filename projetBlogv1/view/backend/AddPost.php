<?php $title = 'Blog Jean Forteroche'; ?>
<?php ob_start(); ?>
  
        <header>
            
            <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
            <script>tinymce.init({selector:'textarea'});</script>
            <link href="public/css/style.css" rel="stylesheet"/>

        </header>
   <body>
    <div id="addupdatepost">
        <h1>Ajouter un Article</h1>
        <button class="btn btn-info"><a href="index.php">Retour à la liste des billets</a></button>
    </div> 

    <?php if(!empty($error)): ?>
        <div class="alert alert-danger">
            <p>Erreur de connexion</p>
            <ul>
                <?php foreach($error as $errors): ?>
                   <li><?= $errors; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
   

    <div id="form">
        <form class="add-Article" action="index.php?action=newPost" method="POST">
            <label for="auteur">Titre</label> : <input  class="form-control" type="text" name="titre" placeholder="Auteur"/><br/>
            <label for="contenu">Ajouter un Article</label> :
            <textarea  class="form-control" name="addArticle" placeholder="contenu de l'Article" row="3"></textarea>
            <input  name="billet" type="hidden"><br />
            <div class="bouton-Article"><input class="btn btn-primary" action="index.php?action=newArticle" type="submit" value="Ajouter un article" name="submit"/><div>
        </form>
    </div></div>

<?php $content = ob_get_clean(); ?>

<?php require('Template.php'); ?>