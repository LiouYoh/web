<!DOCTYPE html>
<html>
<head>

</head>
<body>


<table border="1">


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";
$input=$_GET["lastname"];
//echo $input;
//echo '<br>';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM employee WHERE name= '$input'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo "<tr>";
	echo "<td>name</td>";
	echo "<td>number</td>";
	echo "</tr>";

    while($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td>" . $row["name"]. "</td>";
		echo "<td>" . $row["number"]. "</td>";
		echo "</tr>";
//        echo "name: " . $row["name"]. " - number: " . $row["number"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
</table>
</body>
</html>