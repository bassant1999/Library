<?php 

namespace Model;

// defined('ROOTPATH') OR exit('Access Denied!');

trait Database
{

	private function connect()
	{
		$string = "mysql:host=".DBHOST.";dbname=".DBNAME;
		$con = new \PDO($string,DBUSER,DBPASS);
		// echo "yes";
		return $con;
	}

	public function query($query, $data = [], $insert=false)
	{

		$con = $this->connect();
		$stm = $con->prepare($query);

		$check = $stm->execute($data);
		if($check)
		{
			$result = $stm->fetchAll(\PDO::FETCH_ASSOC);
            // fetchAll(\PDO::FETCH_OBJ);
			if(is_array($result) && count($result))
			{
				return $result;
			}
			elseif($insert)
			{
				return $con->lastInsertId();
			}
		}

		return false;
	}

	public function get_row($query, $data = [])
	{

		$con = $this->connect();
		$stm = $con->prepare($query);

		$check = $stm->execute($data);
		if($check)
		{
			$result = $stm->fetchAll(\PDO::FETCH_OBJ);
			if(is_array($result) && count($result))
			{
				return $result[0];
			}
		}

		return false;
	}
	
}


