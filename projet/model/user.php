<?php 

require_once'ManagerData.php';

class User extends ManagerData {


    public function register() {

    	$db = $this->dbConnect();
    	$req = $db->prepare(" INSERT INTO user SET username = ?, password = ?,  date_creation = NOW() ");
    	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    	$req->execute([$_POST['pseudo'], $password]);
    }

   
}