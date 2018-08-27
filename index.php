<?php
require('./lib/init.php');

$sql = "select cat_id,catname from cat";
$cats = mGetAll($sql);


//$cat_id  =  isset($_GET['cat_id'])?$_GET['cat_id']:'';
if(isset($_GET['cat_id'])){
	$where = " and art.cat_id = $_GET[cat_id]";
}else{
	$where = "";
}

//分页代码
$sql = "select count(*) from art where 1". $where;
$num = mGetOne($sql);
$curr = isset($_GET['page']) ? $_GET['page'] : 1;
$cnt = 3;
$page = getPage($num,$curr,$cnt);
//print_r($page);exit();

$sql = "select art_id,title,content,pubtime,comm,catname from art inner join cat on art.cat_id=cat.cat_id where 1".$where . ' order by art_id desc limit ' . ($curr-1)*$cnt.','.$cnt;
//echo $sql; exit();
$arts = mGetAll($sql);


require(ROOT.'/view/front/index.html');