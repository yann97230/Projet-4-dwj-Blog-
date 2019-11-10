<?php 
namespace App\Controllers;
use App\Models\PostManager;
use App\Models\CommentManager;
use App\Models\UserManager;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

class BackendController {
	
	protected $params;

	public function __construct($params) {
		$this->params = $params;
    }

    public function indexAction() { 
	    
	    require('view/frontend/Home.php');
	}
	
	public function registerAction(){
		require('view/backend/Register.php');
	}	

	public function loginAction(){
		require('view/backend/Connexion.php');
	}
  	
  	public function formPostAction() {
    	require('view/backend/AddPost.php');
	}

	public function registerUserAction() {
	    
	    if (empty($this->params['post'])) {
	 		return;
	 	}
	    
	    if ($this->params['post']['pseudo']) {
	      $userManager = New UserManager();
	      $user = $userManager->login($this->params['post']['pseudo']);
	      
	        if ($user) {
	            $errors['pseudo'] = 'Ce pseudo est déjà pris';
	            require('view/backend/Register.php');
	           
	        }
	    	
	    	if (empty($this->params['post']['password']) || $this->params['post']['password'] != $this->params['post']['password_confirm']) {
	        	$errors['password'] = "Vous devez rentrer un mot de passe valide";
	        	require('view/backend/Register.php');
			}
		}	
		
		if (empty($errors)) {
			$Password = password_hash($this->params['post']['password'], PASSWORD_DEFAULT);
			$userManager = New UserManager();
			 $user = new user([
                    'username' => $this->params['post']['pseudo'],
                    'password' => $Password,
                    'email' => $this->params['post']['email']
                ]);
			$userManager->add($user);
			$valide['succes'] = "Vous pouvez maintenant vous connecter";
			require('view/backend/Connexion.php');	
		}
	}	

	public function connectionAction() {
		
		if (isset($this->params['post']['pseudo']) AND isset($this->params['post']['password'])) {
			
            if (!empty($this->params['post']['pseudo']) AND !empty($this->params['post']['password'])) {
                $pseudo = $this->params['post']['pseudo'];
                $user = New UserManager();
				$username = $user->login($pseudo);
				
	 			if (!$username OR !password_verify($this->params['post']['password'], $username['password'])) {
	                $errors['Identifiant'] = 'Identifiant ou Mot De Passe incorrect.<br/>';
	                require('view/backend/Connexion.php');
	            }
	            elseif ($username['is_admin'] == 1) {
	            	$_SESSION['admin'] = $user;
                    $valide['succes'] = 'Vous êtes connecté ! :-)<br/>';
                    require('view/frontend/Home.php');
	            } else {
	                $_SESSION['auth'] = $username;
	                $valide['succes'] = 'Vous êtes connecté ! :-)<br/>';
	                require('view/frontend/Home.php');
	            }
            }
		}
	}	

	public function deconnexionAction() {
		setcookie('remember', NULL, -1);
		unset($_SESSION['auth']);
		unset($_SESSION['admin']);
		$valide['succes'] = "Vous êtes déconnecter";
		require('view/frontend/Home.php');
	}

	public function viewPostAction() {
	  $postManager = new PostManager();
	  $articles = $postManager->getPost($this->params['get']['postId']);
	  require('view/backend/UpdatePost.php');
	}

	public function editPostAction() {
		
		if (empty($this->params['post'])) {
	 		return;
	 	}
	 	
	 	if (strlen($this->params['post']['titre'])  < 5 || strlen($this->params['post']['contenu']) < 10) {
	 		$error['titre'] = "Le titre doit contenir au moins 5 caractères";
	 		$error['addArticle'] = "Le Contenu doit contenir au moins 3 caractères";
	 		$postManager = new PostManager();
    		$articles = $postManager->getPost($this->params['get']['postId']);
    		require('view/backend/UpdatePost.php');
	 		
	 	} 
	 	
	 	if (strlen($this->params['post']['titre']) >= 5 && strlen($this->params['post']['contenu']) >= 10) {
			$postManager = new PostManager();
		    $Update = new Post([
	            'titre' => $this->params['post']['titre'],
	            'contenu' => $this->params['post']['contenu'], 
	            'id' => $this->params['get']['postId']
	        ]);
			$postManager->updatePost($Update);
			$valide['succes'] = "Votre article a bien été modifier";			
	    	require('view/backend/ConfirmPost.php');
	    }	
	}        

	public function newPostAction() {
	 	
	 	if (empty($this->params['post'])) {
	 		return;
	 	}
	 	
	 	if (strlen($this->params['post']['titre']) < 5 || strlen($this->params['post']['addArticle']) < 10) {
	 			$error['titre'] = "Le titre doit contenir au moins 5 caractères";
	 			$error['addArticle'] = "Le Contenu doit contenir au moins 3 caractères";
	 			require('view/backend/AddPost.php');
	 	}

	 	if (strlen($this->params['post']['titre']) >= 5 && strlen($this->params['post']['addArticle']) >= 10) {
	   	    	$postManager = new PostManager(); 

		    	$article = new Post([
	            'titre' => $this->params['post']['titre'],
	            'contenu' => $this->params['post']['addArticle']
	            ]);
		    	$postManager->add($article);
		    	$valide['succes'] = "Votre article a bien été ajouter";			
		    	require('view/backend/AddPost.php');
		}			
	} 

	public function deletePostAction() {
		$PostManager = new PostManager();

		$article = new Post ([
			'id' => $this->params['get']['postId']
		]);
		$PostManager->deletePost($article);
		$valide['succes'] = "Votre article a bien été supprimer";
		require('view/backend/DeletePost.php');
	}

	public function deleteCommentAction() {
		$CommentManager = new CommentManager();

		$comment = new Comment ([
			'id' => $this->params['get']['id']
		]);
		$CommentManager->deleteComment($comment);
		$valide['succes'] = "Votre commentaire a bien été supprimer";
		require('view/backend/DeleteComment.php');
	}

}
