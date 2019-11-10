<?php 
namespace App\Models;

class Comment 
{
  private $id;
	private $id_billet;
	private $auteur;
	private $commentaire;
	private $date_commentaire;
  private $report;


	public function __construct(Array $data)
	{
		$this->hydrate($data);
	}

  public function hydrate($data) {
      
    if (isset($data['id'])) 
   	{
      $this->setId($data['id']);
    }

    if (isset($data['id_billet'])) 
    {
      $this->setId_billet($data['id_billet']);
    }

    if (isset($data['auteur'])) 
    {
      $this->setAuteur($data['auteur']);
    }
       
    if (isset($data['commentaire'])) 
    {
      $this->setCommentaire($data['commentaire']);
    }		
   	  
    if (isset($data['date_commentaire'])) 
    {
      $this->setDate_commentaire($data['date_commentaire']);
    }
   		
    if (isset($data['report'])) 
    {
      $this->setreport($data['report']);
    }
  } 

    //getters
  public function getId()
  {
    return $this->id;
  } 	

  public function getId_billet()
  {
    return $this->id_billet;
  }

  public function getAuteur() 
  {
    return $this->auteur;
  }

  public function getCommentaire() 
  {
    return $this->commentaire;
  }

  public function getDate_commentaire() 
  {
    return $this->date_commentaire;
  }

  public function getReport() 
  {
    return $this->report;
  }

    //setters

  public function setId($id) 
  {
    $this->id = $id;
  }

  public function setId_billet($id_billet) 
  {
    $this->id_billet = $id_billet;
  }

  public function setAuteur($auteur) 
  {
    $this->auteur = $auteur;
  }

  public function setCommentaire($commentaire) 
  {
    $this->commentaire = $commentaire;
  }

  public function setDate_commentaire($date_commentaire) 
  {
    $this->date_commentaire = $date_commentaire;
  }

  public function setReport($report) 
  {
    $this->report = $report;
  }
}
