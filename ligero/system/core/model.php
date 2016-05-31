<?php

defined('APP_DIR') OR exit('-_- no eres Humano ?');

class Model {

    private $connection;

            
    public function __construct() {
        global $config;// inicializamos config
        //las variables de conexion 
 
         
        if ($config['db_Database'] == 'Sqlite') {
            $this->connection = new PDO(ROOT_DIR . 'ligero/system/core/temp/db/' . $config['db_name'] . '.db') or die('Error con sqlite, Exploto :D' . PDOException);
        } elseif ($config['db_Database'] == 'pgsql') {
            try {
                 $this->connection = new PDO("pgsql:dbname=".$config['db_name'].";port=5432;host=".$config['db_host']."",$db_username, $db_password); 
            } catch (PDOException $e) {
                echo 'Falló la conexión: ' . $e->getMessage();
            }
        } else {
            $this->connection = mysql_pconnect($config['db_host'], $config['db_username'], $config['db_password']) or die('MySQL Error: ' . mysql_error());
            mysql_select_db($config['db_name'], $this->connection);
        }
    }

    public function escapeString($string) {
        return mysql_real_escape_string($string);
    }

    public function escapeArray($array) {
        array_walk_recursive($array, create_function('&$v', '$v = mysql_real_escape_string($v);'));
        return $array;
    }

    public function to_bool($val) {
        return !!$val;
    }

    public function to_date($val) {
        return date('Y-m-d', $val);
    }

    public function to_time($val) {
        return date('H:i:s', $val);
    }

    public function to_datetime($val) {
        return date('Y-m-d H:i:s', $val);
    }

    public function query($qry) {
        $result = mysql_query($qry) or die('MySQL Error: ' . mysql_error());
        $resultObjects = array();

        while ($row = mysql_fetch_object($result))
            $resultObjects[] = $row;

        return $resultObjects;
    }

    public function execute($qry) {
        $exec = $connection->query($qry) or die(' Error: ');
        return $exec;
    }

}

?>
