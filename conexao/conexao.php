<?php
define("config_db_host", "DB_HOST");
define("config_db_login", "DB_LOGIN");
define("config_db_senha", "DB_PASSWORD");
define("config_db_base", "DB_BASE");
header_remove('set-cookie');
header("Cache-Control: public, max-age=120");


function conectaDb(){
	$mysqli = new mysqli(constant("config_db_host"), constant("config_db_login"), constant("config_db_senha"), constant("config_db_base"));
	if ($mysqli->connect_errno) {
	    echo "Em manutenção...";
	    exit;
	}
	
	$mysqli->query("SET character_set_results=utf8mb4");
	$mysqli->query("SET names 'utf8mb4'");
	
	return $mysqli;
}


?>