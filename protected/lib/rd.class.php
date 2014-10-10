<?php
if( !defined('IN') ) die('bad request');
include_once( ROOT .  'config' . DS . 'redis.php' );
/**
 Redis Factory class
 */
class rd
{
	public static function factory()
	{
		if (extension_loaded('redis')) {
			$c = c('rd');
			$instance = new Redis();
			$instance->connect($c['host'], $c['port']);
			return $instance;
		} else {
			throw new Exception ('Redis extension not found');
		}
	}
}