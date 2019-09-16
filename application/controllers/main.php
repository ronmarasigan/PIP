<?php

class Main extends Controller {
	
	function index(){
		$template = $this->loadView('main_view');
		$template->render();
	}
	
	function category(){
		//return ajax json
		$model = $this->loadModel('example_model');
		$this->render(array('data'=>$model->getCategory()), 'json');
	}
    
}

?>
