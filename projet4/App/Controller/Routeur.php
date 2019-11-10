<?php 
namespace App\Controllers;
use App\Controllers\FrontendController;
use App\Controllers\BackendController;

Class Routeur {
	
	public function url() {

		$class = "App\\Controllers\\" . (isset($_GET['controller']) ? ucfirst($_GET['controller']) . 'Controller' : 'FrontendController');
		$target = isset($_GET['action']) ? $_GET['action'] . "Action"  : "indexAction";
		$getParams = !empty($_GET) ? $_GET : null; 
		$postParams = !empty($_POST) ? $_POST : null;
		$params = [
		    "get"  => $getParams,
		    "post" => $postParams
		];
		  
		if (class_exists($class, true)) {
	    	$class = new $class($params);
		    if (in_array($target, get_class_methods($class))) {
		        call_user_func([$class, $target]);
		    } else {
		        call_user_func([$class, "errorAction"]);
		    }
		} else {
	   		require('view/frontend/Error404.php');
		}
      	
	}
}	