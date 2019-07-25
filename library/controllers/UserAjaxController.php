<?php

class UserAjaxController {
	
	/*
	 * *** Authentication -----------------------------
	 */
	public function login() {
		$obj = new UserController();
		print $obj->login($_POST['user'], $_POST['pass']);
	}

	public function logout() {
		$obj = new UserController();
		print $obj->logout();
	}
	
}

?>