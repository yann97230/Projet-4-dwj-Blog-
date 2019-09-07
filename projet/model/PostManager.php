<?php
require_once("model/managerData.php");

class PostManager extends managerData {

	public function getPosts() {
		
		$db= $this->dbConnect();
		$req = $db->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');

		return $req;
		
	}

	public function getPost($postId) {

		$db= $this->dbConnect();
		$req = $db->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();
		return $post;

	}
}