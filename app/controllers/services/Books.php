<?php 

namespace Controller;

use Model\Book_tb;
use Model\Model;

// require "../models/User.php";
require "../app/models/Book.php";
require "../app/models/Borrow.php";
require "../app/models/User.php";


// use Model\User;
use Model\Book;
use Model\Borrow;
use Model\User;


// \Model\clsbllFilter()
// defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Book class
 */
class Books extends Controller
{
	// use MainController;

	public function get_books()
	{
		if ($_SERVER["REQUEST_METHOD"] == "GET") 
		{
            $data = [];
            if(isset($_GET["bookTitle"]))
            {
                $book_title = $_GET["bookTitle"];
                $data =  [
                    [
                    'strKey' => "title" ,
                    'strOperator' => "LIKE",
                    'strValue' => "'%".$book_title."%'"
                    ]
                ];
            }
            
            echo json_encode([Book::books_list(false,$data), "login" => $_SESSION["login"]??0, "user_id" => $_SESSION["user_id"]??0]);
			exit;
		}
	}

    public function search()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") 
		{
            $book_title = $_GET["bookTitle"];
            echo "title like '%".$book_title."%'";
            echo json_encode(Book::books_list(false,"title like '%".$book_title."%'"));
        }

    }

	public function borrow_book()
	{
		if ($_SERVER["REQUEST_METHOD"] == "GET") 
        {
            $book_id = $_GET["bookId"];
            $user_id = $_SESSION["user_id"];

            $book = new Book();
            $book->load($book_id);
            if($book->borrow($user_id))
                $response[] = array('status'=>1);
            else
                $response[] = array('status'=>0);
            echo json_encode($response);
            exit;
        }
	}

	public function return_book()
	{
        if ($_SERVER["REQUEST_METHOD"] == "GET") 
        {
            $book_id = $_GET["bookId"];
            // $user_id = $_GET["userId"];
            $user_id = $_SESSION["user_id"];
            $book = new Book();
            $book->load($book_id);
            if($book->return($user_id))
                $response[] = array('status'=>1);
            else
                $response[] = array('status'=>0);
            echo json_encode($response);
            exit;
        }
	}
    
    public function borrowed_books()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") 
        {
            $user_id = $_SESSION["user_id"];
            echo json_encode(Borrow::get_books($user_id,false));

        }
    }

    public function add_book()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $data = json_decode(file_get_contents("php://input"));
            $book = new Book();
            $book->title = $data->title;
            $book->author = $data->author;
            $book->description = $data->description;
            $book->img_url = $data->img_url;
		    $book->max_num = (int)($data->max_num);
            if ($book->save()) 
            {
                $response[] = array('status'=>1);       
            } 
            else 
            {
                $response[] = array('status'=>0);
            }
            echo json_encode($response);
            exit;
        }
        
    }
}

// $book = new Book();
            // $book->title = "title";
            // $book->author = "author";
            // $book->description = "descriptio";
            // $book->img_url = "img_url";
		    // $book->max_num = 5;
            // echo $book->save();
            // print_r(Book::books_list(true));
            // Book::books_list(true, [1, 3,  5], $data_not = [], true, "id");
            // print_r(Borrow::borrows_list(true, [3, 4], [], true, "user_id"));
            // print_r(Borrow::borrows_list(false, [3, 4], [], true, "user_id"));
            // $borrow = new Borrow();
            // $borrow->book_id = 2;
            // $borrow->user_id = 4;
            // echo "del: ". $borrow->delete();
            // echo " ". $borrow->book_id;
            // $book = new Book_tb();
            // $book->load("id=50");
            // $book->Delete();
            // $book = new Book();
            // $book->load(51);
            // $book->delete();
            // $book->title ="bassant";
		    // $book->author = "bassant";
		    // $book->description = "bassant";
		    // $book->img_url = "bassant";
		    // $book->max_num = 5;
            // $book->save();
            // echo "id: " . $book->id;
            // $book->load(3);
            // echo $book->img_url ."\r \n";
            // echo $book->id;
            // print_r(User::users_list(false));
            // $user = new User();
            // $user->mail = "peter@gmail.com";
            // $user->name = "peter";
            // $user->type = 1;
            // $user->pwd = "123";
            // echo $user->save();
            // echo $user->load(7);
            // echo $user->delete();
            // echo $user->mail;
            // $user->name = "bassant mahmoud";
            // $user->save();
            // print_r(User::users_list(false, ['mail'=>"'bass@gmail.com'", "pwd"=>"'123456'"]));
            // print_r(Book::books_list(false, ["id"=>1, "max_num"=>5]));
