<?php 
	require_once "conf.php";

	if(isset($_SESSION['auth']) && $_SESSION['auth'] === true) {
		require_once 'main.php';
	} else {
		require_once "login.php";
	}

?>
