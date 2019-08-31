<?php
/**
 * URL Helper Class 
 *
 * Provides helpder functions for handling URLs
 *
 * @author Gilbert Pellegrom
 * @package PIP
 */
class Url_helper {

    /**
     * Returns the base URL for the instalation
     * @return string
     */
	function base_url()
	{
		global $config;
		return $config['base_url'];
	}
	
    /**
     * Returns a segment of the current page URL
     * @param int @seg The segment to return
     * @return string
     */
	function segment($seg)
	{
		if(!is_int($seg)) return false;
		
		$parts = explode('/', $_SERVER['REQUEST_URI']);
	    return isset($parts[$seg]) ? $parts[$seg] : false;
	}
	
}

?>
