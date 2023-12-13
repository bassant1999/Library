<?php

// defined('ROOTPATH') OR exit('Access Denied!');

class App
{
	private $controller = 'Home';
	private $method 	= 'index';

	private function splitURL()
	{
		$URL = $_GET['url'] ?? 'pages/home';
		$URL = explode("/", trim($URL,"/"));
		return $URL;	
	}

	public function loadController()
	{
		$URL = $this->splitURL();
		// print_r($URL);

		if($URL[0] === "services")
		{
			// echo "here service";
			$filename = "../app/controllers/services/".ucfirst($URL[1]).".php";
		}
		elseif($URL[0] === "pages")
		{
			// echo "here p";
			$filename = "../app/controllers/pages/".ucfirst($URL[1]).".php";
			// echo "file: " . $filename . "\r \n";
		}
		/** select controller **/
		if(file_exists($filename))
		{
			require $filename;
			$this->controller = ucfirst($URL[1]);
			unset($URL[1]);
			// echo "hi \r \n";
		}else{

			$filename = "../app/controllers/pages/_404.php";
			require $filename;
			$this->controller = "_404";
		}

		$controller_c = ('\Controller\\'.$this->controller);
		// echo $controller_c;
		// echo "\n \r";
		$controller = new $controller_c;
		// print_r("after \r \n");
		/** select method **/
		if(!empty($URL[2]))
		{
			if(method_exists($controller, $URL[2]))
			{
				$this->method = $URL[2];
				// echo $URL[2];
				unset($URL[2]);
			}	
		}
		// print_r([$controller,$this->method]);
		call_user_func_array([$controller,$this->method], $URL);

	}	

}


// loadController();