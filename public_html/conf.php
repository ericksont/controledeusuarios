<?php

error_reporting( E_ALL );
ini_set('display_errors', 1);
ini_set('display_startup_erros',1);

if (session_status() !== PHP_SESSION_ACTIVE) 
	session_start();

date_default_timezone_set('America/Fortaleza');

// -- Define variables of system
define('ROOT', "/");
define('ABSOLUTE_PATH', 'C:\xampp\htdocs\sgc\\');

define("DBS", "/var/www/library/dbs/");
define("BEANS", "/var/www/library/beans/");
define("MODELS", "/var/www/library/models/");
define("CONTROLLERS", "/var/www/library/controllers/");

$url = explode('/', @$_REQUEST['url']);
define('DEPARTMENT', @$url[0]);
define('SESSION', @$url[1]);
define('ACTION', @$url[2]);

// -- AutoLoader to classes
function autoLoader($className){

	$directories = array(
		CONTROLLERS
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