<?php
/**View 
 *
 * @author      Cesar Darinel Ortiz
 */


defined('APP_DIR') OR exit('-_- no eres Humano ?');
class View {
	//var
	private $pageVars = array();
	private $template;
	/**
	 * Encodes string for use in XML
	 *
	 * @param       String $template 
	 * @return      null
	 */
	public function __construct($template)
	{
		$this->template = APP_DIR .'views/'. $template .'.php';
	}
	/**
	 * Encodes string for use in XML
	 *
	 * @param       String
	 * @return      string
	 */
	public function set($var, $val)
	{
		$this->pageVars[$var] = $val;
	}

	public function render()
	{
		extract($this->pageVars);

		ob_start();
		require($this->template);
		echo ob_get_clean();
	}
    
}

?>