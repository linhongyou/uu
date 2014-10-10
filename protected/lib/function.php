<?php
if (! defined ( 'IN' ))
	die ( 'bad request' );

function import($class){
	$class = str_replace(".", DS, $class);
	$class = strtolower($class);
	include_once( ROOT .$class.'.class.php' );
}
function transcribe($aList, $aIsTopLevel = true) {
	$gpcList = array ();
	$isMagic = get_magic_quotes_gpc ();
	foreach ( $aList as $key => $value ) {
		if (is_array ( $value )) {
			$decodedKey = ($isMagic && ! $aIsTopLevel) ? stripslashes ( $key ) : $key;
			$decodedValue = transcribe ( $value, false );
		} else {
			$decodedKey = stripslashes ( $key );
			$decodedValue = ($isMagic) ? stripslashes ( $value ) : $value;
		}
		$gpcList [$decodedKey] = $decodedValue;
	}
	return $gpcList;
}
$_GET = transcribe ( $_GET );
$_POST = transcribe ( $_POST );
$_REQUEST = transcribe ( $_REQUEST );
function v($str) {
	return isset ( $_REQUEST [$str] ) ? $_REQUEST [$str] : false;
}
function get($str) {
	return isset ( $_GET [$str] ) ? $_GET [$str] : false;
}
function post($str) {
	return isset ( $_POST [$str] ) ? $_POST [$str] : false;
}
function c($str) {
	return isset ( $GLOBALS ['config'] [$str] ) ? $GLOBALS ['config'] [$str] : false;
}
function g($str) {
	return isset ( $GLOBALS [$str] ) ? $GLOBALS [$str] : false;
}
function setg($key, $value) {
	$GLOBALS [$key] = $value;
}
function k($str) {
	return isset ( $_COOKIE [$str] ) ? $_COOKIE [$str] : false;
}
/**
 * 获得客户端IP
 * 
 * @category 基础类
 * @return string
 */
function getip() {
	if (getenv ( "HTTP_CLIENT_IP" ) && strcasecmp ( getenv ( "HTTP_CLIENT_IP" ), "unknown" )) {
		$ip = getenv ( "HTTP_CLIENT_IP" );
	} elseif (getenv ( "REMOTE_ADDR" ) && strcasecmp ( getenv ( "REMOTE_ADDR" ), "unknown" )) {
		$ip = getenv ( "REMOTE_ADDR" );
	} elseif (isset ( $_SERVER ['REMOTE_ADDR'] ) && $_SERVER ['REMOTE_ADDR'] && strcasecmp ( $_SERVER ['REMOTE_ADDR'], "unknown" )) {
		$ip = $_SERVER ['REMOTE_ADDR'];
	} else {
		$ip = "unknown";
	}
	return $ip;
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------
//数据库
$db_file =  ROOT . 'lib'.DS.'db.class.php';
if( file_exists( $db_file ) )  import("lib.db");
//memcache缓存
if(c('mc')){
	$mc_file =  ROOT . 'lib'.DS.'mc.class.php';
	if( file_exists( $mc_file ) ) import("lib.mc");
}
//redis缓存
if(c('rd')){
	$rd_file =  ROOT . 'lib'.DS.'rd.class.php';
	if( file_exists( $rd_file ) ) import("lib.rd");
}
//Controller
import("Model.Model");
import("Controller.Controller");