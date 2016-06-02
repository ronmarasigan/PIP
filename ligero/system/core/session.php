<?php

defined('APP_DIR') OR exit('-_- no eres Humano ?');


	function set($key, $val)
	{
		$_SESSION["$key"] = $val;
	}
	
	function get($key)
	{
		return $_SESSION["$key"];
	}
	
	function destroy()
	{
		session_destroy();
	}



?>
