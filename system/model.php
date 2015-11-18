<?php

class Model {

	private $connection;

	public function __construct()
	{
		global $config;
		$this->connection = mysqli_connect($config['db_host'], $config['db_username'], $config['db_password']) or die('MySQL Error: '. mysql_error());
		mysqli_set_charset($this->connection, $config['charset']);
		mysqli_select_db($this->connection, $config['db_name']);
	}

	public function escapeString($string)
	{
		return mysqli_real_escape_string($this->connection, $string);
	}

	public function escapeArray($array)
	{
	    array_walk_recursive($array, create_function('&$v', '$v = mysqli_real_escape_string($this->connection, $v);'));
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
	
	public function execute($qry)
	{
		return mysqli_query($this->connection, $qry) or die('MySQL Error: '. mysqli_error($this->connection));
	}
	
	public function query($qry)
	{
		$result = mysqli_query($this->connection, $qry) or die('MySQL Error: '. mysqli_error($this->connection));
		$resultObjects = array();

		while($row = mysqli_fetch_object($result)) $resultObjects[] = $row;

		return $resultObjects;
	}
    
}

