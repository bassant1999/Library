<?php 

namespace Controller;

// defined('ROOTPATH') OR exit('Access Denied!');

class Controller
{

	public function view($name, $data = [])
	{
		$smarty = new \Smarty;
		foreach ($data as $key => $value) {		
			$smarty->assign($key, $value);
		}
		
		$filename = "../app/views/".$name.".tpl";
		// echo $filename;
		if(file_exists($filename))
		{
			$smarty->display($filename);
		}
        else
        {
			// echo "view not found";
			$filename = "../app/views/404.tpl";
			require $filename;
		}
	}
}