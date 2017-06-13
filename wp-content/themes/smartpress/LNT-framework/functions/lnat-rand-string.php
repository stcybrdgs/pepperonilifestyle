<?php

/**
 * Random string function
 *
 * @return string
 * @author Level9themes
 **/	
	function Lnt_Random_String($length) {
	
	$key = null;

    $keys = array_merge(range(0,9), range('a', 'z'));

    for($i=0; $i < $length; $i++) {

        $key .= $keys[array_rand($keys)];

    }

    return $key;

}
