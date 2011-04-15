<?php

class Url_helper {

	function base_url()
	{
		global $config;
		return $config['base_url'];
	}
	
	function segment($seg)
	{
		$url = trim($_GET['_url'], '/');
		$parts = explode('/', $url);
        if(isset($parts[$seg]))
            return $parts[$seg];
        else
            return false;
	}
	
}

?>