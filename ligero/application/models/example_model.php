<?php

class Example_model extends Model {
	
	public function getSomething($id)
	{
		$id = $this->escapeString($id);
		$result = $this->query('SELECT * FROM something WHERE id="'. $id .'"');
		return $result;
	}
        public function prueba($id)
	{       
		//$this->execute('CREATE TABLE people (full_name varchar(255), job_title varchar (255))');
                echo "Table people has been created \n";
               // $this->execute('INSERT INTO people (full_name, job_title) VALUES ("John Doe","manager")');
                echo "Row inserted \n";
		//$result = $this->query('SELECT * FROM people WHERE id="'. $id .'"');
		return $result;
	}

}

?>
