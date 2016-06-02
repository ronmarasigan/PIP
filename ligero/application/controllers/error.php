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

		$template = $this->loadView('public/error');

		$template->render();
	}
}

?>
