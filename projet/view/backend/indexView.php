<?php $title = 'Blog Jean Forteroche'; ?>

<?php ob_start(); ?>
    </head>
        <header>
            <div class="titre">
                <?php include "titre.php" ?>
            </div>
        </header>
    <body>
        


        
        <h2>Derniers billets du blog :</h2>
        <div id="addArticle"><button class="btn btn-info"><a href="index.php?action=formArticle">Ajouter un article</a></button></div>
 
<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <div class="backgroundNew">
            <article class="contenair">   
                <h3>
                    <?= htmlspecialchars($data['titre']); ?>
                    <em>le <?= $data['date_creation_fr']; ?></em>
                </h3>
                
                <p class="">
                <?php
                // On affiche le contenu du billet
                echo nl2br(htmlspecialchars($data['contenu']));
                ?>
                <br />
                <em><button class="btn btn-info"><a class="button-return" href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></button></em>
                </p>
            </article>     
        </div>
    </div>
<?php
} // Fin de la boucle des billets
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>