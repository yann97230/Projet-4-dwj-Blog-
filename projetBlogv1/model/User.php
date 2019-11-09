<?php

class User {
	
	private $id;
	private $username;
	private $password;
	private $email;
	private $date_creation;

	function __construct(Array $data) {

		$this->hydrate($data);
	}

	public function hydrate($data) {
		
		if(isset($data['id'])){
			$this->setId($data['id']);
		}

		if(isset($data['username'])){
			$this->setUsername($data['username']);
		}

		if(isset($data['password'])){
			$this->setPassword($data['password']);
		}

		if(isset($data['email'])){
			$this->setEmail($data['email']);
		}

		if(isset($data['date_creation'])){
			$this->setDate_creation($data['date_creation']);
		}
	}

	//getters

	public function getId() 
	{
		return $this->id; 
	}


	public function getUsername() 
	{
		return $this->username; 
	}


	public function getPassword() 
	{
		return $this->password; 
	}

	public function getEmail() 
	{
		return $this->email; 
	}

	public function getDate_creation() 
	{
		return $this->date_creation; 
	}

	
	public function setId($id) 
	{
		$this->id = $id; 
	}


	public function setUsername($username) 
	{
		$this->username = $username; 
	}


	public function setPassword($password) 
	{
		$this->password = $password;  
	}  

	public function setEmail($email) 
	{
		$this->email = $email;  
	}    

	public function setDate_creation($date_creation) 
	{
		$this->date_creation = $date_creation;  
	}   




} 