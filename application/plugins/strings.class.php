<?php 

function randomString($length){
		$valid_chars="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
		$random_string = "";
		$num_valid_chars = strlen($valid_chars);
		for ($i = 0; $i < $length; $i++){
			$random_pick = mt_rand(1, $num_valid_chars);
			$random_char = $valid_chars[$random_pick-1];
			$random_string .= $random_char;
		}
		return $random_string;
	} 
function encrypt($string, $key)
    {
        $result = '';
        for($i = 0; $i < strlen($string); $i++) {
            $char    = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char    = chr(ord($char) + ord($keychar));
            $result .= $char;
        }
        return base64_encode($result);
    }

function decrypt($string, $key)
    {
        $result = '';
        $string = base64_decode($string);
        for($i = 0; $i < strlen($string); $i++) {
            $char    = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char    = chr(ord($char) - ord($keychar));
            $result .= $char;
        }
        return $result;
    }
	
	
function makeUrlFriendly($input)
    {
        $output = preg_replace("/\s+/" , "_" , trim($input));
        $output = preg_replace("/\W+/" , "" , $output);
        $output = preg_replace("/_/" , "-" , $output);
        return strtolower($output);
}

function convertLinks($text)
{
        $text = preg_replace('/(((f|ht){1}tps?:\/\/)[-a-zA-Z0-9@:;%_\+.~#?&\/\/=]+)/', '<a href="\\1" target="_blank">\\1</a>', $text);
        $text = preg_replace('/([[:space:]()[{}])(www.[-a-zA-Z0-9@:;%_\+.~#?&\/\/=]+)/', '\\1<a href="http://\\2" target="_blank">\\2</a>', $text);
        $text = preg_replace('/(([0-9a-zA-Z\.\-\_]+)@([0-9a-zA-Z\.\-\_]+)\.([0-9a-zA-Z\.\-\_]+))/', '<a href="mailto:$1">$1</a>', $text);
        return $text;
}

	
?>