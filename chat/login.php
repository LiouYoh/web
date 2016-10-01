<?php
session_start();
if ($_POST['guest']){
	$_SESSION['user'] = $_POST['guest'];
	$_SESSION['id'] = session_id();

	echo $_POST['guest'];

	//送出已經進入聊天室訊息
	include_once 'talk.php';
	talk('我已經進入聊天室！', '#ff3030');
}
?>