<?PHP
//phpinfo();
//將檔案匯入到 mysql 資料庫中
include_once("./config.php");
mysql_select_db("db",$link_ID) or die ("mysql_select_db() failed.");// 將圖檔匯入資料庫內  $fd = fopen($_FILES['file']['tmp_name'], "rb");
$fd = fopen($_FILES['file']['tmp_name'], "r");
$size = $_FILES['file']['size'];
$block = fread($fd, $size);
fclose($fd);
$block = addslashes($block);
// 取得檔案類型
$itype = explode("/", $_FILES['file']['type']);
$itype = $itype[1];

$str="INSERT INTO image (matter , itype , alt) VALUES('" . $block . "' , '" . $itype . "' , '" . $alt . "')";
echo $str;
mysql_query($str,$link_ID);
$result = mysql_query($str, $link_ID);
if (!$result) die("執行 SQL 命令失敗");
?>