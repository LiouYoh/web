<!DOCTYPE html>
<html>

<form>
<td>Show all data:</td><br>
Account: <input type="text" name="fname" /><br />
Password: <input type="text" name="lname" /><br />
<input type="submit" value="sign in" name="click"><br>

<input type="submit" value="sign up" name="up"><br>


<td></td><br>
</form>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
} 


if (isset($_GET["click"]) ) {
	$ac= $_GET['fname'];
	$pa= $_GET['lname'];
    $sql = "SELECT * FROM employee WHERE account = '$ac' AND password = '$pa'" ;
	$result = mysqli_query($conn, $sql);
	if($result!= null && mysqli_num_rows($result) >0){
		$row = mysqli_fetch_assoc($result);
		$na= $row['name'];
		$nu = $row['number'];
		$acc = $row['account'];
		$pass = $row['password'];
		$sex = $row['sex'];
		
		echo" hello," . $na ." ". $nu ;
		?>
        <table>
		
			<tr width="30%">
			<td>Name:</td>
			<?php
			echo "<td><input type='text' name='Fname' value='$na'></td></tr>";
			?>
			</tr>
			
			<tr width="30%">
			<td>Number:</td>
			<?php
			echo "<td><input type='text' name='Fname' value='$nu'></td></tr>";
			?>
			</tr>
			
			<tr width="30%">
			<td>Accound:</td>
			<?php
			echo "<td><input type='text' name='Fname' value='$acc'></td></tr>";
			?>
			</tr>
			
			<tr width="30%">
			<td>Password:</td>
			<?php
			echo "<td><input type='text' name='Fname' value='$pass'></td></tr>";
			?>
			</tr>
			
			
			<tr width="30%">
			<td>Sex:</td>
			<?php
			echo "<td><input type='text' name='Fname' value='$sex'></td></tr>";
			?>
			</tr>
			
		  </table>		

     <?php
	}
	else {
		echo "error";
	}
	

     // output data of each row
     
     
}


if (isset($_GET["up"]) ) {
	echo "--Insert data--";
		?>
		
		<form method="post" ><br>
		<table>
			
			
			<tr width="30%">
			<td>Name:</td>
			<td><input type="text" name='Bdate'</td></tr>
			
			<tr width="30%">
			<td>Number:</td>
			<td><input type="text" name='address'></td></tr>
			
			<tr width="30%">
			<td>Account:</td>
			<td><input type="text" name='Salary'></td></tr>
			
			<tr width="30%">
			<td>Password:</td>
			<td><input type="text" name='Super_ssn'></td></tr>
			
			<tr width="30%">
			<td>Sex:</td>
			<td><input type="radio" value='M' name="gender">Male<input type="radio" value='F' name="gender">Female</td></tr>
			
			
			
			
		  </table>			
			<input type="submit" value="Submit" name="iclick">
		  </form>
		<?php
     
     
}



if(isset($_POST["iclick"])){
	
	$Bdate = $_POST['Bdate'];
	$Address = $_POST['address'];
	$Sex = $_POST['gender'];
	$Salary = $_POST['Salary'];
	$Super = $_POST['Super_ssn'];
	
	$sql = "INSERT INTO employee (name, number, account, password, sex)
	VALUES ('$Bdate ','$Address ','$Salary ','$Super','$Sex ')";
	if (mysqli_query($conn, $sql)) {
		echo "<br> New record created successfully";
	} else {
		echo "<br> Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}



 ?>
</html>