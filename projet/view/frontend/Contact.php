


<?php ob_start(); ?>

		<div class="container">
			<div class="divider"></div>
			<div class="heading">
				<h2>Contactez-moi</h2>
			
		
				<div class="row">
					<div class="col-lg-10 col-lg-offset-1">
						<form id="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" roles="form">
							<div class="row">
								
								<div class="col-md-6">
									<label  for="firstname">Prénom :<span class="blue">*</span></label>
									<input class="form-control" id="firstname" type="text" name="firstname" placeholder="Votre Prénom" value="<?php echo $firstname; ?>">
								    <p class="comments"><?php echo $firstnameError; ?></p>
								</div>
								
								<div class="col-md-6">
									<label  for="name">Nom :<span class="blue">*</span></label>
									<input class="form-control" id="name" type="text" name="name" placeholder="Votre nom" value="<?php echo $name; ?>">
								    <p class="comments"><?php echo $nameError; ?></p>
								</div>
								
								<div class="col-md-6">
									<label  for="email">Email :<span class="blue">*</span></label>
									<input class="form-control" id="email" type="email" name="email" placeholder="Votre Email" value="<?php echo $email; ?>">
								    <p class="comments"><?php echo $emailError; ?></p>
								</div>
								
								<div class="col-md-6">
									<label  for="phone">Téléphone :</label>
									<input class="form-control" id="phone" type="tel" name="phone" placeholder="Votre Téléphone" value="<?php echo $phone; ?>">
									<p class="comments"><?php echo $phoneError;?></p>
								</div>
								
								<div class="col-md-12">
									<label  for="message">Message :<span class="blue">*</span></label>
									<textarea class="form-control" id="message" type="number" name="message" placeholder="Votre Message"row="4"><?php echo $message;?></textarea>
								    <p class="comments"><?php echo $messageError;?></p>
								</div>
								
								<div class="col-md-12">
									<p class="blue"><strong>* Ces informations sont requises</strong></p>
								</div>

								<div class="col-md-12">
									<input type="submit" class="button1" value="Envoyer">
								</div>
							</div>

							<p class="thank-you" style="display:<?php if($isSucces) echo 'block'; else echo 'none'?>"> Votre message a bien été envoyé. Merci de m'avoir contacté. </p>	
						</form>
						
					</div>
				</div>
			</div>	
		</div>			



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
