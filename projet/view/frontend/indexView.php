<?php $title = 'Blog Jean Forteroche'; ?>

<?php ob_start(); ?>
    </head>
        <header>
            <div class="Menu">
                <?php include "menu.php" ?>
            </div>
            
            <div class="titre">
                <?php include "titre.php" ?>
            </div>
        </header>
    <body>
        


        
        <h2>Derniers billets du blog :</h2>
 
<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['titre']); ?>
            <em>le <?= $data['date_creation_fr']; ?></em>
        </h3>
        
        <p>
        <?php
        // On affiche le contenu du billet
        echo nl2br(htmlspecialchars($data['contenu']));
        ?>
        <br />
        <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
} // Fin de la boucle des billets
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>