<?php

class Model extends PDO{

	private $connection;

	public function __construct(){
		global $config;

		try{
			$dsn = "mysql:dbname={$config['db_name']};host={$config['db_host']}";
			$this->connection = parent::__construct($dsn, $config['db_username'], $config['db_password']);
			parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e){
			return $e->getMessage();
		}
	}

	//deprecated
	public function escapeString($string){
		return mysql_real_escape_string($string);
	}

	//deprecated
	public function escapeArray($array){
	    array_walk_recursive($array, create_function('&$v', '$v = mysql_real_escape_string($v);'));
		return $array;
	}
	
	public function to_bool($val){
	    return !!$val;
	}
	
	public function to_date($val){
	    return date('Y-m-d', $val);
	}
	
	public function to_time($val){
	    return date('H:i:s', $val);
	}
	
	public function to_datetime($val){
	    return date('Y-m-d H:i:s', $val);
	}
	
	public function query($qry, $params=array()){
		try{
			$pdo = $this->prepare($qry);
			$pdo->execute($params);

			return $pdo->fetchAll(PDO::FETCH_OBJ);
		}
		catch(PDOException $e){
			return $e->getMessage();
		}

	}

	public function execute($qry, $params=array()){
		try{
			$pdo = $this->prepare($qry);
			$pdo->execute($params);
			return $pdo->rowCount();
		}
		catch(PDOException $e){
			return $e->getMessage();
		}
	}
    
}
?>
