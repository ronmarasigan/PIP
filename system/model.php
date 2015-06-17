<?php
    class Model {
	    private $connection;

	    public function __construct() {
		    global $config;
            try {
                $this->connection = new PDO('mysql:host='.$config['db_host'].';dbname='.$config['db_name'],$config['db_user'],$config['db_pass']);
                // NOTE: Specify SSL parameters if database is not on localhost
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                die('Could not connect to database...');
            }
        }

        public function __destruct() {
            $this->connection = null;
        }

        public function getDB() {
            return $this->connection;
        }
    }
?>
