<?php
Class Article {
	private $id;
	private $title;
	private $content;
	private $date_add;
	private $date_update;
	private $on_line;
	 


public function __contruct(Array $data) 
{
	$this->hydrate($data);
}


public function hydrate($data) {
	
	if(isset($data['id'])) {
		$this->setId($data['id']);
	}

	if(isset($data['title'])) {
		$this->setId($data['title']);
	}

	if(isset($data['content'])) {
		$this->setId($data['content']);
	}

	if(isset($data['date_add'])) {
		$this->setId($data['date_add']);
	}

	if(isset($data['date_update'])) {
		$this->setId($data['date_update']);
	}

	if(isset($data['on_line'])) {
		$this->setId($data['on_line']);
	}
}

// GETTERS

public function getId() {
	return $this->id;
}

public function getTitle() {
	return $this->title;
}


public function getContent() {
	return $this->content;
}

public function getDate_add() {
	return $this->date_add;
}

public function getDate_update() {
	return $this->date_update;
}

public function getOn_line() {
	return $this->On_line;
}


// Setters 

public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setTitle($title)
    {
        $this->title = htmlspecialchars($title);

        return $this;
    }

    public function setContent($content)
    {
        $this->content = htmlspecialchars_decode($content);

        return $this;
    }

    public function setDate_creation($date_creation)
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    public function setDate_update($date_update)
    {
        $this->date_update = $date_update;

        return $this;
    }

    public function setOn_line($on_line)
    {
        $this->on_line = $on_line;

        return $this;
    }


}
