<? 
mysql_pconnect("localhost","root","") or die("無法連結主機"); 
mysql_select_db("chat") or die("無法連接資料庫"); 
echo $name; 
$sql="delete from user where name='".$name."'";/*刪除user*/ 
$chk=mysql_query($sql); 

$logout="insert into meg (name,meg) values ('系統管理員','".$name."離開聊天室了！')"; 
$chklogout=mysql_query($logout); 

if($sql){ 
echo "，您已經登出了！謝謝您的參與！"; 
} 
?>