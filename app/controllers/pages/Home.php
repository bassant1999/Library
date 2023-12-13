<?php 

namespace Controller;

use Model\Model;

// require "../models/User.php";
use Model\User;
use Model\Book;


// defined('ROOTPATH') OR exit('Access Denied!');

/**
 * home class
 */
class Home extends Controller
{
	// use MainController;

	public function index()
	{
		// var_dump(__DIR__);die();
		$this->view('home', ["ROOT" => ROOT, "login" => $_SESSION["login"]?? 0, "user_type" => $_SESSION["type"]??0]);
	}

	// public function books()
	// {
	// 	if ($_SERVER["REQUEST_METHOD"] == "GET") 
	// 	{
	// 		$book = new Book();
	// 		$result = $book->findAll();
	// 		// print_r($result);
	// 		$books = array();
	// 		foreach ($result as $value) {
	// 			// print_r($value["id"]);
	// 			array_push($books, array("row"=>$value));
	// 		}
	// 		echo json_encode($books);
	// 		exit;
	// 	}
	// }

	// public function try()
	// {
	// 	echo "home try";
	// }

}