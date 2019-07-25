<?php

class ProfileBean {
	
	private $_id;
	private $_name;
    private $_image;
    private $_email;
    private $_status;

    private $_User;
	
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