<?php 

require_once DBS.'/PostgreSQL.php';

class User {
	 
	/*
	 * --- AUTHENTICATION
	 */
	public function login($userBean){
		
		if(is_object($userBean) && method_exists($userBean,"getUser") && method_exists($userBean,"getPass")){

			$pg = new PostgreSQL();
			
			$sql = 'SELECT id FROM login(?,?)';
				
			$result = $pg->select($sql, array($userBean->getUser(), $userBean->getPass()));
			
			if(!empty($result)){
				$userBean->setId($result[0]->id);
			} 
		} else 
			return "ERROR: Badly formatted Object User!";
		
		return $userBean;
	}
	
}

?>