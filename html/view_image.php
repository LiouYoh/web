 <?PHP
//檢視資料庫中的圖檔
include_once("./config.php");
mysql_select_db("db",$link_ID) or die ("開啟資料庫錯誤，請聯絡程式設計人員。");

$result = "SELECT * FROM image";
$sql = mysql_query($result);
$row = mysql_fetch_object($sql);
//var_dump($row);
$itype = $row->itype;

// 根據檔案類型宣告 Header
if ($itype == 'jpg' or $itype == 'jpeg' ) header("Content-type: image/jpeg"); 
if ($itype == 'gif') header("Content-type: image/gif"); 
if ($itype == 'png') header("Content-type: image/png");

$show_photo = $row->matter;

// 輸出圖檔
echo $show_photo;
?>