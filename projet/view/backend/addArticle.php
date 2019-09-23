<?php $title = 'Blog Jean Forteroche'; ?>
<?php ob_start(); ?>
  </head>
        <header>
            
            <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
            <script>tinymce.init({selector:'textarea'});</script>
            <link href="public/css/style.css" rel="stylesheet"/>

            <div class="titre">
                <?php include "titre.php" ?>
                
            </div>
        </header>
   <body>

    <h1>Mon super blog !</h1>
    <p><button class="btn btn-info"><a href="index.php">Retour à la liste des billets</a></p></button>
    
    <?php if(isset($_GET['msg'])) { 
        echo$_GET['msg']; 
    } 
    ?>

<div id="form">
    <form class="add-Article" action="index.php?action=newArticle" method="POST">
        <label for="auteur">Titre</label> : <input  class="form-control" type="text" name="titre" placeholder="Auteur"/><br/>
        <label for="commentaire">Ajouter un Article</label> :
        <textarea  class="form-control" name="addArticle" placeholder="Commentaire" row="3"></textarea>
        <input  name="billet" type="hidden"><br />
        <input class="btn btn-primary" type="submit" value="Ajouter un article" name="submit_article"/>
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>