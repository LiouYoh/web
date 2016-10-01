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
<body onload="ifocus('guest');">
<center><div class="chatui">
<label>匿稱：</label><input type="text" name="guest" id="guest" maxlength="15" onkeydown="enterkeydown(event, 'login');" />
<input type="button" name="login" id="login" value="進入" class="button" onclick="login();" />
</div></center>
</body>
</html>