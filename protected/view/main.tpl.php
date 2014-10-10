<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html >
	<head>
		<meta content="text/html;charset=utf-8" http-equiv="content-type" />
		<title><?=$title?></title>
		<meta name="description" content="<?=$description?>" />
		<meta name="keywords" content="<?=$keywords?>" />
		<?php @include_once( dirname(__FILE__)) . DS . 'css.tpl.php'; ?>
	</head>
	<body>
		<?php @include_once( dirname(__FILE__)) . DS . 'header.tpl.php'; ?>
		<?php @include_once( dirname(__FILE__)) . DS . $sharp.'.tpl.php'; ?>
		<?php @include_once( dirname(__FILE__)) . DS . 'footer.tpl.php'; ?>
	</body>
</html>