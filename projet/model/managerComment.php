<?php
require_once("ManagerData.php");

Class CommentManager extends ManagerData {


	
	public function getComments($postId) {
		
		$db = $this->dbConnect();
		$donnees = $db->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire DESC');
		$donnees->execute(array($postId));
	    return $donnees;
	    
	}

	public function addComment() {
		
		$db = $this->dbConnect();
		if(isset($_POST['submit_commentaire'])) {
			if(isset($_POST['auteur'],$_POST['commentaire']) AND !empty($_POST['auteur']) AND !empty($_POST['commentaire'])) 
			{		
					$auteur = htmlspecialchars($_POST['auteur']);
					$commentaire = htmlspecialchars($_POST['commentaire']);
				if(strlen($auteur)> 3) {
					$insererCommentaire = $db->prepare('INSERT INTO commentaires (id_billet, auteur, commentaire, date_commentaire) VALUES (?,?,?,NOW())');
					$tableau = $insererCommentaire-> execute(array ($_GET['id'], $auteur, $commentaire));
					$_GET['msg'] = "<span style='color:green;'> Votre commentaire a bien été posté</span>";
				} else {
					$_GET['msg'] = "<span style='color:red;'>Erreur: Le pseudo doit contenir au moins 3 caractères</span>";
				}

				} else {
					$_GET['msg'] = "<span style='color:red;'>Erreur: Tous les champs doivent être complétés</span>";
				}
		}
	}


	public function edit($comment, $commentId) // connexion aux données pour modifier un commentaire
	{
	    $db = $this->dbConnect();
	    $newcomment= $db->prepare('UPDATE commentaires SET commentaire = ?,  auteur = ?, date_commentaire = NOW()  WHERE id=?');
	    $auteur = htmlspecialchars($_POST['auteur']);
	    $commentaire = htmlspecialchars($_POST['comment']);
	    $affectedComment = $newcomment->execute(array($commentaire,$auteur, $_GET['id']));
	 
	    return $affectedComment;
	}
}