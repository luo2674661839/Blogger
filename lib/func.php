<?php 

function succ($res){
	$result='succ';
	require(ROOT.'/view/admin/info.html');
	exit();
}
function error($res){
	$result='fail'; 
	require(ROOT.'/view/admin/info.html');
	exit();
}
/**
 * 获取来访者的真实IP
 * 
 */
function getRealIp(){
	static $realip = null;
	if($realip!==null){
		return $realip;
	}
	if(getenv('REMOTE_ADDR')){
		$realip = getenv('REMOTE_ADDR');
	}elseif (getenv('HTTP_CLIENT_IP')) {
		$realip = getenv('HTTP_CLIENT_IP');
	}elseif (getenv('HTTP_X_FROWARD_FOR')) {
		$realip = getenv('HTTP_X_FROWARD_FOR');
	}
	//echo $realip;exit();
	return $realip;
}

/**
 * 生产分页代码 12345  23456 
 * @param int $num 文章总数
 * @param int $curr 当前显示的页码数	$cuur-1 $curr $curr+1 $curr+2
 * @param int $cnt 每页显示的条数
 */

function getPage($num,$curr,$cnt){
	//最大的页码数
	$max = ceil($num/$cnt);
	//最左页码
	$left = max(1,$curr-2);
	//最右侧页码
	$right = min($left+4,$max);

	$left = max(1,$right-4);
	$page = array();
	for($i =$left;$i<=$right;$i++){
		$_GET['page'] = $i;

		$page[$i] = http_build_query($_GET);
	}
	return $page;
}
//print_r(getPage(100,5,10));
?>
