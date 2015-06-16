<?php
    class Sess extends Controller {
        function index() {
            $_SESSION['test'] = 'LOL';
            echo 'Set';
        }
    }
?>
