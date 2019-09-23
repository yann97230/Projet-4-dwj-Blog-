<?php

require('model/articleManager.php');
require('model/managerComment.php');


class frontend { 



	public function home() { // chaque page devient une méthode
	    
	    require('view/frontend/home.php');
	}

	public function formContact() { 
	    
	    require('view/frontend/Contact.php');
	}
	
	public function listPosts() {
    $postManager = new PostManager();

    $posts = $postManager->getPosts();

    require('view/frontend/indexView.php');
	}
	
	public function post() {
    	$postManager = new PostManager();
    	$CommentManager = new CommentManager();
    	$post = $postManager->getPost($_GET['id']);
    	$donnees = $CommentManager->getComments($_GET['id']);
    	require('view/frontend/comment.php');
	}



	public function commentAdd() {
			$CommentManager = new CommentManager();
			$CommentManager->addComment();
	}

		


}