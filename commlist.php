<?php 

require('./lib/init.php');


$sql = "select count(*) from comment";
$num = mGetOne($sql);
$curr = isset($_GET['page']) ? $_GET['page'] : 1;
$cnt = 10;
$page = getPage($num,$curr,$cnt);
$sql = "select * from comment".' order by art_id desc limit ' . ($curr-1)*$cnt.','.$cnt;
;
$comms = mGetAll($sql);





require(ROOT.'/view/admin/commlist.html');

?>