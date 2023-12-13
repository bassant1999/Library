<?php 

namespace Controller;

// defined('ROOTPATH') OR exit('Access Denied!');

/**
 * home class
 */
class Addbook extends Controller
{
	public function add_book_view()
	{
        if($_SERVER["REQUEST_METHOD"] == "GET")
        {
		    $this->view('addbook', ["ROOT" => ROOT, "login" => $_SESSION["login"], "user_type" => $_SESSION["type"]]);
        }
        else
        {
            echo json_encode(array('status'=>0));
            exit;
        }
	}

}