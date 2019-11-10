<?php

namespace App\Models;

class Post
{
    private $id;
    private $titre;
    private $contenu;
    private $date_creation;

    public function __construct(Array $data) // oblige à ce que le paramètre soit un tableau
    {
        $this->hydrate($data);
    }

    public function hydrate($data)
    {
        if (isset($data['id']))
        {
            $this->setId($data['id']);
        }

        if (isset($data['titre']))
        {
            $this->setTitre($data['titre']);
        }

        if (isset($data['contenu']))
        {
            $this->setContenu($data['contenu']);
        }

        if (isset($data['date_creation']))
        {
            $this->setDate_creation($data['date_creation']);
        }
    }
    // GETTERS
    public function getId()
    {
        return $this->id;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getContenu()
    {
        return $this->contenu;
    }

    public function getDate_creation()
    {
        return $this->date_creation;
    }
    // SETTERS
    
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    public function setContenu($contenu)
    {
        $this->contenu = htmlspecialchars_decode($contenu);

        return $this;
    }

    public function setDate_creation($date_creation)
    {
        $this->date_creation = $date_creation;

        return $this;
    }
}
