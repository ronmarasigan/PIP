<?php


class Pip {
	private $controller;
	private $action;
	private $url;

	function __construct(){
		$segments = $this->startParams();
		$segments = $this->startActions($segments);
		
		$obj = new $this->controller;
		die(call_user_func_array(array($obj, $this->action), array($segments)));
	}

	function startParams(){
		global $config;

		$this->controller = $config['default_controller'];
	    $this->action = 'index';
	    $this->url = APP_DIR;

	    $request_url = (isset($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : '';
		$script_url  = (isset($_SERVER['PHP_SELF'])) ? $_SERVER['PHP_SELF'] : '';

		if($request_url != $script_url){
			$this->url = trim(preg_replace('/'. str_replace('/', '\/', str_replace('index.php', '', $script_url)) .'/', '', $request_url, 1), '/');
		} 
		$segments = explode('/', $this->url);

		if(isset($segments[0]) && $segments[0] != '') $this->controller = $segments[0];
		if(isset($segments[1]) && $segments[1] != '') $this->action = $segments[1];

		return $segments;
	}

	function startActions($segments){
		global $config;
		
		$path = APP_DIR . 'controllers' . DS . $this->controller . '.php';
		$controller = $this->controller;

		if(file_exists($path)){
	        require_once($path);
		} else {
			$segments[0] = "Controller '{$controller}' Not Found! ";
	        $this->controller = $config['error_controller'];
	        require_once(APP_DIR . 'controllers' . DS . $this->controller . '.php');
		}
	    
	    if(!method_exists($this->controller, $this->action)){
			$this->action = 'index';
			$action = $this->action;
	    	$segments[0] = "Method '{$action}' in Controller '{$controller}' Not Found! ";
	        $this->controller = $config['error_controller'];
	        require_once(APP_DIR . 'controllers' . DS . $this->controller . '.php');
	    }

	    return $segments;
	}

}

?>
