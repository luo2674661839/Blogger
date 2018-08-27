<?php 

$conn=mysql_connect('127.0.0.1','root','123456');
mysql_query('use name',$conn);
mysql_query('set names utf8');

$sql = "select * from cat";
$rs = mysql_query($sql);
$cat =array();
while ($row=mysql_fetch_assoc($rs)){
	$cat[]=$row;
}

require('./view/admin/catlist.html');
?>