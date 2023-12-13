<?php

namespace Model;

// defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Borrow class
 */
class  Borrow_tb extends \ADOdb_Active_Record
{
    var $_table = 'borrow';
}
class Borrow
{

	protected static $table = 'borrow';
	protected $primaryKey = ['user_id', 'book_id'];
	// $attributes have attributes in book
	protected $attributes = [];

    public function __construct() {
        $this->attributes = [
            'user_id' => '',
            'book_id' => ''
        ];
    }

	// setter and getter
    public function __set($name, $value) 
	{
		$this->attributes[$name] = $value;
	}

	public function __get($name)
	{
		if (array_key_exists($name, $this->attributes)) {
			return $this->attributes[$name];
		}
	}

	public function mapToObject($objActiveRecord)
	{
		
		$this->attributes["book_id"]  = $objActiveRecord->book_id;
		$this->attributes["user_id"]  = $objActiveRecord->user_id;
	}

	// // convert Book_tb obj to array
	// public static function tb_to_array($borrowtb_obj){
	// 	return ["book_id" => $borrowtb_obj->book_id, "user_id" => $borrowtb_obj->user_id];
	// }
	// // convert array of Book_tb into array of array
	// public static function to_arrayofarray($borrowtbs)
	// {
	// 	$borrowtb_to_arr = array();
	// 	foreach ($borrowtbs as $borrowtb) 
	// 	{
	// 		array_push($borrowtb_to_arr, self::tb_to_array($borrowtb));
	// 	}
	// 	return $borrowtb_to_arr;
	// }
	public static function to_object($borrow)
	{
		$br_obj = new self();
		$br_obj->book_id = $borrow["book_id"];
		$br_obj->user_id = $borrow["user_id"];
		return $br_obj;
	}

	// convert this object to array
	public function to_array()
	{
		return $this->attributes ;
	}


	// convert array of borrow to array of borrow objects
	public static function to_objarray($borrows)
	{
		$borrows_obj_arr = array();
		foreach ($borrows as $borrow) 
		{
			array_push($borrows_obj_arr, self::to_object($borrow));
		}
		return $borrows_obj_arr;
	}
	
	// load borrow
	public function load($book_id, $user_id)
	{
		$borrow = new Borrow_tb();
		if($borrow->load("book_id=".$book_id. " AND user_id=".$user_id))
		{
			$this->attributes["book_id"]  = $borrow->book_id; 
			$this->attributes["user_id"]  = $borrow->user_id; 
			return true;
		}
		else
			return false;
	}

	// // load borrow
	// public function load($book_id)
	// {
	// 	$borrow_arr = (new Model(self::$table))->where(['book_id'=> $book_id]);
	// 	if($borrow_arr)
	// 	{
	// 		$row = $borrow_arr[0];
	// 		$this->book_id  = $row['book_id']; 
	// 		$this->user_id = $row['user_id'];
	// 		return true;
	// 	}
	// 	else
	// 		return false;
	// }

	// insert book into DB
	public function save()
	{
		$borrow = new Borrow_tb();
		$borrow->book_id = $this->book_id;
		$borrow->user_id = $this->user_id;
		if(!($borrow->save())){
			return false;
		}
		return true;
	}

	// delete the book from DB
	public function delete()
	{
		$borrow = new Borrow_tb();
		if(!($borrow->load("book_id=? AND user_id=?", array($this->book_id, $this->user_id))))
			return false;
		
		if(!$borrow->Delete())
		   return false;
		return true;
	}

	// get query select * from table where col1= AND col2=...
	private static function get_AND_part($data)
	{
		$where = "";
		foreach($data as $key => $value)
		{
			$where .= $key ."=".$value." && ";
		}
		$where  = trim($where ," && ");
		return $where ;
	}

	// get query select * from col IN (1, 2,...)
	private static function get_IN_part($data, $col)
	{
		$where = $col . " IN ( ";
		foreach($data as $d)
		{
			$where .= $d ." , ";
		}
		$where  = trim($where ," , ");
		$where  .= ")";
		return $where ;
	}

	// // get all borrows from DB
	// /*
	// 	return array of objects if $form = "obj" or 
	// 	array of array if $form = "arr"
	// */
	public static function borrows_list($obj_form = true, $data=[], $data_not = [], $IN = false, $col = "")
	{
		if($data)
		{
			if($IN)
				$where = self::get_IN_part($data, $col);
			else
				$where = self::get_AND_part($data);
			
		}
		else
			$where = "";

		$borrow_tbs = (new Borrow_tb())->find($where);
		$arrData = [];
		foreach($borrow_tbs as $key => $value) {
			$obj = new self();
			$obj->mapToObject($value);
			$arrData[] = $obj;
		}
		$arrResult = $arrData;
		if (!$obj_form) {
			$arrResult = [];
			foreach($arrData as $row) {
				$arrResult[] = $row->to_array();
			}
		}
		return $arrResult;
		
	}

	// SELECT * FROM users WHERE id IN ()
	// get users who borrow certain book
	public static function get_users($book_id, $obj_form = true)
	{
		$users_book = Borrow::borrows_list(false, ['book_id'=>$book_id]);
		if(empty($users_book)) {
			return [];
		}
		// get user ids;
		$user_ids = array();
		foreach($users_book as $x => $x_value) 
		{
			array_push($user_ids, $x_value["user_id"]);
		}
		// get users
		return User::users_list($obj_form, $user_ids, [], true, "id");
	}

	// get books who are borrowed by certain user
	public static function get_books($user_id, $obj_form = true)
	{
		$user_books = Borrow::borrows_list(false, ['user_id'=>$user_id]);
		if(empty($user_books)) {
			return [];
		}
		// get book ids
		$book_ids = "(";
		foreach($user_books as $x => $x_value) {
			$book_ids .= $x_value["book_id"] . " , ";
		}
		$book_ids = trim($book_ids ," , ");
		$book_ids  .= ")";
		
		//get books
		$data = [
				[
				'strKey' => "id" ,
				'strOperator' => "IN",
				'strValue' => $book_ids
				]
			];
		return Book::books_list($obj_form, $data);
	}

	

	

}