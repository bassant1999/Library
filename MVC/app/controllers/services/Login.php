<?php 

namespace Controller;

require "../app/models/Book.php";
require "../app/models/Borrow.php";
require "../app/models/User.php";

use Model\User;

// defined('ROOTPATH') OR exit('Access Denied!');

/**
 * home class
 */
class Login extends Controller
{
	public function login()
	{
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $data = json_decode(file_get_contents("php://input"));
            $mail = $data->username;
            $pwd = $data->password;
            $user = User::users_list(true, ['mail'=>"'".$mail."'", "pwd"=>"'".$pwd."'"], [], false,"");
            if($user)
            {
                $_SESSION["login"] = 1;
                $_SESSION["user_id"] = $user[0]->id;
                $_SESSION["type"] = $user[0]->type;
                $response[] = array('status'=>1, 'user_id' =>$user[0]->id, 'type' => $user[0]->type);
            }
            else
            {
                $_SESSION["login"] = 0;
                $response[] = array('status'=>0);
            }
           
            echo json_encode($response);
            exit;
        }
        else
        {
            echo json_encode(array('status'=>0));
            exit;

        }
	}

}