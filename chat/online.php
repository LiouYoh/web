<?php
session_start();
if ($_SESSION['id'] == session_id() && $_SESSION['user']){
	online(true);
}

function online($hold)
{
	clearstatcache();
	$file = "holdlist.php";
	$online = unserialize(file_get_contents($file, LOCK_EX));

	if ($online){
		$last_time = time() - 60;
		foreach ($online as $user=>$time){
			if ($last_time > $time){
				unset($online[$user]);
			}
		}
	}

	if ($hold){
		//加入在線名單
		$online[$_SESSION['user']] = time();
		echo json_encode(array_keys($online));
	}else{
		//去除在線名單
		unset($online[$_SESSION['user']]);
	}
	
	file_put_contents($file, serialize($online), LOCK_EX);
}
?>