<?php 

$cat_id=$_GET['cat_id'];

$conn=mysql_connect('127.0.0.1','root','123456');
mysql_query('use name',$conn);
mysql_query('set names utf8');

if(empty($_POST)){

if(!is_numeric($cat_id)){
	echo "栏目不合法";
	exit();
}
$sql="select count(*) from cat where cat_id=$cat_id";
$rs=mysql_query($sql);
if(mysql_fetch_row($rs)[0]==0){
 echo "栏目不存在";
 exit();
}

$sql="select catname from cat where cat_id=$cat_id";
$rs = mysql_query($sql);
$cat=mysql_fetch_assoc($rs);
	require('./view/admin/catedit.html');
}
else{
	$sql="update cat set catname='$_POST[catname]' where cat_id=$cat_id";
	if(!mysql_query($sql)){
		echo '栏目修改失败!';
		exit();
	}
	else
	{
		echo "栏目修改成功";
	}
}

 ?>