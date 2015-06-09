<?php
    class Error extends Controller {
	    function index() {
		    $this->errorMsg();
	    }
	    
        function errorMsg() {
            echo 'There is an error, that is all we know...';
        }
    }
?>
