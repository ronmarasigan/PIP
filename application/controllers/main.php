<?php

class Main extends Controller {
	
	function index()
    {
		$template = $this->load->view('main_view');
		$template->render();
	}
    
}

?>
