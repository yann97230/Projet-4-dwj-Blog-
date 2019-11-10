<?php
/* variables à remplir */
$title = 'Se connecter';

/* début de la variable $content */
ob_start();
?>

<section id="login-form">
    <?php if(!empty($valide)): ?>
        <div class="alert alert-success">
            <p>Vous êtes maintenant inscris</p>
            <ul>
                <?php foreach($valide as $valider): ?>
                   <li><?= $valider; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if(!empty($errors)): ?>
        <div class="alert alert-danger">
            <p>Erreur de connexion</p>
            <ul>
                <?php foreach($errors as $error): ?>
                   <li><?= $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3 login-content pb-5 px-5">
                <div class="backgroundNew">
                    <form id="form-login"  action="index.php?controller=backend&action=connection" method="post">
                        <div class="form-group mt-5">
                          <h2>Se connecter : </h2>
                       
                            <label for="pseudo" class="text-white">Identifiant</label><br />
                            <input type="text" value="" class="form-control" name="pseudo" id="pseudo" placeholder="Veuillez saisir votre identifiant" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-white">Mot de passe</label>
                            <input type="password" value="" class="form-control" name="password" id="password" placeholder="Veuillez saisir votre mot de passe" required>
                        </div>
                        <div class="text-center" id="formconnect">
                            <input type="submit" name="submit" action="index.php?controller=backend&action=connection" class="btn btn-primary mt-3 float-none float-md-right" Value="connexion">
                        </div>
                    </form>
                </div>    
            </div>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require('Template.php');
?>