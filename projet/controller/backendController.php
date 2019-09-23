<?php 
require('model/user.php');



class backend {
	

	public function login(){
		require('view/frontend/login.php');
	}	

	public function inscription(){
		$user = New User();
		$user->register();
		require('view/frontend/connexion.php');
	}	

	public function viewComment() // pour voir le commentaire
	{
	    $postManager = new PostManager();
	    $post = $postManager->getPost($_GET['postId']);
		$CommentManager = new CommentManager();
	    $viewcomment = $CommentManager->view($_GET['id']);
	    require('view/backend/editView.php');
	}

	public function viewArticle() {
	    $postManager = new PostManager();
	    $post = $postManager->getPost($_GET['postId']);
	    require('view/backend/updateArticle.php');
	}

	public function editComment($postId, $commentId, $comment) // pour éditer le commentaire à modifier
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

	public function editArticle($postId, $titre, $contenu) // pour éditer le commentaire à modifier
	{
	    $postManager = new PostManager();
	    $affectedPost = $postManager->updateArticle($contenu, $titre, $postId);
	    
	    if ($affectedPost === false) {
	        throw new Exception('Impossible de modifier le commmentaire');
	    }
	    else {
	       header('Location: index.php?action=post&id=' . $_GET['postId']);

	    }
	} 

	public function formArticle() {
	    require('view/backend/addArticle.php');
	}


	public function newArticle($titre,$addArticle) {
	   
	    if (!empty($_POST)) {
	        $validation = true;

	        if(empty($_POST['titre']) && empty($_POST['addArticle'])) {
	            $validation = false;
	            $_GET['msg'] = "<span style='color:red;'> Veuillez remplir tout les champs.</span>";
	        }

	        if(strlen($_POST['titre']) < 3 && strlen($_POST['addArticle']) < 10) {
	            $validation = false;
	            $_GET['msg'] = "<span style='color:red;'>Votre Titre doit contenir au moins 3 caractère et l'article doit contenir au moins 10 caractère</span>";
	        }
	        
	        if($validation)  {
	           if (isset($_POST['submit_article'])) {
	                $_GET['msg'] = "<span style='color:green;'> Votre commentaire a bien été posté</span>";
	                $postManager = new PostManager();
	                $addArticle = $postManager->addArticle($titre, $addArticle); 
	            }
	        }
	    }
	}

}
