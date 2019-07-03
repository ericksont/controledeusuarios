<?php

error_reporting( E_ALL );
ini_set('display_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) 
	session_start();

date_default_timezone_set('America/Fortaleza');

define("BEANS", "/var/www/library/beans/");
define("MODELS", "/var/www/library/models/");
define("DBS", "/var/www/library/dbs/");

function autoLoader($className){

	$directories = array(
			"/var/www/library/controllers/"
	);
	 
	foreach($directories as $directory){
		 
		$path = $directory.sprintf('%s.php', $className);
		if(file_exists($path)){
			include_once $path;
			return;
		}

	}
}

spl_autoload_register('autoLoader');

?>