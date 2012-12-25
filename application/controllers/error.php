<?php

class Error extends Controller {
	
	function index($segments){
		return $this->error($this->getMessage($segments));
	}

	function getMessage($segments){
		if(is_array($segments)){
			$segments = $segments[0];
		}

		return $segments;
	}

	function error($segments="Error!"){
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			return json_encode(array(
				'success' => false, 
				'data' => array(),
				'msg'=> utf8_encode($segments)
			));
		}
		else{
			return utf8_decode("<h1>{$segments}</h1>");
		}
		
	}
    
}

?>
