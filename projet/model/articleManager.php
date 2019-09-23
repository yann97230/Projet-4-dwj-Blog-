<?php

require('ManagerData.php');

class PostManager extends ManagerData {

	public function getPosts() {
		
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');

		return $req;
		
	}

	public function getPost($postId) {

		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();
		return $post;
		$postId = new Article;
	}


	public function updateArticle($contenu ,$postId) // connexion aux données pour modifier un commentaire
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE billets SET titre = :nv_titre, contenu = :nv_contenu, date_creation = NOW() WHERE id = :id_billet');
		$req->execute(array(
				':nv_titre' => ($_POST['titre']),
				':nv_contenu' => ($_POST['contenu']),
				':id_billet' => ((int)$_GET['postId'])
				));
	}    
	
	public function deleteArticle() {
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE billets where id =?');
		$req->execute(array( $_GET['billet']));
	} 

	public function addArticle($titre,$addArticle) {
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO billets (id, titre, contenu, date_creation) VALUES (?,?,?,NOW())');
		$titre = htmlspecialchars($_POST['titre']);
	    $addArticle = htmlspecialchars($_POST['addArticle']);
		$req->execute(array($_GET['id'],$titre,$addArticle));
	}	
	
	
}