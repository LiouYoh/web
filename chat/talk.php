<?php
session_start();
//有登錄並且有送出訊息才處理
if ($_POST['talk'] && $_SESSION['id'] == session_id() && $_SESSION['user']){
	talk($_POST['talk'], $_POST['color']);
}

function usec()
{
	list($usec) = explode(" ", microtime());
	return (float)$usec;
}

function talk($talk, $color)
{
	clearstatcache();
	$file = "message.php";
	$msg = array();
	
	$msg = unserialize(base64_decode(file_get_contents($file, LOCK_EX)));
	$msg[date("H:i ").usec()] = array("user"=>$_SESSION['user'], "contents"=>htmlspecialchars($talk, ENT_QUOTES), "color"=>$color);

	//只保留10句留言，表示可供10人聊天使用，若20 = 20人，以此類推。
	$max = 10;
	if (count($msg) > $max){
		$msg = array_slice($msg, -$max, $max, true);
	}
	
	file_put_contents($file, base64_encode(serialize($msg)), LOCK_EX);
}
?>