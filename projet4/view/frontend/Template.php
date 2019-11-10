<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="public/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="public/css/formulaire-contact.css">
  <title><?= $title ?> | Le site officiel de Jean Forteroche</title>

  <!-- Bootstrap core CSS -->
  <link href="public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="public/css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav" style="background-color:#563d7c">
    <div class="container">
      <a class="navbar-brand" href="index.php">Blog Jean Forteroche</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
           <li class="nav-item">
            <a class="nav-link" href="index.php?controller=frontend&action=index">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?controller=frontend&action=listPosts">Article</a>
          </li> 
          <?php if (!empty($_SESSION['auth']) || !empty($_SESSION['admin'])): ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?controller=backend&action=deconnexion">Deconnexion</a>
            </li>
         <?php else: ?>  
            <li class="nav-item">
              <a class="nav-link" href="index.php?controller=backend&action=register">s'inscrire</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?controller=backend&action=login">Connexion</a>
            </li>
           <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?controller=frontend&action=formContact">Contact</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>
  
  <header class="masthead" style="background-image: url('public/img/img.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Blog Jean Forteroche</h1>
            <span class="subheading">Billet simple pour l'Alaska</span>
          </div>
        </div>
      </div>
    </div>
  </header>
  
  <div class="contenair">
    <?= $content ?>
  </div>

<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="https://openclassrooms.com">Projet réalisé dans le cadre d'une formation Openclassroom</a>
  </div>
  <!-- Copyright -->

</footer>

  <!-- Bootstrap core JavaScript -->
  <script src="public/vendor/jquery/jquery.min.js"></script>
  <script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="public/js/clean-blog.min.js"></script>

</body>

</html>
