<?php

class Main extends Controller {
	
	function index()
	{
		$template = $this->loadView('main_view');
		$template->render();
	}
	
	function categoryAjax(){
		$model = $this->loadModel('example_model');
		
		$response = $model->getProjetos();
		if($response[0] === true){
			$this->render(array('data'=>$response[1]));
		}
		else{
			$this->render(array('data'=>array(), 'error'=> $response[1]);	
		}
	}
    
}

?>
