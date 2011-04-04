<?php

class Session_helper {

	function set_data($key, $val)
	{
		$_SESSION["$key"] = $val;
	}
	
	function get_data($key)
	{
		return $_SESSION["$key"];
	}
	
	function destroy()
	{
		session_destroy();
	}

}

?>