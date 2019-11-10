<?php
namespace App\Controllers;
use App\Models\PostManager;
use App\Models\CommentManager;
use App\Models\Comment;

class FrontendController { 

	protected $params;

	public function __construct($params) {
		$this->params = $params;
    }

   public function indexAction() { 
	    
	    require('view/frontend/Home.php');
	}
  
  	public function errorAction() {
		require('view/frontend/Error404.php');
	}

	public function formContactAction() {
	    require('view/frontend/Contact.php');
	}
	
	public function listPostsAction() {
    	
    	$postManager = new PostManager();
    	$posts = $postManager->getPosts();
		require('view/frontend/IndexView.php');
	}

	public function postAction() {
    	
    	$postManager = new PostManager();
    	$CommentManager = new CommentManager();
    	$articles = $postManager->getPost($this->params['get']['id']);

    	$donnees = $CommentManager->getComments($this->params['get']['id']);
    	require('view/frontend/Comment.php');
	}

	public function commentAddAction() {
		
		if (empty($this->params['post'])) {
	 		return;
	 	}
		
		if (strlen($this->params['post']['auteur']) < 4 || strlen($this->params['post']['commentaire']) < 5) {
			$_SESSION['error']['danger'] = "l'auteur doit contenir au moins 4 caractère et le contenu au moins 5. ";
		} else {
	 		if (strlen($this->params['post']['auteur']) >= 4 && strlen($this->params['post']['commentaire']) >= 5) {	
				$comment = new CommentManager();
				$addComment = new Comment([
                    'auteur' => $this->params['post']['auteur'],
                    'commentaire' => $this->params['post']['commentaire'], 
                    'id_billet' => $this->params['get']['id']
                ]);
				$comment->add($addComment);
				$_SESSION['flash']['success'] = "Votre Commentaire a bien été ajouter";	
			}    
		}
		header('Location: index.php?action=post&id=' . $this->params['get']['id']);
	}	

	public function reportAction() {
		
		if (!empty($this->params['get']['comment'])) {
			$comment = new CommentManager(); 
			$report = new Comment([
				'id' => $this->params['get']['comment']
			]);
			$comment->report($report);
		}
		header('Location: index.php?action=post&id=' . $this->params['get']['id']);
	}

    public function sendContactAction() {
		$firstname; 
	    $name; 
		$email; 
	    $phone; 
	    $message;
	    $isSucces;
	    $emailTo;

		
		if (isset($this->params['post']['submit'])) {
				
			$isSucces = true;
			$emailTo = "yann97230@gmail.com";
			$emailText= "";

			if (empty($this->params['post']['firstname'])) {
			 	$_SESSION['flash']['danger'] = "Le prénom est requis pour valider le formulaire.";
				$isSucces = false;
			} else {
				$firstname = $this->params['post']['firstname'];
				$emailText .= "Prénom: $firstname\n";
			 		
			}

			if (empty($this->params['post']['name'])) {
			   	$_SESSION['flash']['danger'] = "Le nom est requis pour valider le formulaire.";
				$isSucces = false;
			} else {
				$name = $this->params['post']['name'];
				$emailText .= "nom: $name\n";
			 	
			}

			if(empty($this->params['post']['email'])) {
			 $_SESSION['flash']['danger'] = "l'email est requis pour valider le formulaire.";
			 	$isSucces = false;
			} else {
				$email = $this->params['post']['email'];
				$emailText .= "Email: $email\n";
			 	
			}

			if (empty($this->params['post']['phone'])) {
			 	$_SESSION['flash']['danger'] = "le téléphone est requis pour valider le formulaire.";
			    $isSucces = false;
			} else {
				$phone = $this->params['post']['phone'];
				$emailText .= "Téléphone: $phone\n";
			}

			if (empty($this->params['post']['message'])) {
			 	$_SESSION['flash']['danger'] = "le message est requis pour valider le formulaire.";
            
                $isSucces = false;
               
		    } else {
            	$message = $this->params['post']['message'];
            	$emailText .= "Message: $message\n";
			}

            if ($isSucces) {
				$headers = "From: $firstname $name <$email>\r\nReply-To: $email";
				mail($emailTo, "Vous avez reçu un message du formulaire de contact de votre blog", $emailText ,  $headers);
				$firstname = $name = $email = $phone = $message = "";
				$_SESSION['flash']['success'] = "Votre message a bien été envoyé";
			}
		}
		require('view/frontend/Contact.php');	
	}	
	
		
}
