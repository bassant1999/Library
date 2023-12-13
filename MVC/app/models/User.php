<?php

namespace Model;

// defined('ROOTPATH') OR exit('Access Denied!');

/**
 * User class
 */
use  \ADOdb_Active_Record as  ADOdb_Active_Record;
 class  User_tb extends ADOdb_Active_Record
{
    var $_table = 'users';
}

class User
{
	// $attributes have attributes in user
	protected $attributes = [];

    public function __construct() {
        $this->attributes = [
            'id' => '',
            'name' => '',
			'mail' => '',
			'pwd' => '',
			'type' => ''
        ];
    }

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
	// convert user_tb object into user object
	public function mapToObject($objActiveRecord)
	{
		$this->attributes["id"]  = $objActiveRecord->id;
		$this->name = $objActiveRecord->name;
		$this->mail = $objActiveRecord->mail;
		$this->pwd = $objActiveRecord->pwd;
		$this->type = $objActiveRecord->type;
	}
	
	// convert this object to array
	public function to_array()
	{
		return $this->attributes ;
	}

	// load user
	public function load($user_id)
	{
		$user = new User_tb();
		if($user->load("id=".$user_id))
		{
			$this->mapToObject($user);
			return true;
		}
		else
			return false;
	}

	// insert or update user in DB
	public function save()
	{
		$user = new User_tb();
		if($this->id){
			if(!($user->load("id=".$this->id)))
				return false;
		}
		$user->name = $this->name;
		$user->mail = $this->mail;
		$user->pwd = $this->pwd;
		$user->type = $this->type;
		if(!($user->save())){
			return false;
		}
		$this->attributes["id"] = $user->id;
		return true;
	}

	// delete the user from DB
	public function delete()
	{
		$user = new User_tb();
		if(!($user->load("id=?", $this->id)))
			return false;
		if(!$user->Delete())
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

	// get all users from DB
	/*
		return array of objects if $form = "obj" or 
		array of array if $form = "arr"
	*/
	public static function users_list($obj_form = true, $data=[], $data_not = [], $IN = false, $col = "")
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
		// echo "were: ". $where ."\r \n";
		$user_tbs = (new User_tb())->find($where);
		$arrData = [];
		if($user_tbs)
		{
			foreach($user_tbs as $key => $value) {
				$obj = new self();
				$obj->mapToObject($value);
				$arrData[] = $obj;
			}
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

}