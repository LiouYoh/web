<?php
session_start();
//檢查是否有登錄
if ($_SESSION['id'] == session_id() && $_SESSION['user']){
	clearstatcache();
	$msg = unserialize(base64_decode(file_get_contents("message.php", LOCK_EX)));
	
	//只顯示Client沒有顯示的留言
	if ($_SESSION['msg']){
		$show_msg = array_diff_assoc($msg, $_SESSION['msg']);
	}
	
	$_SESSION['msg'] = $msg;
	
	echo json_encode($show_msg);
}
?>