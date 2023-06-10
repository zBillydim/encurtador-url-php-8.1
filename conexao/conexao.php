<?php
header_remove('set-cookie');
header("Cache-Control: public, max-age=120");

function conectaDb(){
	$mysqli = new mysqli($_SERVER['HOST'], $_SERVER['LOGIN'], $_SERVER['PASSWORD'], $_SERVER['BASE']);
	if ($mysqli->connect_errno) {
	    echo "Em manutenção...";
	    exit;
	}
	
	$mysqli->query("SET character_set_results=utf8mb4");
	$mysqli->query("SET names 'utf8mb4'");
	
	return $mysqli;
}


?>