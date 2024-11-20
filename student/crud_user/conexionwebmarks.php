<?php
class database{
	private static $dbhost="localhost";
	private static $dbname="aleja";
	private static $dbusername="root";
	private static $dbuserpassword="";
	public static function conectar(){
		try{
			$con=new PDO("mysql:host=".self::$dbhost.";dbname=".self::$dbname,self::$dbusername,self::$dbuserpassword);
			$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			return $con;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}
} 
// $nuevo=new database();
// $nuevo->conectar();
 ?>