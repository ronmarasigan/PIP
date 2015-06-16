<?php
    class Sessecho extends Controller {
        function index() {
            // DELETE THIS IT IS ONLY FOR TESTING
            if(isset($_SESSION['test'])) {
                echo $_SESSION['test'];
            }
        }
    }
?>
