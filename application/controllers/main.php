<?php
    class Main extends Controller {
        function index() {
            $data = $this->loadModel('example');
            $template = $this->loadView('view');
            $template->set('data', 'Hello World');
            $template->render();
        }
    }
?>
