<?php

class Main extends Controller {
	
	function index()
	{
           //     $ejemplo=  $this->loadModel(example_model);
           //       echo  $ejemplo->prueba(1);
		$template = $this->loadView('public/mainView');
		$template->set('someval', 200);
		$template->render();
	}
    
}

?>
