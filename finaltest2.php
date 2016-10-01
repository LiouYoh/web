<!DOCTYPE html>
<html>
<head>

</head>
<body background=background2.png>





<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db3";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

			?>	
			<form action="" method="POST"><br>
			<table >
				<tr width="30%">
				<td>Account:</td>
				<td><input type="text" name='account'></td>
				</tr>
				
				<tr width="30%">
				<td>Password:</td>
				<td><input type="text" name='password'></td></tr>
				
				<tr width="30%">
				<td>Name:</td>
				<td><input type="text" name='name'></td></tr>
				
				<tr width="30%">
				<td>Address:</td>
				<td><input type="text" name='address'></td></tr>
							
			  </table>			
				<input type="submit" value="Confirm!" name="iclick2">
			  </form>
			
			<?php
if(isset($_POST["iclick2"])){
			
			$account = $_POST['account'];
			$password = $_POST['password'];
			$name = $_POST['name'];
			$address = $_POST['address'];
			
			$sql = "INSERT INTO user (account, password, name, address)
			VALUES ('$account', '$password', '$name', '$address')";
			if (mysqli_query($conn, $sql)) {
				echo "New record created successfully";
				?>
	
	
				<form action="final.html" method="get">
				
				<br>
				<br>
				<br>
				<br>
				<br>
				SUCCESS!
				<br>
				<input type="submit" value="Back to main!">
				
				</form>
				<?php
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
}	




$conn->close();
?>

	


</body>


</html>