<?php
if( !defined('IN') ) die('bad request');
include_once( ROOT .  'config' . DS . 'memcache.php' );
class mc
{
	// 保存类实例在此属性中
	private static $instance;

	// 构造方法声明为private，防止直接创建对象
	private function __construct()
	{
		echo 'I am constructed';
	}

	// getInstance 方法
	public static function getInstance()
	{
		if (!isset(self::$instance)) {
			$c = c('mc');
			self::$instance = new Memcache();
			foreach ($c as $item)
			{
				self::$instance->addServer($item['host'],$item['port']);
			}
		}

		return self::$instance;
	}

	// 阻止用户复制对象实例
	public function __clone()
	{
		trigger_error('Clone is not allowed.', E_USER_ERROR);
	}

}