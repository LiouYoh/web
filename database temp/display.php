<!DOCTYPE HTML>
<html> 
<head>
<title>ONLINE SPORT SYSTEM</title>
</head>
<body>
<?php
    
    //從資料庫取得圖片
    $conn=mysql_pconnect("127.0.0.1","root","");        
    mysql_select_db("db3");
    mysql_query("SET NAMES'utf8'");
                    
    $sql=sprintf("select * from imageDB where id=1");
            
    $result=mysql_query($sql);        
    
    //顯示圖片
    if($row=mysql_fetch_assoc($result)){    
        header("Content-type: image/jpeg");     
        print $row['image'];
    }
    
    mysql_close($conn);
?>
finish



</body>
</html>