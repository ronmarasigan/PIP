<?php
    class Model {
	    private $connection;

	    public function __construct() {
		    global $config;
            try {
                $this->connection = new PDO('mysql:host='.$config['dbhost'].';dbname='.$config['dbname'],$config['dbuser'],$config['dbpass']);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                die('Could not connect to database...');
            }
        }

        public function __destruct() {
            $this->connection = null;
        }

    }
?>
