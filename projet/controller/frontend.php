<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts() {
    $postManager = new PostManager();

    $posts = $postManager->getPosts();

    require('view/frontend/indexView.php');
}

function post() {
    $postManager = new PostManager();
    $CommentManager = new CommentManager();
    $post = $postManager->getPost($_GET['id']);
    $donnees = $CommentManager->getComments($_GET['id']);

    require('view/frontend/commentaires.php');
}

function managerComment() {
	$CommentManager = new CommentManager();
	$CommentManager->addComment();
}
managerComment();