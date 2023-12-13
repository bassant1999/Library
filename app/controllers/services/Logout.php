<?php 

namespace Controller;

require "../app/models/Book.php";
require "../app/models/Borrow.php";
require "../app/models/User.php";
// defined('ROOTPATH') OR exit('Access Denied!');

/**
 * home class
 */
class Logout extends Controller
{
	// use MainController;

	public function index()
	{
        session_start();

        session_unset();

        session_destroy();

        header("location:http://localhost/MVC/public/pages/login/login_view");
	}

}