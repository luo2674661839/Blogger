<?php

require('./lib/init.php');

$comment_id=$_GET['comment_id'];

//判断地址栏传来的art_id是否合法

if(!is_numeric($comment_id)){
	error('文章id不合法');
}

//是否有这篇文章

$sql="select art_id from comment where comment_id = $comment_id";
$art_id =mGetOne($sql);
if(!mGetRow($sql)){
	error('评论不存在');
}
$sql = "delete from comment where comment_id=$comment_id";
if(!mQuery($sql)){error('评论删除失败');}
else{
	$sql = "update art set comm=comm-1 where art_id=".$art_id;
	header('location: commlist.php');
}