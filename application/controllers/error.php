<?php
/**
 * Error Controller Class 
 *
 * This is the error controller class, it is used to display errors
 *
 * @author Gilbert Pellegrom
 * @package PIP
 */
class Error extends Controller {
	
    /**
     * Default controller function
     * Returns 404 error
     */
	function index()
	{
		$this->error404();
	}
	
    /**
     * Displays 404 'File Not Found' error
     */
	function error404()
	{
		echo '<h1>404 Error</h1>';
		echo '<p>Looks like this page doesn\'t exist</p>';
	}
    
}

?>
