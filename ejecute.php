<?php

function getDirContents ($dir, &$results = array()) {	
    $files = scandir($dir);	
    foreach($files as $key => $value){
        $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
        if(!is_dir($path)) {
            $results[] = $path;
        } else if($value != "." && $value != "..") {
            getDirContents($path, $results);
            $results[] = $path;
        }
    }
    return $results;
}

echo "<pre>";
print_r(getDirContents('./'));
echo "</pre>";


/*
if (!empty($_GET)) {

	foreach ($_GET AS $key => $value) {
		$_GET[$key] = htmlentities(addslashes($value));
	}
}
*/
