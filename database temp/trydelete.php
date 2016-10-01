<!DOCTYPE html>
<html>



<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db3";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
} 








	$de = 2;
	$sql = "DELETE FROM item WHERE id= '$de'";
	
	if (mysqli_query($conn, $sql)) {
		echo "<br> delete successfully";
	} else {
		echo "<br> Error: " . $sql . "<br>" . mysqli_error($conn);
	}





	$conn->close();



 ?>
</html>