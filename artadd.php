<?php 

require('./lib/init.php');

$sql='select * from cat';
$cats=mGetAll($sql);
//print_r($cats);exit();
if(empty($_POST)){
	include(ROOT.'/view/admin/artadd.html');
 }else{
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

 	$art['pubtime'] = time();  
 	$art['arttag'] = trim($_POST['tag']);
 	//插入内容到art表
 	if(!mExec('art',$art)){
 		error('文章添加失败');
 	}
 	else{

 		//判断是否有tag
 		$art['tag'] = trim($_POST['tag']);

 		if($art['tag'] == ''){
 			//将cat的num字段当前栏目下的文章数+1
 			$sql = "update cat set num=num+1 where cat_id= $art[cat_id]";
 			mQuery($sql);
 			
 			succ('文章添加成功 ');
 		}
 		else{
 			$art_id = getLastId();
 			//插入tag 到tag表
 			$sql = "insert into tag (art_id,tag) values (";
 			$tag = explode(',',$art['tag']);//索引数组 
 			//print_r($tag);
 		foreach ($tag as $v) {
 			$sql.=$art_id.",'".$v."'),(";
 		}
 		$sql = rtrim($sql,",(");
 		if(mQuery($sql)){
 			$sql = "update cat set num=num+1 where cat_id= $art[cat_id]";
 			mQuery($sql);
 			succ('文章添加成功');
 		}
 		else{
 			$sql = "delete from art where art_id=$art_id";
 			if(mQuery($sql)){
 				$sql = "update cat set num=num-1 where cat_id= $art[cat_id]";
 			mQuery($sql);
 				error('文章添加失败');
 			}
 		}
 		}
 	}
 }

 ?>
