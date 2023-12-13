<?php 

// defined('ROOTPATH') OR exit('Access Denied!');

// spl_autoload_register(function($classname){

// 	$classname = explode("\\", $classname);
// 	$classname = end($classname);
// 	require $filename = "../app/models/".ucfirst($classname).".php";
// });

require 'config.php';
require 'functions.php';
require 'Database.php';
require 'Model.php';
require 'Controller.php';
require 'App.php';
// require "../app/models/User.php";

// connect to adodb
// require_once '../../adodb5/adodb-active-record.inc.php';
require_once 'adodb/adodb.inc.php';
require_once 'adodb/adodb-active-record.inc.php';
 
$db = NewADOConnection('mysql://'.DBUSER.':'.DBPASS.'@'.DBHOST.'/'.DBNAME);
 
/*
* Now link the database to the Active Record Class
*/
ADOdb_Active_Record::SetDatabaseAdapter($db);
 
 
/*
* Create the temporary table
*/
// $db->Execute("CREATE TABLE `persons` (
//              `id` int(10) unsigned NOT NULL auto_increment,
//              `name_first` varchar(100) NOT NULL default '',
//              `name_last` varchar(100) NOT NULL default '',
//              `favorite_color` varchar(100) NOT NULL default '',
//              PRIMARY KEY  (`id`)
//             ) ENGINE=MyISAM;
//             ");
 
// class person extends ADOdb_Active_Record{}
// $person = new person();
// $person->load("id=3");
// var_dump($person->name_first);
// $person->name_first     = 'Andi';
// $person->name_last      = 'Gutmans';
// $person->favorite_color = 'blue';
// $person->save();
// var_dump($person->id);
// $person->favorite_color = 'red';
// $person->save();

// class book extends ADOdb_Active_Record{}
// $book = new book('book');
// $book->title = "hello";
// $book->save();
 
// class  book extends ADOdb_Active_Record
// {
//     var $_table = 'book';
// }
// $book = new  book();
// $book->title = "hello";
// $book->save();

require_once "smarty/libs/Smarty.class.php";

// // create object
// $smarty = new Smarty;

// // assign some content. This would typically come from
// // a database or other source, but we'll use static
// // values for the purpose of this example.
// $smarty->assign('name', 'george smith');
// $smarty->assign('address', '45th & Harris');

// // display it
// // $smarty->display('name');