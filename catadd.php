<?php 
require('./lib/init.php');
if(empty($_POST)){
include(ROOT.'/view/admin/catadd.html');
}
else {
  //print_r($_POST);
  //检测栏目是否为空
  $cat['catname']=trim($_POST['catname']);
  if(empty($cat['catname'])){
  	echo "栏目不能为空";exit();
  }
  //检测栏目名是否已存在
  $sql ="select count(*) from cat where catname= '$cat[catname]'";
  $rs = mGetOne($sql);
  if($rs!=0)
    {
      echo "栏目已存在";
      exit();
    }
   // $sql="insert into cat (catname) value ('$cat[catname]')";
    if(!mExec('cat',$cat)){
      echo "栏目插入失败";
    }else
    {
      succ('插入成功');
    }
}
 