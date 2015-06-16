<?php
    class Sess extends Controller {
        function index() {
            // DELETE THIS IT IS ONLY FOR TESTING
            $_SESSION['test'] = 'LOL';
            echo session_id() . '<br>';
            echo $_SESSION['regen'];
        }
    }
?>
