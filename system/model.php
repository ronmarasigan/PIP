<?php

class Model extends PDO{

	private $connection;

	public function __construct(){
		global $config;

		try{
			$dsn = "mysql:dbname={$config['db_name']};host={$config['db_host']}";
			$this->connection = parent::__construct($dsn, $config['db_username'], $config['db_password']);
			parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return array('success'=>true, 'data'=> $this->connection);
		}
		catch(PDOException $e){
			return array('success'=>false, 'error'=> $e->getMessage());
		}
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

			return array('success'=>true, 'data'=> $pdo->fetchAll(PDO::FETCH_OBJ));
		}
		catch(PDOException $e){
			return array('success'=>false, 'error'=> $e->getMessage());
		}

	}

	public function execute($qry, $params=array()){
		try{
			$pdo = $this->prepare($qry);
			$pdo->execute($params);
			return array('success'=>true, 'data'=> $pdo->rowCount());
		}
		catch(PDOException $e){
			return array('success'=>false, 'error'=> $e->getMessage());
		}
	}
    
}
?>
