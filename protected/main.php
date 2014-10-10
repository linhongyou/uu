<?php
if (! defined ( 'IN' ))
	die ( 'bad request' );

@include_once (ROOT . 'config' . DS . 'config.php');
@include_once (ROOT . 'lib' . DS . 'function.php');
$c = v ( 'c' ) ? v ( 'c' ) : 'index';
$a = v ( 'a' ) ? v ( 'a' ) : 'index';
setg ( 'c', $c );
setg ( 'a', $a );
$c = basename ( strtolower ( strip_tags ( $c ) ) );
$a = basename ( strtolower ( strip_tags ( $a ) ) );
$post_fix = '.class.php';
$class_name = ucfirst($c); //首字母大写
$cont_file = ROOT . 'controller' . DS . $c . $post_fix;
if (! file_exists ( $cont_file ))
	die (); // TODO
require_once ($cont_file);
if (! class_exists ( $class_name ))
	die (); // TODO
$o = new $class_name ();
if (! method_exists ( $o, $a ))
	die (); // TODO
call_user_func ( array (
		$o,
		$a 
) );