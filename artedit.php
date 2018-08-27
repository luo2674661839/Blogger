<?php 

require('./lib/init.php');

$art_id = $_GET['art_id'];


if(!is_numeric($art_id)){
	error('文章id不合法');
}

//是否有这篇文章

$sql="select title,content,cat_id,arttag from art where art_id = $art_id";

if(!mGetRow($sql)){
	error('文章不存在');
}
$sql = "select * from cat";
$cats = mGetAll($sql);

if(empty($_POST)){
	$sql="select * from art where art_id = $art_id";
	$art = mGetRow($sql);
	include(ROOT.'/view/admin/artedit.html');
}
else{
	//检测标题是否为空
 	$art['title'] = trim($_POST['title']);
 	if($art['title'] == ''){
 		error('标题不能为空');
 	}

 	$art['cat_id']  =  $_POST['cat_id'];
 	if(!is_numeric($art['cat_id'])){
 		error('栏目不合法');
 	}

 	$art['content']=trim($_POST['content']);
 	if($art['content']== ''){
 		error('内容不能为空');
 	}

 	$art['lastup'] = time();
 	if(!mExec('art',$art,'update',"art_id=$art_id")){
 		error('文章修改失败');
 	}else
 	{
 		//header('locahost: artlist.php');
 		//删除tag表所有tag 再insert 插入新的tag
 	
 		$art['tag'] = trim($_POST['tag']);
 		if($art['tag'] == ''){$sql = "delete from tag where art_id=$art_id";
 		mQuery($sql);succ('文章修改成功 ');}
 		else{
 		$sql = "delete from tag where art_id=$art_id";
 		mQuery($sql);
 			$art_id = $_GET['art_id'];
 			//插入tag 到tag表
 			$sql = "insert into tag (art_id,tag) values (";
 			$tag = explode(',',$art['tag']);//索引数组 
 			//print_r($tag);
 		foreach ($tag as $v) {
 			$sql.=$art_id.",'".$v."'),(";
 		}
 		$sql = rtrim($sql,",(");
 		if(mQuery($sql)){
 			succ('文章修改成功');
 		}
 		else{
 			$sql = "delete from tag where art_id=$art_id";
 			if(mQuery($sql)){
 				error('文章修改失败');
 			}
 		}
 		}
 		//header('location: artlist.php');
 	}
}


?>