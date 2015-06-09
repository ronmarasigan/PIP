<?php
    class Main extends Controller {
	    function index() {
		    $template = $this->loadView('view');
            $template->set('data', 'Hello World!');
            $template->render();
	    }
    }
?>
