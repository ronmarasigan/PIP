<?php

class Controller {
	
	public $load;  // Load object

    public function __construct()
    {
        $this->load = new Load();          
    }

	public function redirect($loc)
	{
		global $config;
		
		header('Location: '. $config['base_url'] . $loc);
	}
    
}

?>
