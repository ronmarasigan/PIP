<?php

class Main extends Controller {
	
	function index()
	{
	
		$template = $this->loadView('mainView');
		$template->set('someval', 200);
		$template->render();
	}
    
}

?>
