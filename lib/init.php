<?php 
	define('ROOT',dirname(__DIR__));
	//echo __FILE__ ,'<br/>';
	//echo __LINE__;
	date_default_timezone_set('PRC'); 
	ini_set('date.timezone','Asia/Shanghai'); 
	require(ROOT.'/lib/mysql.php');
	require(ROOT.'/lib/func.php');
?>