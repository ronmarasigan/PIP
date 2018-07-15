<?php

class Model {

	private $connection;

	public function __construct()
	{
		global $config;
		
		$this->connection = mysqli_connect($config['db_host'], $config['db_username'], $config['db_password'], $config['db_name'], 3306) or die('MySQL Error: '. $this->connection->error());
	}

	public function escapeString($string)
	{
		return $this->connection->real_escape_string($string);
	}

	public function escapeArray($array)
	{
	    array_walk_recursive($array, create_function('&$v', '$v = $this->connection->escape_string($v);'));
		return $array;
	}
	
	public function to_bool($val)
	{
	    return !!$val;
	}
	
	public function to_date($val)
	{
	    return date('Y-m-d', $val);
	}
	
	public function to_time($val)
	{
	    return date('H:i:s', $val);
	}
	
	public function to_datetime($val)
	{
	    return date('Y-m-d H:i:s', $val);
	}
	
	public function query($qry)
	{
		$result = $this->connection->query($qry) or die('MySQL Error: '. $this->connection->error);
		$resultObjects = array();

		while($row = $result->fetch_object()) $resultObjects[] = $row;

		return $resultObjects;
	}

	public function execute($qry)
	{
		$exec = $this->connection->query($qry) or die('MySQL Error: '. $this->connection->error());
		return $exec;
	}
    
}
?>
