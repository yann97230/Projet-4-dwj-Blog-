<?php

class PostManager extends ManagerData {

	public function getPosts() {
		
		$posts = [];
		$req = $this->dbConnect()->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation FROM posts ORDER BY date_creation DESC LIMIT 0, 5');
		
		while ($data = $req->fetch(PDO::FETCH_ASSOC))
		{
			$posts[] = new Post($data);

		}
		return $posts;
	}

	public function getPost($postId) {

		$post = [];	
		$req = $this->dbConnect()->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%m/%Y") AS date_creation FROM posts WHERE id = :id');
        $req->execute([
            ':id' => $postId
        ]);
        $data = $req->fetch(PDO::FETCH_ASSOC);
        $post[] = new Post($data);

        return $post;
    }


	public function updatePost(Post $post) // connexion aux données pour modifier un commentaire
	{
		$req = $this->dbConnect()->prepare('UPDATE posts SET titre = :titre, contenu = :contenu, date_creation = NOW() WHERE id = :id');
		$req->execute([
			':titre' => $post->getTitre(),
			':contenu' => $post->getContenu(),
			':id' => $post->getId()
		]);
	}    

	public function add(Post $post) {
		$req = $this->dbConnect()->prepare('INSERT INTO posts SET titre = :titre, contenu = :contenu, date_creation = NOW()');
		$req->execute([
            ':titre' => $post->getTitre(),
            ':contenu' => $post->getContenu()
        ]);
	}

	public function deletePost(Post $post) {
		$req = $this->dbConnect()->prepare('DELETE FROM posts where id = :id');
		$req->execute([
			':id' => $post->getId()
		]);
	} 	
}

