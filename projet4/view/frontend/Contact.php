<?php $title = 'Contactez-moi'; ?>



<?php ob_start(); ?>
	<div class="container">
		<div class="divider"></div>
		<div class="heading">
			<h2>Contactez-moi</h2>
		
			<?php if(isset($_SESSION['flash'])): ?>
			   <?php foreach($_SESSION['flash'] as $type => $message): ?>
			        <div class="alert alert-<?= $type; ?>">
			            <?= $message; ?>
			        </div>
			    <?php endforeach; ?>
			<?php unset($_SESSION['flash']); ?>
			        <?php endif; ?>
			
			<div class="row">
				<div class="col-lg-10 col-lg-offset-1">
					<form id="contact-form" method="post" action="index.php?controller=frontend&action=sendContact" roles="form">
						<div class="row">
							
							<div class="col-md-6">
								<label  for="firstname">Prénom :<span class="blue">*</span></label>
								<input class="form-control" id="firstname" type="text" name="firstname" placeholder="Votre Prénom" value="">
							    <p class="comments"></p>
							</div>
							
							<div class="col-md-6">
								<label  for="name">Nom :<span class="blue">*</span></label>
								<input class="form-control" id="name" type="text" name="name" placeholder="Votre nom" value="">
							    <p class="comments"></p>
							</div>
							
							<div class="col-md-6">
								<label  for="email">Email :<span class="blue">*</span></label>
								<input class="form-control" id="email" type="email" name="email" placeholder="Votre Email" value="">
							    <p class="comments"></p>
							</div>
							
							<div class="col-md-6">
								<label  for="phone">Téléphone :</label>
								<input class="form-control" id="phone" type="tel" name="phone" placeholder="Votre Téléphone" value="">
								<p class="comments"></p>
							</div>
							
							<div class="col-md-12">
								<label  for="message">Message :<span class="blue">*</span></label>
								<textarea class="form-control" id="message" type="number" name="message" placeholder="Votre Message"row="4"></textarea>
							    <p class="comments"></p>
							</div>
							
							<div class="col-md-12">
								<p class="blue"><strong>* Ces informations sont requises</strong></p>
							</div>

							<div class="col-md-12">
								<input type="submit" name="submit" class="button1" action="index.php?controller=frontend&action=sendContact" value="Envoyer">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>	
	</div>			
<?php $content = ob_get_clean(); ?>

<?php require('Template.php'); ?>
