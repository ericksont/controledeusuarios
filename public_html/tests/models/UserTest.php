<?php 

require_once BEANS.'/UserBean.php';
require_once MODELS.'/User.php';

class UserTest {
	 
	/*
	 * --- AUTHENTICATION
	 */
	public function login(){

		//--
		$user = new User();
		$return = $user->login("teste");
		if($return != "ERROR: Badly formatted Object User!")
			print "FALHA NO METODO LOGIN: Deve ser informado o objeto UserBean como parâmetro! <br/>";
		else
			print "SUCESSO: Recusado a conculta sem o parâmetro UserBean! <br/>";

		//--
		$userBean = new UserBean();
		$userBean->setUser("admin");
		$userBean->setPass("d033e22ae348aeb5660fc2140aec35850c4da997");
		$user = new User();
		$return = $user->login($userBean);
		if(!is_object($userBean))
			print "FALHA NO METODO LOGIN: O objeto bean deve ser retornado! <br/>";
		else
			print "SUCESSO: Método executado corretamente! <br/>";
			
	}
	
}

?>