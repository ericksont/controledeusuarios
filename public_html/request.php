<?php

require_once "conf.php";

function getController($type){

    $directories = array();
	$directories[] = CONTROLLERS;
	
	if(isset($_GET['dir']))
		$directories[] = CONTROLLERS.$_GET['dir'].'/';
	
	
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