<?php 

namespace Controller;

use Model\User;

// defined('ROOTPATH') OR exit('Access Denied!');

/**
 * home class
 */
class Login extends Controller
{
	public function login_view()
	{
        if($_SERVER["REQUEST_METHOD"] == "GET")
        {
		    $this->view('login', ["ROOT" => ROOT, "login" => $_SESSION["login"]??0]);
        }
        else
        {
            echo json_encode(array('status'=>0));
            exit;

        }
	}

}