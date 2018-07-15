<?php

class View {

	private $pageVars = array();
	private $template;

	public function __construct($template)
	{
		$this->template = APP_DIR .'views/'. $template .'.php';
	}

	public function set($var, $val)
	{
		$this->pageVars[$var] = $val;
	}

	public function render()
	{
		extract($this->pageVars);

        $contents = file_get_contents($this->template);

        $variables = array_merge($GLOBALS, get_defined_vars(), get_defined_constants());

        $interpolated = preg_replace_callback('/{{\s*(.*?)\s*}}/i', function($matches) use ($variables) {
            extract($variables);

            return eval("return htmlspecialchars(" . $matches[1] . ");");
        }, $contents);

		echo $interpolated;
	}

}

?>
