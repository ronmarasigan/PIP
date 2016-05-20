<?php

class Main extends Controller {
	
	function index()
	{
	
		$template = $this->loadView('main_view');
		$template->set('someval', 200);
		$template->render();
	}
    
}

?>
