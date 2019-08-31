<?php
/**
 * Model base class
 *
 * This is the base class for a model object
 *
 * @author Gilbert Pellegrom
 * @package PIP
 */
class Model {
    
    /**
     * Connection to DB
     * @access private
     */
	private $connection;

    /**
     * Load object
     * @access public
     */
    public $load;

    /**
     * Constructor
     * Initiates connection to MySQL DB
     * @global array $config Configuration parameter array
     */
	public function __construct()
	{
		global $config;
		
        $this->connection = mysql_pconnect(
                $config['db_host'],
                $config['db_username'], 
                $config['db_password']
                ) 
                or die('MySQL Error: '. mysql_error());
		mysql_select_db($config['db_name'], $this->connection);

        $this->load = new Load();
	}

    /**
     * Escapes string for safe use in SQL query
     * @param string $string String to escape
     * @return string
     */
	public function escapeString($string)
	{
		return mysql_real_escape_string($string);
	}

    /**
     * Escapes all strings in an array
     * @param array $array Array containing strings to be escaped
     * @return array
     */
	public function escapeArray($array)
	{
	    array_walk_recursive($array, create_function('&$v', '$v = mysql_real_escape_string($v);'));
		return $array;
	}
	
    /**
     * Converts a boolean value to an SQL safe string representation
     * for use in a query
     * @param boolean $val A boolean value
     * @return string
     */
	public function to_bool($val)
	{
	    return !!$val;
	}
	
    /**
     * Converts a PHP date in to a SQL safe string representation
     * for use in a query
     * @param int $val A timestamp value
     * @return string
     */
	public function to_date($val)
	{
	    return date('Y-m-d', $val);
	}
	
    /**
     * Converts a PHP time in to a SQL safe string representation
     * for use in a query
     * @param int $val A timestamp value
     * @return string
     */
	public function to_time($val)
	{
	    return date('H:i:s', $val);
	}
	
    /**
     * Converts a PHP datetime in to a SQL safe string representation
     * for use in a query
     * @param int $val A timestamp value
     * @return string
     */
	public function to_datetime($val)
	{
	    return date('Y-m-d H:i:s', $val);
	}
	
    /**
     * Queries the database, returns the result as a associative array
     * @param string $qry MySQL query
     * @return array
     */
	public function query($qry)
	{
		$result = mysql_query($qry) or die('MySQL Error: '. mysql_error());
		$resultObjects = array();

		while($row = mysql_fetch_object($result)) $resultObjects[] = $row;

		return $resultObjects;
	}

    /**
     * Executes a query against the database,
     * returns boolean success of the query
     * @param string $qry MySQL query
     * @return boolean
     */
    public function execute($qry)
	{
		$exec = mysql_query($qry) or die('MySQL Error: '. mysql_error());
		return $exec;
	}
    
}
?>
