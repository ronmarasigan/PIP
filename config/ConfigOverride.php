<?php

class ConfigOverride {
	
 	public static function __override() {
		
		Config :: $Host = 'localhost';
   		Config :: $User = 'root';
   		Config :: $Password = '123';
		Config :: $Database = 'schoolneuron';
		
		//URLs
		Config :: $URL = 'http://localhost/QuickSilver/';
		Config :: $js_url = 'http://localhost/QuickSilver/js/';
		Config :: $css_url = 'http://localhost/QuickSilver/css/';
		Config :: $images_url = 'http://localhost/QuickSilver/css/';
	}
	
	
}

?>
