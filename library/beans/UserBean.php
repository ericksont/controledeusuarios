<?php

class UserBean {
	
	private $_id;
	private $_user;
	private $_pass;
	
	public function getId(){
		return $this->_id;
	}
	
	public function setId($value) {
		$this->_id = $value;
	}
	
	public function getUser(){
		return $this->_user;
	}
	
	public function setUser($value){
		$this->_user = $value;
	}
	
	public function getPass(){
		return $this->_pass;
	}
	
	public function setPass($value){
		$this->_pass = $value;
	}
	
}

?>