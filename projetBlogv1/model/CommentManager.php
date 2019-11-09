<?php


Class CommentManager extends ManagerData {


	
	public function getComments($postId) {
		$commentaire = [];
		$req = $this->dbConnect()->prepare('SELECT id, auteur, commentaire, id_billet, report, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire DESC');
		$req->execute([
            $postId
        ]);
        while ($data = $req->fetch(PDO::FETCH_ASSOC))
	    {
			$commentaire[] = new Comment($data);
		}
		return $commentaire;

	}

	public function add(Comment $comment) {
		$req = $this->dbConnect()->prepare('INSERT INTO commentaires SET id_billet = :id_billet , auteur = :auteur , commentaire = :commentaire,  date_commentaire = NOW()');
	    $req-> execute([
			':id_billet' =>  $comment->getId_billet(),
		 	':auteur' => $comment->getAuteur(),
		 	':commentaire' => $comment->getCommentaire()
		]);

    }

    public function report(Comment $comment) {
		$req = $this->dbConnect()->prepare('UPDATE commentaires SET report = 1 WHERE id = :id ');
		$req->execute([
			':id'=> $comment->getId()
		]);
	}

	public function deleteComment(Comment $comment) {
		$req = $this->dbConnect()->prepare('DELETE FROM commentaires WHERE id = :id');
		$req->execute([
			':id'=> $comment->getId()
		]);
	}
}


