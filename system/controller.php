<?php

class Controller {
	
	public function loadModel($name){
		require(APP_DIR .'models'. DS . strtolower($name) .'.php');

		$model = new $name;
		return $model;
	}
	
	public function loadView($name){
		$view = new View($name);
		return $view;
	}
	
	public function loadPlugin($name){
		require(APP_DIR .'plugins'. DS . strtolower($name) .'.php');
	}
	
	public function loadHelper($name){
		require(APP_DIR .'helpers'. DS . strtolower($name) .'.php');
		$helper = new $name;
		return $helper;
	}
	
	public function redirect($loc){
		global $config;
		
		header('Location: '. $config['base_url'] . $loc);
	}

	public function render($response=array(), $tipo='json'){
		$tipo = strtolower($tipo);
		if($tipo === 'json'){
			die(json_encode($response));
		}
		else if($tipo === 'jsonp'){
			die($_REQUEST['callback'] . '(' . json_encode($response) . ');' );
		}
		else{
			echo $response;
		}
	}
    
}

?>
