<?php

class Frontend { 



	public function home() { // chaque page devient une méthode
	    
	    require('view/frontend/Home.php');
	}

	public function formContact() {
	    require('view/frontend/Contact.php');
	}
	
	public function listPosts() {
    	
    	$postManager = new PostManager();
    	$posts = $postManager->getPosts();
		require('view/frontend/IndexView.php');
	}
	
	public function post() {
    	
    	$postManager = new PostManager();
    	$CommentManager = new CommentManager();
    	$articles = $postManager->getPost($_GET['id']);
    	$donnees = $CommentManager->getComments($_GET['id']);
    	require('view/frontend/Comment.php');
	}



	public function commentAdd() {
		
		if(!empty($_POST)){
	 	
		 	if(strlen($_POST['auteur']) < 4 && strlen($_POST['commentaire']) < 5){
				$_SESSION['error']['danger'] = "l'auteur doit contenir au moins 4 caractère et Le contenu au moins 10. ";
			}else {
		 		if(strlen($_POST['auteur']) >= 4 && strlen($_POST['commentaire']) >= 5)
		 		{	
					$comment = new CommentManager;
					$addComment = new Comment([
	                    'auteur' => $_POST['auteur'],
	                    'commentaire' => $_POST['commentaire'], 
	                    'id_billet' => $_GET['id']
	                ]);
					$comment->add($addComment);
					$_SESSION['flash']['success'] = "Votre Commentaire a bien été ajouter";	
				}    
			}
		}
	}	


	public function report() {
		
		if(!empty($_GET['id'])) {
			$comment = new CommentManager; 
			$report = new Comment([
				'id' => $_GET['id']
			]);
			$comment->report($report);
		}
	}

    public function contact() {
		$firstname; 
	    $name; 
		$email; 
	    $phone; 
	    $message;
	    $isSucces;
	    $emailTo;

		
		if(isset($_POST['submit'])) {
				
			$isSucces = true;
			$emailTo = "yann97230@gmail.com";
			$emailText= "";

			if(empty($_POST['firstname'])) {
			 	$_SESSION['flash']['danger'] = "Le prénom est requis pour valider le formulaire.";
				$isSucces = false;
			}else {
				$firstname = $_POST['firstname'];
				$emailText .= "Prénom: $firstname\n";
			 		
			}

			if(empty($_POST['name'])) {
			   $_SESSION['flash']['danger'] = "Le nom est requis pour valider le formulaire.";
			 	$isSucces = false;
			} else {
				$name = $_POST['name'];
				$emailText .= "nom: $name\n";
			 	
			}

			if(empty($_POST['email'])) {
			 $_SESSION['flash']['danger'] = "l'email est requis pour valider le formulaire.";
			 	$isSucces = false;
			} else {
				$email = $_POST['email'];
				$emailText .= "Email: $email\n";
			 	
			}

			if(empty($_POST['phone'])) {
			 	$_SESSION['flash']['danger'] = "le téléphone est requis pour valider le formulaire.";
			    $isSucces = false;
			} else {
				$phone = $_POST['phone'];
				$emailText .= "Téléphone: $phone\n";
			}

			if(empty($_POST['message'])) {
			 	$_SESSION['flash']['danger'] = "le message est requis pour valider le formulaire.";
            
                $isSucces = false;
               
		    } else {
            	$message = $_POST['message'];
            	$emailText .= "Message: $message\n";
			}

            if($isSucces) {
				$headers = "From: $firstname $name <$email>\r\nReply-To: $email";
				mail($emailTo, "Vous avez reçu un message du formulaire de contact de votre blog", $emailText ,  $headers);
				$firstname = $name = $email = $phone = $message = "";
				$_SESSION['flash']['success'] = "Votre message a bien été envoyé";
			}

		}
		require('view/frontend/Contact.php');	
	}			


		


}