<?php

class UserControllerTest {

	/*
	 * *** Authentication -----------------------------
	 */
	public function login(){

		$userController = new UserController();
		$return = $userController->login();
		if($return == "ERROR: Required fields not filled!")
			print "SUCESSO: Recusado a conculta com os parâmetros nulos! <br/>";
		else
			print "FALHA NO METODO LOGIN: Método deve filtrar os parâmetros nulos! <br/>";
		
		
				
			//$userBean = $objUser->login($userBean);
			
			//if($userBean->getId() != false){
				
			//	$_SESSION['auth'] = true;
			//	$_SESSION['user']['id'] = $userBean->getId();
				
			//	$return = 'SUCCESS';
				
			//} else {
			//	$return = 'nonexistent record';
			//}
			
		
	}
		
}

?>