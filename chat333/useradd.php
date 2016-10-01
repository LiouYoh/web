<html> 
<head> 
<title>Title here!</title> 
<meta http-equiv="Refresh" content="5;url=useradd.php"> 
</head> 
<body> 
<? 
mysql_pconnect("localhost","root","") or die("無法連結主機"); 
mysql_select_db("chat") or die("無法連接資料庫"); 

$people="select * from user";/*秀出所以的user*/ 
$show=mysql_query($people); 
$chkpeo=mysql_num_rows($show);/*計算有幾筆user*/ 
echo "線上人數：".$chkpeo."人 
"; 

while(list($no,$name,$time)=mysql_fetch_row($show)){ 
echo $name," 
"; 
} 
?> 
</body> 
</html> 