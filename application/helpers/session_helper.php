<?php
/**
 * Session Helper Class 
 *
 * Provides helpder functions for handling sessions
 *
 * @author Gilbert Pellegrom
 * @package PIP
 */
class Session_helper {

    /**
     * Set a key-value pair in the session
     * @param string $key The key name
     * @param mixed $val The data value
     */
	function set($key, $val)
	{
		$_SESSION["$key"] = $val;
	}
	
    /**
     * Get data stored in the session
     * @param string $key The key name
     * @return mixed
     */
	function get($key)
	{
		return $_SESSION["$key"];
	}
	
    /**
     * Destroy the current session
     */
	function destroy()
	{
		session_destroy();
	}

}

?>
