<?php 
/**
 * mysql.php mysql 系列操作函数
 * @author nianbaibai
 */
/**
 * 连接数据库
 *
 * @return resource 连接成功，返回连接数据库的资源
 */

function mConn(){
	static $conn=null;
	if($conn===null){
		$cfg=require(ROOT.'/lib/config.php');
		$conn=mysql_connect($cfg['host'],$cfg['user'],$cfg['pwd']);
		mysql_query('use '.$cfg['db'],$conn);
		mysql_query('set names '.$cfg['charset'],$conn);
	}
	return $conn;
}

/**
 * 查询的函数
 * @param str $sql select 待查询的sql语句
 * @return mixed resoure/bool
 */
function mQuery($sql){
	return mysql_query($sql,mConn());
}


/**
 *
 * select 查询多行数据
 *
 * @param str $sql select 待查询的sql语句
 * @return mixed select 查询成功，返回二维数组，失败返回false
 */
function mGetAll($sql){
	$rs=mQuery($sql);
	if(!rs){
		return false;
	}
	$data =array();
	while ( $row=mysql_fetch_assoc($rs)) {
		$data[]=$row;
	}
	return $data;
}

/**
 * select 取出一行数据
 *
 * @param str $sql 待查询的sql语句
 * @return arr/false 查询成功 返回一个一维数组
 */

function mGetRow($sql){

	$rs=mQuery($sql);
	if(!$rs){
		return false;
	}
	return mysql_fetch_assoc($rs);
}

/**
 * select 查询返回一个结果
 *
 * @param str $sql 待查询的select 语句
 * @return mixed 成功，返回结果，失败返回false
 */

function mGetOne($sql){
	$rs=mQuery($sql);
	if(!$rs){
		return false;
	}
	return mysql_fetch_row($rs)[0];
}

/**
 * 自动拼接insert和update sql，并且调用mQuery()去执行sql
 *
 * @param str $table 表名
 * @param arr $data 接收到的数据，一维数组
 * @param str $act 动作，默认为'insert'
 * @param str $where 防止update更改时少加where条件
 * @return bool insert 或者update 插入成功或失败
 */


function mExec($table,$data,$act='insert',$where=0){
	if($act=='insert'){
		$sql="insert into $table (";
		$sql .=implode(',',array_keys($data)).") values ('";
		$sql.=implode("','",array_values($data))."')";
		return mQuery($sql);	
	}else if($act == 'update'){
		$sql="update $table set ";
		foreach($data as $k=>$v){
			$sql.=$k."='".$v."',";
		}
		$sql=rtrim($sql,',')."  where ".$where;
		return mQuery($sql);
	}
}
/**
 * 取得上一步insert 操作产生的ID
 * @return 返回id
 */
function getLastId(){
	return mysql_insert_id(mConn());
}
?>