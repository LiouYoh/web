<!DOCTYPE html>
<html>
<head>

</head>






<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db3";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT Fname ,Minit,Lname,Ssn,Bdate,Address,Sex,Salary,Super_ssn,Dno,Account,Password
FROM employee
;";
$result = mysqli_query($conn, $sql);

if (isset($_GET['click']) && $result!= null && mysqli_num_rows($result) >0) {
     echo "<table><tr><th>Fname</th><th>Minit</th><th>Lname</th><th>Ssn</th><th>Bdate</th><th>Address</th><th>Sex</th><th>Salary</th><th>Super_ssn</th><th>Dno</th><th>Account</th><th>Password</th></tr>";
     // output data of each row
     while($row = mysqli_fetch_assoc($result)) {
         echo 
		 "
		 <tr>
		 <td>". $row["Fname"]."</td>
		 <td>". $row["Minit"]."</td>
		 <td>". $row["Lname"]."</td>
		 <td>". $row["Ssn"]."</td>
		 <td>". $row["Bdate"]."</td>
		 <td>". $row["Address"]."</td>
		 <td>". $row["Sex"]."</td>
		 <td>". $row["Salary"]."</td>
		 <td>". $row["Super_ssn"]."</td>
		 <td>". $row["Dno"]."</td>
		 <td>". $row["Account"]."</td>
		 <td>". $row["Password"]."</td>
		 </tr>" ;

     }
     echo "</table>";
}
if(isset($_POST["sclick"])){
	$Account = $_POST['Account'];
	$Password = $_POST['Password'];
	$sql = "SELECT Fname ,Minit,Lname,Ssn,Bdate,Address,Sex,Salary,Super_ssn,Dno,Account,Password
			FROM employee WHERE Account='$Account' AND Password = $Password";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	
	if($result!= null && mysqli_num_rows($result) >0){
		$Fname= $row["Fname"];
		$Minit= $row["Minit"];
		$Lname= $row["Lname"];
		$Ssn= $row["Ssn"];
		$Bdate= $row["Bdate"];
		$Address= $row["Address"];
		$Sex= $row["Sex"];
		$Salary= $row["Salary"];
		$Super= $row["Super_ssn"];
		$Dno= $row["Dno"];
		$Account= $row["Account"];
		$Password= $row["Password"];
		echo "<form method='POST'>";
		echo "<table>";
		echo "<tr width='30%'>";
		echo "<td>First name:</td>";
		echo "<td><input type='text' name='Fname'  value='$Fname'></td>";
		
		echo "<tr width='30%'>";
		echo "<td>Minit</td>";
		echo "<td><input type='text' name='Minit' value='$Minit'></td>";
		
		echo "<tr width='30%'>";
		echo "<td>Last name:</td>";
		echo "<td><input type='text' name='Lname' value='$Lname'></td>";
		
		echo "<tr width='30%'>";
		echo "<td>Ssn:(不能改)</td>";
		echo "<td><input type='text' name='Ssn' value='$Ssn'></td>";
		
		echo "<tr width='30%'>";
		echo "<td>Birthday:</td>";
		echo "<td><input type='text' name='Bdate' value='$Bdate'></td>";
		
		echo "<tr width='30%'>";
		echo "<td>Address:</td>";
		echo "<td><input type='text' name='address' value='$Address'></td>";
		
		echo "<tr width='30%'>";
		echo "<td>Sex:</td>";
		echo "<td><input type='text' name='Sex' value='$Sex'></td>";
		
		echo "<tr width='30%'>";
		echo "<td>Salary:</td>";
		echo "<td><input type='text' name='Salary'value='$Salary'></td>";
		
		echo "<tr width='30%'>";
		echo "<td>Superior ssn:</td>";
		echo "<td><input type='text' name='Super_ssn' value='$Super'></td>";
		
		echo "<tr width='30%'>";
		echo "<td>Dno:</td>";
		echo "<td><input type='text' name='Dno' value='$Dno'></td>";
		
		echo "<tr width='30%'>";
		echo "<td>Account:(不能改)</td>";
		echo "<td><input type='text' name='Account' value='$Account'></td>";
		
		echo "<tr width='30%'>";
		echo "<td>Password:</td>";
		echo "<td><input type='text' name='Password' value='$Password'></td>";
		
		echo "</table>";  
		echo "<input type='submit' value='提交' name='mclick3'>";
		echo "</form>";	
	}	
	else echo "無此帳密";
}
if(isset($_GET["insert"])){
	$cho=$_GET["insert"];
	switch($cho){
	
		case 1:
		echo "--Insert data--";
		?>	
			<form action="" method="POST"><br>
			<table >
				<tr width="30%">
				<td>First name:</td>
				<td><input type="text" name='Fname'></td>
				</tr>
				
				<tr width="30%">
				<td>Minit:</td>
				<td><input type="text" name='Minit'></td></tr>
				
				<tr width="30%">
				<td>Last name:</td>
				<td><input type="text" name='Lname'></td></tr>
				
				<tr width="30%">
				<td>Ssn:</td>
				<td><input type="text" name='Ssn'></td></tr>
				
				<tr width="30%">
				<td>Birthday:</td>
				<td><input type="text" name='Bdate'></td></tr>
				
				<tr width="30%">
				<td>Address:</td>
				<td><input type="text" name='address'></td></tr>
				
				<tr width="30%">
				<td>Sex:</td>
				<td><input type="radio" value='M' name="Sex">Male<input type="radio" value='F' name="Sex">Female</td></tr>
				
				<tr width="30%">
				<td>Salary:</td>
				<td><input type="text" name='Salary'></td></tr>
				
				<tr width="30%">
				<td>Superior ssn:</td>
				<td><input type="text" name='Super_ssn'></td></tr>
				
				<tr width="30%">
				<td>Dno:</td>
				<td><input type="text" name='Dno'></td></tr>
			  </table>			
				<input type="submit" value="提交" name="iclick">
			  </form>
			
			<?php
			 break;
		case 2:
			echo "--Modify data--";
			?>
			<form action="" method="POST">
			Please key in ssn to modify:<input type="text" name='modify'>
			<input type="submit" value="提交" name="mclick">
			</form>
			<?php
			break;
		case 3:
			echo "--Delete data--";
			?>
			<form action="" method="POST">
			Please key in ssn to delete:<input type="text" name='delete'>;
			<input type="submit" value="提交" name="dclick">;
			</form>
			<?php
		break;
	}
}
//=========================================================================================================================================================
if(isset($_POST["click1"])){
			echo "--Insert data--";
			?>	
			<form action="" method="POST"><br>
			<table >
				<tr width="30%">
				<td>First name:</td>
				<td><input type="text" name='Fname'></td>
				</tr>
				
				<tr width="30%">
				<td>Minit:</td>
				<td><input type="text" name='Minit'></td></tr>
				
				<tr width="30%">
				<td>Last name:</td>
				<td><input type="text" name='Lname'></td></tr>
				
				<tr width="30%">
				<td>Ssn:</td>
				<td><input type="text" name='Ssn'></td></tr>
				
				<tr width="30%">
				<td>Birthday:</td>
				<td><input type="text" name='Bdate'></td></tr>
				
				<tr width="30%">
				<td>Address:</td>
				<td><input type="text" name='address'></td></tr>
				
				<tr width="30%">
				<td>Sex:</td>
				<td><input type="radio" value='M' name="Sex">Male<input type="radio" value='F' name="Sex">Female</td></tr>
				
				<tr width="30%">
				<td>Salary:</td>
				<td><input type="text" name='Salary'></td></tr>
				
				<tr width="30%">
				<td>Superior ssn:</td>
				<td><input type="text" name='Super_ssn'></td></tr>
				
				<tr width="30%">
				<td>Dno:</td>
				<td><input type="text" name='Dno'></td></tr>
				
				<tr width="30%">
				<td>Account:</td>
				<td><input type="text" name='Account'></td></tr>
				
				<tr width="30%">
				<td>Password:</td>
				<td><input type="text" name='Password'></td></tr>
			  </table>			
				<input type="submit" value="提交" name="iclick2">
			  </form>
			
			<?php
}	
if(isset($_POST["mclick"])){
	$m = $_POST['modify'];
	$sql = "SELECT Fname ,Minit,Lname,Ssn,Bdate,Address,Sex,Salary,Super_ssn,Dno
			FROM employee WHERE Ssn='$m'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	
	if($result!= null && mysqli_num_rows($result) >0){
		$Fname= $row["Fname"];
		$Minit= $row["Minit"];
		$Lname= $row["Lname"];
		$Ssn= $row["Ssn"];
		$Bdate= $row["Bdate"];
		$Address= $row["Address"];
		$Sex= $row["Sex"];
		$Salary= $row["Salary"];
		$Super= $row["Super_ssn"];
		$Dno= $row["Dno"];
		 echo "<form method='POST'>";
		 echo "<table>";
		 echo "<tr width='30%'>";
		echo "<td>First name:</td>";
		echo "<td><input type='text' name='Fname'  value='$Fname'></td>";
		
		echo "<tr width='30%'>";
		echo "<td>Minit</td>";
		echo "<td><input type='text' name='Minit' value='$Minit'></td>";
		
		echo "<tr width='30%'>";
		echo "<td>Last name:</td>";
		echo "<td><input type='text' name='Lname' value='$Lname'></td>";
		
		echo "<tr width='30%'>";
		echo "<td>Ssn:(不能改)</td>";
		echo "<td><input type='text' name='Ssn' value='$Ssn'></td>";
		
		echo "<tr width='30%'>";
		echo "<td>Birthday:</td>";
		echo "<td><input type='text' name='Bdate' value='$Bdate'></td>";
		
		echo "<tr width='30%'>";
		echo "<td>Address:</td>";
		echo "<td><input type='text' name='address' value='$Address'></td>";
		
		echo "<tr width='30%'>";
		echo "<td>Sex:</td>";
		echo "<td><input type='text' name='Sex' value='$Sex'></td>";
		
		echo "<tr width='30%'>";
		echo "<td>Salary:</td>";
		echo "<td><input type='text' name='Salary'value='$Salary'></td>";
		
		echo "<tr width='30%'>";
		echo "<td>Superior ssn:</td>";
		echo "<td><input type='text' name='Super_ssn' value='$Super'></td>";
		
		echo "<tr width='30%'>";
		echo "<td>Dno:</td>";
		echo "<td><input type='text' name='Dno' value='$Dno'></td>";
		echo "</table>";  
		echo "<input type='submit' value='提交' name='mclick2'>";
		echo "</form>";
		?>  
	
		 <?php
	}
	else echo "Ssn not found";
}

if(isset($_POST["iclick"])){
			
			$Fname = $_POST['Fname'];
			$Minit = $_POST['Minit'];
			$Lname = $_POST['Lname'];
			$ssn = $_POST['Ssn'];
			$Bdate = $_POST['Bdate'];
			$Address = $_POST['address'];
			$Sex = $_POST['Sex'];
			$Salary = $_POST['Salary'];
			$Super = $_POST['Super_ssn'];
			$Dno = $_POST['Dno'];
			$sql = "INSERT INTO employee (Fname ,Minit,Lname,Ssn,Bdate,Address,Sex,Salary,Super_ssn,Dno)
			VALUES ('$Fname ','$Minit ','$Lname ','$ssn ','$Bdate ','$Address ','$Sex ','$Salary ','$Super ','$Dno')";
			if (mysqli_query($conn, $sql)) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
}	
if(isset($_POST["iclick2"])){
			
			$Fname = $_POST['Fname'];
			$Minit = $_POST['Minit'];
			$Lname = $_POST['Lname'];
			$ssn = $_POST['Ssn'];
			$Bdate = $_POST['Bdate'];
			$Address = $_POST['address'];
			$Sex = $_POST['Sex'];
			$Salary = $_POST['Salary'];
			$Super = $_POST['Super_ssn'];
			$Dno = $_POST['Dno'];
			$Account = $_POST['Account'];
			$Password = $_POST['Password'];
			$sql = "INSERT INTO employee (Fname ,Minit,Lname,Ssn,Bdate,Address,Sex,Salary,Super_ssn,Dno,Account,Password)
			VALUES ('$Fname ','$Minit ','$Lname ','$ssn ','$Bdate ','$Address ','$Sex ','$Salary ','$Super ','$Dno','$Account','$Password')";
			if (mysqli_query($conn, $sql)) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
}	
if(isset($_POST['mclick2'])){
			$uFname = $_POST['Fname'];
			$uMinit = $_POST['Minit'];
			$uLname = $_POST['Lname'];
			$ussn = $_POST['Ssn'];
			$uBdate = $_POST['Bdate'];
			$uAddress = $_POST['address'];
			$uSex = $_POST['Sex'];
			$uSalary = $_POST['Salary'];
			$uSuper = $_POST['Super_ssn'];
			$uDno = $_POST['Dno'];

			
			$sql = "UPDATE employee SET Fname='$uFname',Minit='$uMinit' ,Lname='$uLname' ,Bdate='$uBdate'
				,Address='$uAddress' ,Sex='$uSex', Salary='$uSalary', Super_ssn='$uSuper' ,Dno='$uDno'
				WHERE Ssn='$ussn'";
			
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}
}		
if(isset($_POST['mclick3'])){
			$uFname = $_POST['Fname'];
			$uMinit = $_POST['Minit'];
			$uLname = $_POST['Lname'];
			$ussn = $_POST['Ssn'];
			$uBdate = $_POST['Bdate'];
			$uAddress = $_POST['address'];
			$uSex = $_POST['Sex'];
			$uSalary = $_POST['Salary'];
			$uSuper = $_POST['Super_ssn'];
			$uDno = $_POST['Dno'];
			$uAccount= $_POST["Account"];
			$uPassword= $_POST["Password"];
			
			$sql = "UPDATE employee SET Fname='$uFname',Minit='$uMinit' ,Lname='$uLname' ,Bdate='$uBdate'
				,Address='$uAddress' ,Sex='$uSex', Salary='$uSalary', Super_ssn='$uSuper' ,Dno='$uDno',Password= '$uPassword'
				WHERE Account='$uAccount'";
			
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}
}	
if(isset($_POST["dclick"])){
	$m = $_POST['delete'];

	$sql = "DELETE FROM employee WHERE Ssn='$m'";


	if ($conn->query($sql) === TRUE) {
		echo "Record deleted successfully";
	} else {
		echo "Error deleting record: " . $conn->error;
	}
}
 ?>
</html>