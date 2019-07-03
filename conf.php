<?php

error_reporting( E_ALL );
ini_set('display_errors', 1);

if (session_status() !== PHP_SESSION_ACTIVE) 
	session_start();

date_default_timezone_set('America/Fortaleza');

define("BEANS", "/var/www/lsgc.ericksontavares.com.br/public_html/library/beans/");
define("MODELS", "/var/www/lsgc.ericksontavares.com.br/public_html/library/models/");
define("DBS", "/var/www/lsgc.ericksontavares.com.br/public_html/library/dbs/");

function autoLoader($className){

	$directories = array(
			"/var/www/lsgc.ericksontavares.com.br/public_html/library/controllers/"
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