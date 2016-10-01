<? 
if ($name==''){ 
header("location:chat.html"); 
}else{ 
include("useradd2.php"); 
} 
?> 
<html> 
<head> 
<title>Title here!</title> 
</head> 
<body> 
<form name="chat" action="chatins.php" method="post" onsubmit="return check();"> 
匿稱：<?echo $name?> 
<input type="hidden" name="name" value="<?echo $name?>"> 


我要說：<input type="text" name="meg" maxlength="20"> 


顏色<select name="color" size="1"> 
<option value="black">黑</option> 
<option value="red">紅</option> 
<option value="orange">橘</option> 
<option value="yellow">黃</option> 
<option value="green">綠</option> 
<option value="blue">藍</option> 
<option value="purple">紫</option> 
</select> 


<input type="submit" value="確定送出"> 
</form> 
<form name="logout" action="logout.php" method="post"> 
<input type="hidden" name="name" value="<?echo $name?>"> 
<input type="submit" value="登出"> 
</form> 
<script language="javascript"> 
function check(){ 
if (document.chat.meg.value==''){ 
alert('您未輸入對話內容！'); 
document.chat.meg.focus(); 
return false; 
} 
return true 
} 
</script> 
</body> 
</html> 