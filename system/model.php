<?php

class Model {

	private $connection;

	public function __construct()
	{
		global $config;
		
		$this->connection = new mysqli($config["db_host"],$config["db_username"],$config["db_password"],$config["db_name"]);
		
	}

	public function escapeString($string)
	{
		return mysqli_real_escape_string($this->connection,$string);
	}

	public function escapeArray($array)
	{
		$clean = [];
		foreach ($array as $key => $value) {
			$clean[$key] = mysqli_real_escape_string($this->connection,$value);
		}
		return $clean;
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
		$result = $this->connection->query($qry) or die('MySQL Error: '. mysqli_error($this->connection));

		return $result;
	}

	public function execute($qry)
	{
		$exec = mysqli_query($qry) or die('MySQL Error: '. mysqli_error());
		return $exec;
	}
    
}
?>
