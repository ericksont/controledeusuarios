<?php 
	require_once "conf.php"; 

	if(isset($_SESSION['auth']) && $_SESSION['auth'] === true) {
		print "Carrega Sistema";
	} else {
		require_once 'login.php';
	}

?>
