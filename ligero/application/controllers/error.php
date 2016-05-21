<?php
/**Error 
 *
 * @author      Cesar Darinel Ortiz
 */
class Error extends Controller {
	
	function index()
	{
		$this->error404();
	}
	
	/**
	 * Encodes string for use in XML
	 *
	 * @param       null
	 * @return      string
	 */
	function error404()
	{
		echo '<h1>404 Error</h1>';
		echo '<p>Looks like this page doesn\'t exist</p>';
	}
    
}

?>
