<?php

class Sample extends Controller {
	
	function index()
	{
		$login = $this->loadModel('sampleModel');
    	$something = $login->getName();

		$template = $this->loadView('sample');
		$template->set('name', $something);
		$template->render();
	}

	function home()
	{
		$name = $_GET['name'];
		
		$template = $this->loadView('sample');
		$template->set('name', $name);
		$template->render();
	}

	function plugin()
	{
		//Loading Plugins
		$this->loadPlugin('strings');
		
		//Loading Template
		$template = $this->loadView('plugin');
		$template->render();
	}
    
}

?>
