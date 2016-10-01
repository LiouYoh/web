<?php
session_start();

//送出已經離開的訊息
include_once 'talk.php';
talk('我已經離開聊天室！', '#ff3030');
include_once 'online.php';
online(false);

//刪除session
session_destroy();
?>