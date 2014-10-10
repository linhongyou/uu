<?php
class User extends Model{
	private $id;
	private $username;
	private $password;
	function __construct(){
		parent::__construct();
	}
	private function __get($property_name) {
		if (isset ( $this->$property_name )) {
			return ($this->$property_name);
		} else {
			return (NULL);
		}
	}
	private function __set($property_name, $value) {
		$this->$property_name = $value;
	}

	
}
?>