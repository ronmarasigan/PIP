<?php

class Main extends Controller {

	function index()
	{
		$template = $this->loadView('main_view');
    $template->setCSS(array(
      array("static/css/style.css", "intern"),
      array("http://www.example.com/default.css", "extern")
    ));
    $template->setJS(array(
      array("static/js/index.js", "intern"),
      array("http://www.example.com/static.js", "extern")
    ));
		$template->render();
	}

}

?>
