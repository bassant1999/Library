<?php 

// defined('ROOTPATH') OR exit('Access Denied!');

// if((empty($_SERVER['SERVER_NAME']) && php_sapi_name() == 'cli') || (!empty($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] == 'localhost'))
// {
	/** database config **/
	define('DBNAME', "library");
	define('DBHOST', "localhost:3307");
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', '');
	
	define('ROOT', 'http://localhost/MVC/public');
	define('VIEW_TPL_PATH', __DIR__."\\..");

// }else
// {
	/** database config **/
	// define('DBNAME', 'mvc_db');
	// define('DBHOST', 'localhost');
	// define('DBUSER', 'root');
	// define('DBPASS', '');
	// define('DBDRIVER', '');

	// define('ROOT', 'https://www.yourwebsite.com');

// }

define('APP_NAME', "My Webiste");
define('APP_DESC', "Best website on the planet");

/** true means show errors **/
define('DEBUG', true);
