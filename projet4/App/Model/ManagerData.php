<?php
namespace App\Models;
class ManagerData {
	public $db;

	protected function dbConnect() {
		try {
				$db = new \PDO("mysql:host=db5000173298.hosting-data.io; dbname=dbs168180;",'dbu182255','Yann2580@');
				return $db;
			}
      		catch(\Exception $e) {
				die('Erreur: '.$e->getMessage());
			}
    }

}  

 