<?php
import("Model.User");
class Index extends Controller{
	function __construct() {
		parent::__construct();
	}
	public function index() {
		$user = new User();
		$this->data["userlist"] = $user->findAll();
		print_r($this->data["userlist"]);
		$this->show();
	}
	public function add(){
		$this->show();
	}
	public function skt(){
		$this->show();
	}
	public function test(){
		header("Content-type: text/html; charset=utf-8");
		$string = "啊不才的饿发个";
		echo $this->utf8substr($string, 3, 6);
		die();
	}
	public function utf8substr($string,$start,$length){
		if($length<strlen($string)){
		$str = "";
		$len = $start+$length;
		for($i=$start;$i<$len;$i++){
			if(ord(substr($string,$i,1))>0xa0){
				$str .= substr($string, $i,4);
				$i++;
				$i++;
				$i++;
			}else{
				$str .= substr($string, $i,1);
			}
		}
			return $str;
		}else{
			return substr($string, $start);
		}
		
	}
	public function gbsubstr($string,$start,$length){
		if($length<strlen($string)){
		$str = "";
		$len = $start+$length;
		for($i=$start;$i<$len;$i++){
			if(ord(substr($string,$i,1))>0xa0){
				$str .= substr($string, $i,2);
				$i++;
			}else{
				$str .= substr($string, $i,1);
			}
		}
			return $str;
		}else{
			return substr($string, $start);
		}
		
	}
	public function ksort($arr){
		if(count($arr)<2){
			return $arr;
		}
		$left = array();
		$right = array();
		$key = $arr[0];
		for($i=1;$i<count($arr);$i++){
			if($key>$arr[$i]){
				$left[] = $arr[$i];
			}else{
				$right[] = $arr[$i];				
			}
		}
		$left = $this->ksort($left);
		$right = $this->ksort($right);
		return array_merge($left,array($key),$right);
	}
	public function erfenfa($arr,$a){
		$begin = 0;
		$end = count($arr)-1;
		while($begin<=$end){
			$step = floor(($begin+$end)/2);
			if($a<$arr[$step]){
				$end = $step-1;
			}elseif($a>$arr[$step]){
				$begin = $step+1;
			}else{
				return $step;
			}
		}
		return false;
	}
}

?>