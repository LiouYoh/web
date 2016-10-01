<? 
mysql_pconnect("localhost","root","") or die("無法連結主機"); 
mysql_select_db("chat") or die("無法連接資料庫"); 
if ($name==''){ 
header("location:chat.html"); 
}else{ 
include("chatform.php"); 
if ($name!=NULL && $meg!=NULL){ 
$sql="insert into meg (name,color,meg) values('".$name."','".$color."','".$meg."')"; 
$chk=mysql_query($sql); 
} 
} 
?> 
select.php程式碼如下： 
<head> 
<title>Title here!</title> 
<meta http-equiv="Refresh" content="5;url=select.php"> 
</head> 
<body> 
<? 
mysql_pconnect("localhost","root","") or die("無法連結主機");/*連接資料庫主機*/ 
mysql_select_db("chat") or die("無法連接資料庫");/*連資資料庫*/ 

$sql2="select * from meg where name!='' and meg!='' order by no desc";/*秀出姓名與留言皆是不空白的且以no作降冪排列*/ 
$chk2=mysql_query($sql2); 

while(list($no,$name,$color,$meg,$time)=mysql_fetch_row($chk2)){ 
echo "<span style=\"color:".$color."\">".$name."說：".$meg."(".$time.")</span> 
"; 
} 
?> 
</body> 
</html> 