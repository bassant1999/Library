<?php

namespace Model;

// defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Book class
 */
class  Book_tb extends \ADOdb_Active_Record
{
    var $_table = 'book';
}
class Book {

	// protected static $table = 'book';
	// protected $primaryKey = 'id';

	// $attributes have attributes in book
	protected $attributes = [];

    public function __construct() {
        $this->attributes = [
            'id' => '',
            'title' => '',
			'author' => '',
			'description' => '',
			'img_url' => '',
			'max_num' => '',
			'users' => []
        ];
    }

	// setter and getter
    public function __set($name, $value) {
		if($name == 'id') {
			return false;
		}
		$this->attributes[$name] = $value;
	}

	public function __get($name)
	{
		if (array_key_exists($name, $this->attributes)) {
			return $this->attributes[$name];
		}
	}


	// // convert Book_tb obj to array
	// public static function tb_to_array($booktb_obj){
	// 	return ["id" => $booktb_obj->id, "title" => $booktb_obj->title, "author" => $booktb_obj->author,
	// 	"description" => $booktb_obj->description, "img_url" => $booktb_obj->img_url,
	// 	"max_num" => $booktb_obj->max_num];
	// }
	// // convert array of Book_tb into array of array
	// public static function to_arrayofarray($booktbs)
	// {
	// 	$booktb_to_arr = array();
	// 	foreach ($booktbs as $booktb) 
	// 	{
	// 		array_push($booktb_to_arr, self::tb_to_array($booktb));
	// 	}
	// 	return $booktb_to_arr;
	// }

	// convert this object to array
	public function to_array()
	{
		return $this->attributes ;
	}
	public static function to_object($book)
	{
		$bk_obj = new self();
		$bk_obj->attributes["id"]  = $book['id'];
		// echo "id: " . $bk->id . ", ". $book['id'];
		$bk_obj->title = $book['title'];
		$bk_obj->author = $book['author'];
		$bk_obj->description = $book['description'];
		$bk_obj->img_url = $book['img_url'];
		$bk_obj->max_num = $book['max_num'];
		$bk_obj->users = $book['users'];
		return $bk_obj;
	}

	public function mapToObject($objActiveRecord)
	{
		
		$this->attributes["id"]  = $objActiveRecord->id;
		// echo "id: " . $bk->id . ", ". $book['id'];
		$this->title = $objActiveRecord->title;
		$this->author = $objActiveRecord->author;
		$this->description = $objActiveRecord->description;
		$this->img_url = $objActiveRecord->img_url;
		$this->max_num = $objActiveRecord->max_num;
		$this->users = $objActiveRecord->users;
	}

	// convert array of books into array of book objects
	public static function to_objarray($books)
	{
		$books_obj_arr = array();
		foreach ($books as $book) 
		{
			array_push($books_obj_arr, self::to_object($book));
		}
		return $books_obj_arr;
	}

	// load book
	public function load($book_id)
	{
		$book = new Book_tb();
		if($book->load("id=".$book_id))
		{
			$this->mapToObject($book);
			$this->users = Borrow::get_users($book->id, true);
			return true;
		}
		else
			return false;
	}

	// insert book into DB
	public function save()
	{
		
		$book = new Book_tb();
		if($this->id){
			if(!($book->load("id=".$this->id)))
				return false;
		}
		$book->title = $this->title;
		$book->author = $this->author;
		$book->description = $this->description;
		$book->img_url = $this->img_url;
		$book->max_num = $this->max_num;
		if(!($book->save())){
			return false;
		}
		$this->attributes["id"] = $book->id;
		return true;
		
	}

	// delete the book from DB
	public function delete()
	{
			
		$book = new Book_tb();
		if(!($book->load("id=?", $this->id)))
			return false;
		if(!$book->Delete())
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

	private static function get_bookids_userids($book_ids){
		$borrow_in_books = Borrow::borrows_list(true, $book_ids, [], true, "book_id");
		$bookids_userids = [];
		for ($i = 0; $i < count($borrow_in_books); $i++) {
			$book_id = $borrow_in_books[$i]->book_id;
			$user_id = $borrow_in_books[$i]->user_id;
			if (array_key_exists($book_id, $bookids_userids))
			{
				array_push($bookids_userids[$book_id], $user_id);
			}
			else
			{
				$bookids_userids[$book_id] = Array($user_id);
			}
		}
		return $bookids_userids;
	}
	// get all books from DB
	/*
		return array of objects if $form = "obj" or 
		array of array if $form = "arr"
	*/
	public static function books_list($obj_form = true, $data=[], $data_not = [], $IN = false, $col = "")
	{

		// if($data)
		// {
		// 	if($IN)
		// 		$where = self::get_IN_part($data, $col);
		// 	else
		// 		$where = self::get_AND_part($data);
		// }
		// else
		// 	$where = $data;

		// get book ids and convert book tb objects into book objects
		// print_r(self::GetFilter([
		// 	[
		// 	'strKey' => "title" ,
		// 	'strOperator' => "like",
		// 	'strValue' => 'home',
		// 	],
		// 	[
		// 	'strKey' => "name" ,
		// 	'strOperator' => "=",
		// 	'strValue' => 'bassant',
		// 	],
		// 	[
		// 		'strKey' => "name" ,
		// 		'strOperator' => "=",
		// 		'strValue' => 'bassant',
		// 	]
		// 	]));
		$where =self::GetFilter($data);
		$book_tbs = (new Book_tb())->find($where);
		$arrData = [];
		$book_ids = [];
		foreach($book_tbs as $key => $value) {
			$obj = new self();
			$obj->mapToObject($value);
			array_push($book_ids, $obj->id);
			$arrData[] = $obj;
		}

		// get users who borrow these book ids [1=>[2, 3], 3=>[1],...]
		$bookids_userids = self::get_bookids_userids($book_ids);
		// fill users feild in each obejct in arrData
		foreach($arrData as &$row) {
			$row->users = $bookids_userids[$row->id]?? [];
		}

		$arrResult = $arrData;
		if (!$obj_form) {
			$arrResult = [];
			foreach($arrData as &$row) {
				$arrResult[] = $row->to_array();
			}
		}
		return $arrResult;
	}

	// get users who borrow this book
	public function get_users($obj_form = true) {
		if(empty($this->attributes["id"])) { 
			// Book is not loaded 
			return [];
		}
		return Borrow::get_users($this->attributes["id"], $obj_form);
	}

	// borrow
	public function borrow($user_id)
	{
		$borrow = new Borrow();
		if($borrow->load($this->attributes["id"], $user_id))
		{
			// the user already has borrowed it
			return false;
		}
		else
		{
			if(count($this->users) < $this->max_num){
				$borrow->book_id =$this->attributes["id"];
				$borrow->user_id = $user_id;
				$borrow->save();
				// borrow is successfull
				return true;
			}
		}
		return false;
	}

	// return
	public function return($user_id){
		$borrow = new Borrow();
		if(!$borrow->load($this->attributes["id"], $user_id))
		{
			// fail
			return false;
		}
		else
		{
			$borrow->delete();
			// return is successfull
			return true;
		}
	}
	

	/* 
	input:
	$arrCondition:
	[
		[
		'strKey' => title ,
		'strOperator' => like,
		'strValue' => 'home',
		],
		[
		'strKey' => title ,
		'strOperator' => =,
		'strValue' => 'home',
		],...
	]
	$boolAND: true/false
	output: where for select where
	*/
	

	public static function GetFilter($arrCondition, $boolAND = true) {
		$delimeter = " && ";
		if(!$boolAND)
			$delimeter = " || ";
		$strCondition = "";
		for( $i = 0; $i < count($arrCondition); $i++ )
			$strCondition .= $arrCondition[$i]["strKey"] ." ". $arrCondition[$i]['strOperator']." ". $arrCondition[$i]['strValue'] .$delimeter;
		$strCondition   = trim($strCondition ,$delimeter);
		return $strCondition;
	}
}