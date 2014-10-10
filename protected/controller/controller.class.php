<?php
class Controller{
	function __construct() {
		$this->data["title"] = "";
		$this->data["keywords"]="";
		$this->data["description"]="";
	}
	/**
	 * 解析view层模板文件
	 *
	 * @param $data array
	 *            解析到模板中的变量
	 * @param $sharp string
	 *            模板名称
	 * @param $main_sharp string
	 *            主模板名称
	 * @author linhy
	 */
	function show($data = NULL, $sharp = NULL, $layout = "main") {
		if (empty ( $data )) {
			$data = $this->data;
		}
		if (empty ( $sharp )) {
			$sharp = g ( 'c' ) . DS . g ( 'a' );
		}
		setg ( 'sharp', $sharp );
		$data["sharp"] = $sharp;
		$the_sharp = $layout;
		$layout_file = ROOT . 'view'.DS . $the_sharp . '.tpl.php';
		@extract( $data );
		require( $layout_file );
	}
}