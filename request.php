<?php

require_once "conf.php";

function getController($type){

    $directories = array();
	$directories[] = '/var/www/lsgc.ericksontavares.com.br/public_html/library/controllers/';
	
	if(isset($_GET['dir']))
		$directories[] = '/var/www/lsgc.ericksontavares.com.br/public_html/library/controllers/'.$_GET['dir'].'/';
	
	
	foreach($directories as $dir){
		if (file_exists($dir . $type . '.php')) {
			require_once($dir . $type . '.php');
			return new $type;
		}
	}
	
}

if(!empty($_GET['class'])){
	
	$controller = getController($_GET['class']);
	if(!empty($_GET['method'])){
		if(method_exists($controller, $_GET['method'])){
			$function = $_GET['method'];
			$controller->$function();
		}
	}
}

?>