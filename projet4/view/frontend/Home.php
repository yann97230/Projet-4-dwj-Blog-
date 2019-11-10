<?php $title = 'Blog Jean Forteroche'; ?>

<?php ob_start(); ?>


<?php if(!empty($valide)): ?>
  <div class="alert alert-success">
      <ul>
        <?php foreach($valide as $valider): ?>
            <li><?= $valider; ?></li>
        <?php endforeach; ?>
      </ul>
  </div>
<?php endif; ?>


<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">
            <h2 class="post-title">
              Biographie
            </h2>
            <h3 id="titreAuteur" class="post-subtitle">
              Auteur : Jean ForteRoche
            </h3>
          
          <p class="post-meta">Bonjour Vous êtes sur mon nouveau blog afin de vous faire découvrir mon roman vous trouverez les différents chapitres dans le lien du menu article et en cliquant sur le boutton en bas de la page qui vous permet d'accéder aux différents chapitres du roman.</p>
            
        </div>
        <hr>
        <div class="post-preview">
          <a href="post.html">
            <h2 class="post-title">
              Présentation
            </h2>
            <h3 class="post-subtitle">
              Un homme voyage en Alaska.
            </h3>
          </a>
          <p class="post-meta">Âgée de 70 ans Accompagnés de son chat sous une neige terrible raconte ses étapes de la vie lors de son voyage en Alaska.<br>
          Comme Hawaï, l'Alaska est séparé du Mainland et se situe au nord-ouest du Canada. Bordé par l'océan Arctique au nord et la mer de Béring et l'océan Pacifique au sud, ce territoire est séparé de l'Asie par le détroit de Béring. En outre, ses divisions administratives ne sont pas des comtés mais des boroughs.<br>

          Peuplé par des Aléoutes, Esquimaux (notamment Iñupiak et Yupiks) et peut-être d'autres Amérindiens depuis plusieurs millénaires, le territoire est colonisé par des trappeurs russes à la fin du XVIIIe siècle. L'Alaska vit alors essentiellement du commerce du bois et de la traite des fourrures. En 1867, les États-Unis l'achètent à la Russie pour la somme de 7,2 millions de dollars (environ 120 millions de dollars actuels), et celui-ci adhère à l'Union le 3 janvier 1959. Les domaines économiques prédominants aujourd'hui sont la pêche, le tourisme, et surtout la production d'hydrocarbures (pétrole, gaz) depuis la découverte de gisements à Prudhoe Bay dans les années 1970.  </p>
        </div>
        <hr>
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="index.php?action=indexView">cliquer pour accéder aux articles</a>
        </div>
      </div>
    </div>
  </div>

<?php $content = ob_get_clean(); ?>

<?php require('Template.php'); ?>