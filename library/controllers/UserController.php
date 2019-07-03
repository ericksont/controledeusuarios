<?php

require_once BEANS.'UserBean.php';
require_once MODELS.'User.php';

class UserController {

	/*
	 * *** Authentication -----------------------------
	 */
	public function login($user="", $pass=""){
		
		$return = '';
		
		if($user != '' && $pass != '') {
			
			$objUser = new User();
			$userBean = new UserBean();
			
			$userBean->setUser($user);
			$userBean->setPass(sha1($pass));
				
			$userBean = $objUser->login($userBean);
			
			if($userBean->getId() != false){
				
				$_SESSION['auth'] = true;
				$_SESSION['user']['id'] = $userBean->getId();
				
				$return = 'SUCCESS';
				
			} else {
				$return = 'nonexistent record';
			}
			
		} else {
			$return = 'ERROR: Required fields not filled!';
		}
		
		return $return;
	}
		
}

?>