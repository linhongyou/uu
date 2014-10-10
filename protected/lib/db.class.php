<?php
if( !defined('IN') ) die('bad request');
include_once( ROOT .  'config' . DS . 'database.php' );
class db
{
	// 保存类实例在此属性中
	private static $instance;

	// 构造方法声明为private，防止直接创建对象
	private function __construct()
	{
		echo 'I am constructed';
	}

	// getInstance 方法
	public static function pdo()
	{
		if (!isset(self::$instance)) {
			$c = c('db');
			 $dsn = "mysql:host={$c['db_host']};port={$c['db_port']};dbname={$c['db_name']};charset=utf8";
			 $username = $c['db_user'];
			 $password = $c['db_password'];
			 $pdo = new PDO($dsn,$username,$password);
			 self::$instance = $pdo;
		}

		return self::$instance;
	}

	// 阻止用户复制对象实例
	public function __clone()
	{
		trigger_error('Clone is not allowed.', E_USER_ERROR);
	}

}
