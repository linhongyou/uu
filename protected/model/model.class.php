<?php
class Model{
	function __construct() {
		
	}
	function findAll(){
		$list = array();
		for($i=0;$i<5;$i++){
			$m = new $this();
			$m->id=$i;
			$m->username="username{$i}";
			$m->password="{$i}{$i}{$i}{$i}{$i}{$i}";
			$list[] = $m;
		}
		return $list;
	}
}