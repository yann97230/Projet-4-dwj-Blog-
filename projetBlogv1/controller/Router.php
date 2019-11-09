<?php 
Class Router 
{
	private $_ctrl;
	private $_view;

	public function routeReq() {
		try
		{
			spl_autoload_register(function($class) {
				require_once('models/'.$class. '.php');
			});

			$url = '';

			if(isset($_GET['url']))
			{
				$url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));

				$controller = ucfirst(strtolower($url[0]));
				$controllerClass = "Controller".$controller;
				$controllerFile = "controller/".$controllerClass.".php";
			

				if(file_exists($controllerFile))
				{
					require_once($controllerFile);
					$this->_ctrl = new $controllerClass($url);
				}
				else 
					throw new Execption('Page introuvable');
			}
			else 
			{
				require_once('index.php');
			}
		}
		catch(Execption $e)
		{
			$errorMsg = $e->getMessage();
			require_once('view/frontend/viewError.php');
		}
	}	
}