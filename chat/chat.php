<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-TW" lang="zh-TW" dir="ltr">
<head><title></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="zh-TW" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="Pragma" content="no-cache" /> 
<link rel=stylesheet type="text/css" href="chat.css" /> 
<script language="javascript" type="text/javascript" src="chat.js"></script>
</head>
<body onload="focus('talk'); msg(); online();">
<center><div class="chatui">
<table class="titlebox"><tr><td><label>Hello,</label> <span class="username"><label>
<?php session_start();if ($_SESSION['user']){ echo $_SESSION['user']; }else{ header("Location: .");}?></label></span></td><td class="logout"><label>【<a href='#' onclick="logout(); return false;">離開</a>】</label></td>
<td class="colorbar">
<select name="color", id="color" onchange="ifocus('talk');">
  <option value ="#0a0a0a" style='color:#0a0a0a;'>黑色</option>
  <option value="#8b8b83" style='color:#8b8b83;'>灰色</option>
  <option value ="#228b22" style='color:#228b22;'>綠色</option>
  <option value ="#2e8b57" style='color:#2e8b57;'>深綠</option>
  <option value="#1874cd" style='color:#1874cd;'>藍色</option>
  <option value="#000080" style='color:#000080;'>深藍</option>
  <option value="#ff3030" style='color:#ff3030;'>紅色</option>
  <option value="#8b2500" style='color:#8b2500;'>深紅</option>
  <option value="#eea9b8" style='color:#eea9b8;'>粉紅</option>
</select>
</td></tr></table>
<div class="msgbox" id="msgbox"></div>
<div class="talkbar">
<input type="text" name="talk" id="talk" onkeydown="enterkeydown(event, 'send');" />
<input type="button" name="send" id="send" value="send" class="button" onclick="talk();" />
</div>
<textarea class="online" id="online" readonly="readonly"></textarea>
</div></center>
</body>
</html>