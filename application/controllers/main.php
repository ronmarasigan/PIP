<?php
    class Main extends Controller {
	    function index() {
		$data = $this->loadModel('example');
		$data->addID(100);
                $template = $this->loadView('view');
                $template->set('data', 'Hello World');
                $template->render();
	    }
    }
?>
