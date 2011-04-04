<?php

class Example_model extends Model {
	
	public function getSomething($id)
	{
		$id = $this->escapeString($id);
		$class = $this->query('SELECT * FROM something WHERE id="'. $id .'"');
		return $class;
	}

}

?>
