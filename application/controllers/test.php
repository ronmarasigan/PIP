<?php
    class Test extends Controller {
        function demo($data = null) {
            if(isset($data)) {
                echo htmlentities($data);
            }
        }
    }
?>
