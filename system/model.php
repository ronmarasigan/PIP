<?php

class Model {

	private $connection;

	public function __construct()
	{
		global $config;
		
		$this->connection = mysql_pconnect($config['db_host'], $config['db_username'], $config['db_password']) or die('MySQL Error: '. mysql_error());
		mysql_select_db($config['db_name'], $this->connection);
	}

	public function escapeString($string)
	{
		return mysql_real_escape_string($string);
	}

	public function query($qry)
	{
		$result = mysql_query($qry) or die('MySQL Error: '. mysql_error());
		$resultObjects = array();

		while($resultObjects[] = mysql_fetch_object($result));

		return $resultObjects;
	}

	public function execute($qry)
	{
		$exec = mysql_query($qry) or die('MySQL Error: '. mysql_error());
		return $exec;
	}
    
}
?>
