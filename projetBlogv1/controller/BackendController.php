<?php 

class Backend  {
	

	public function register(){
		require('view/backend/Register.php');
	}	

	public function login(){
		require('view/backend/Connexion.php');
	}

	public function formPost() {
    	require('view/backend/AddPost.php');
	}

	public function registerUser(){
	    
	    if(!empty($_POST)){
		    
		    if($_POST['pseudo']) {
		      $userManager = New UserManager();
		      $user = $userManager->login($_POST['pseudo']);
		      
		        if($user){
		            $errors['pseudo'] = 'Ce pseudo est déjà pris';
		            require('view/backend/Register.php');
		           
		        }
		    	
		    	if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
		        	$errors['password'] = "Vous devez rentrer un mot de passe valide";
		        	require('view/backend/Register.php');
				}
			}	
			
			if(empty($errors)){
				$Password = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$userManager = New UserManager();
				 $user = new user([
                        'username' => $_POST['pseudo'],
                        'password' => $Password,
                        'email' => $_POST['email']
                    ]);
				$userManager->add($user);
				$valide['succes'] = "Vous pouvez maintenant vous connecter";
				require('view/backend/Connexion.php');	
			}
		}
	}	


	public function connection() {
		
		if (isset($_POST['pseudo']) AND isset($_POST['password'])) {
            if (!empty($_POST['pseudo']) AND !empty($_POST['password'])) {
                $pseudo = $_POST['pseudo'];
                $user = New UserManager();
				$username = $user->login($pseudo);
				
	 			if (!$username OR !password_verify($_POST['password'], $username['password']))
	            {
	                $errors['Identifiant'] = 'Identifiant ou Mot De Passe incorrect.<br/>';
	                require('view/backend/Connexion.php');
	            }
	            elseif ($username['is_admin'] == 1) {
	            	$_SESSION['admin'] = $user;
                    $valide['succes'] = 'Vous êtes connecté ! :-)<br/>';
                    require('view/frontend/Home.php');
	            }
				else 
	            {
	                $_SESSION['auth'] = $username;
	                $valide['succes'] = 'Vous êtes connecté ! :-)<br/>';
	                require('view/frontend/Home.php');
	            }
            }
		}
	}	


	public function deconnexion(){
		setcookie('remember', NULL, -1);
		unset($_SESSION['auth']);
		unset($_SESSION['admin']);
		$valide['succes'] = "Vous êtes déconnecter";
		require('view/frontend/Home.php');
	}

	public function viewPost() {
	    $postManager = new PostManager();
	    $articles = $postManager->getPost($_GET['postId']);
	    require('view/backend/UpdatePost.php');
	}

	public function editComment($postId, $commentId, $comment) 
	{
	    $CommentManager = new CommentManager();
	    $affectedComment = $CommentManager->edit($comment,$commentId);
	 	
	    if ($affectedComment === false) {
	        throw new Exception('Impossible de modifier le commmentaire');
	    }
	    else {
	       header('Location: index.php?action=post&id=' . $_GET['postId']);

	    }
	}

	public function editPost() 
	{
		if(!empty($_POST)){
	 	
		 	if(strlen($_POST['titre']) < 5 && strlen($_POST['contenu']) < 10)
		 	{
		 		$error['titre'] = "Le titre doit contenir au moins 5 caractères";
		 		$error['addArticle'] = "Le Contenu doit contenir au moins 10 caractères";
		 		$postManager = new PostManager();
	    		$articles = $postManager->getPost($_GET['postId']);
	    		require('view/backend/UpdatePost.php');
		 		
		 	} else {
		 		if(strlen($_POST['titre']) > 5 && strlen($_POST['contenu']) > 10)
		 		{
					$postManager = new PostManager();
				    $Update = new Post([
			            'titre' => $_POST['titre'],
			            'contenu' => $_POST['contenu'], 
			            'id' => $_GET['postId']
			        ]);
					$postManager->updatePost($Update);
					$valide['succes'] = "Votre article a bien été modifier";			
			    	require('view/backend/ConfirmPost.php');
			    }	
			}
		}	
	}        


	public function newPost() {
	 	if(!empty($_POST)){
	 	
		 	if(strlen($_POST['titre']) < 5 && strlen($_POST['addArticle']) < 10) {
		 			$error['titre'] = "Le titre doit contenir au moins 5 caractères";
		 			$error['addArticle'] = "Le Contenu doit contenir au moins 10 caractères";
		 			require('view/backend/AddPost.php');
		 	}

		 	if(strlen($_POST['titre']) > 5 && strlen($_POST['addArticle']) > 10) {
		   	    	$postManager = new PostManager(); 

			    	$article = new Post([
		            'titre' => $_POST['titre'],
		            'contenu' => $_POST['addArticle']
		            ]);
			    	$postManager->add($article);
			    	$valide['succes'] = "Votre article a bien été ajouter";			
			    	require('view/backend/NewPost.php');
			}			
	    }
	        
    }   	

	public function deletePost() {
		$PostManager = new PostManager();

		$article = new Post ([
			'id' => $_GET['postId']
		]);
		$PostManager->deletePost($article);
		$valide['succes'] = "Votre article a bien été supprimer";
		require('view/backend/DeletePost.php');
	}

	public function deleteComment() {
		$CommentManager = new CommentManager();

		$comment = new Comment ([
			'id' => $_GET['id']
		]);
		$CommentManager->deleteComment($comment);
		$valide['succes'] = "Votre commentaire a bien été supprimer";
		require('view/backend/DeleteComment.php');
	}

}
