<!DOCTYPE html>
<html>

<form>
<td>Show all data:</td><br>

<input type="submit" value="Click" name="click"><br>

<td>What do you want to do?</td><br>
<select name="insert" onchange="this.form.submit()">
  <option>choose one</option>
　<option value="1">Insert</option>
　<option value="2">Modify</option>
　<option value="3">Delete</option>
</select>
<td></td><br>
</form>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db2";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
} 

$sql = "SELECT Fname ,Minit,Lname,Ssn,Bdate,Address,Sex,Salary,Super_ssn,Dno FROM employee";
$result = mysqli_query($conn, $sql);

if (isset($_POST["click"]) && $result!= null && mysqli_num_rows($result) >0) {
     echo "<table><tr><th>Fname</th><th>Minit</th><th>Lname</th><th>Ssn</th><th>Bdate</th><th>Address</th><th>Sex</th><th>Salary</th><th>Super_ssn</th><th>Dno</th></tr>";
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
		 </tr>" ;

     }
     echo "</table>";
}


if(isset($_POST["insert"])){
	$cho=$_POST["insert"];
switch($cho){
	case 1:
	echo "--Insert data--";
		?>
		
		<form method="post" ><br>
		<table>
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
			<td><input type="text" name='Bdate'</td></tr>
			
			<tr width="30%">
			<td>Address:</td>
			<td><input type="text" name='address'></td></tr>
			
			<tr width="30%">
			<td>Sex:</td>
			<td><input type="radio" value='M' name="gender">Male<input type="radio" value='F' name="gender">Female</td></tr>
			
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
			<input type="submit" value="Submit" name="iclick">
		  </form>
		<?php
		break;
		
		
	case 2:
		echo "--Modify data--";
		?>
		<form method="post" ><br>
		<table>
			<tr width="30%">
			<td>Please key in ssn to modify:</td>
			<td><input type="text" name='moSsn'></td>
			</tr>
		</table>
		<input type="submit" value="Modify" name="moClick">
		<form>	
		
		<?php
		break;
	
	
	case 3:
		echo "--Delete data--";
		?>
		
		<form method="post" ><br>
		<table>
			<tr width="30%">
			<td>Please key in ssn to delete:</td>
			<td><input type="text" name='deSsn'></td>
			</tr>
		</table>
		<input type="submit" value="Delete" name="deClick">
		<form>	
			
		
		<?php
		break;
	
	}
	
		
		
}


if(isset($_POST["iclick"])){
	$Fname = $_POST['Fname'];
	$Minit = $_POST['Minit'];
	$Lname = $_POST['Lname'];
	$ssn = $_POST['Ssn'];
	$Bdate = $_POST['Bdate'];
	$Address = $_POST['address'];
	$Sex = $_POST['gender'];
	$Salary = $_POST['Salary'];
	$Super = $_POST['Super_ssn'];
	$Dno = $_POST['Dno'];
	$sql = "INSERT INTO employee (Fname ,Minit,Lname,Ssn,Bdate,Address,Sex,Salary,Super_ssn,Dno)
	VALUES ('$Fname ','$Minit ','$Lname ','$ssn ','$Bdate ','$Address ','$Sex ','$Salary ','$Super ','$Dno')";
	if (mysqli_query($conn, $sql)) {
		echo "<br> New record created successfully";
	} else {
		echo "<br> Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}



if(isset($_POST["moClick"])){
	$mo = $_POST['moSsn'];
	$sql = "SELECT Fname ,Minit,Lname,Ssn,Bdate,Address,Sex,Salary,Super_ssn,Dno FROM employee WHERE Ssn= '$mo'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	
	$Fname = $row['Fname'];
	$Minit = $row['Minit'];
	$Lname = $row['Lname'];
	$ssn = $row['Ssn'];
	$Bdate = $row['Bdate'];
	$Address = $row['Address'];
	$Sex = $row['Sex'];
	$Salary = $row['Salary'];
	$Super = $row['Super_ssn'];
	$Dno = $row['Dno'];
	echo $Sex ;
	?>
	<form method="post" ><br>
		<table>
		
			<tr width="30%">
			<td>First name:</td>
			<?php
			echo "<td><input type='text' name='Fname' value='$Fname'></td></tr>";
			?>
			</tr>
			
			<tr width="30%">
			<td>Minit:</td>
			<?php
			echo "<td><input type='text' name='Minit' value='$Minit'></td></tr>";
			?>
			</tr>
			
			<tr width="30%">
			<td>Last name:</td>
			<?php
			echo "<td><input type='text' name='Lname' value='$Lname'></td></tr>";
			?>
			</tr>
			
			<tr width="30%">
			<td>Ssn:</td>
			<?php
			echo "<td><input type='text' name='Ssn' value='$ssn'></td></tr>";
			?>
			</tr>
			
			<tr width="30%">
			<td>Birthday:</td>
			<?php
			echo "<td><input type='text' name='Bdate' value='$Bdate'></td></tr>";
			?>
			</tr>
			
			<tr width="30%">
			<td>Address:</td>
			<?php
			echo "<td><input type='text' name='address' value='$Address'></td></tr>";
			?>
			</tr>
			
			<tr width="30%">
			<td>Sex:</td>
			<?php
			echo "<td><input type='radio' value='M' name='gender'>";
			?>
			Male
			<?php
			echo "<input type='radio' value='F' name='gender'>";
			?>
			Female</td>
			
			</tr>
			
			<tr width="30%">
			<td>Salary:</td>
			<?php
			echo "<td><input type='text' name='Salary' value='$Salary'></td></tr>";
			?>
			</tr>
			
			<tr width="30%">
			<td>Superior ssn:</td>
			<?php
			echo "<td><input type='text' name='Super_ssn' value='$Super'></td></tr>";
			?>
			</tr>
			
			<tr width="30%">
			<td>Dno:</td>
			<?php
			echo "<td><input type='text' name='Dno' value='$Dno'></td></tr>";
			?>
			</tr>
		  </table>			
			<input type="submit" value="Change" name="moFinish">
    </form>
	<?php
	
}


if(isset($_POST["deClick"])){
	$de = $_POST['deSsn'];
	$sql = "DELETE FROM employee WHERE Ssn= '$de'";
	
	if (mysqli_query($conn, $sql)) {
		echo "<br> delete successfully";
	} else {
		echo "<br> Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}


if(isset($_POST["moFinish"])){
	
	$Fname = $_POST['Fname'];
	$Minit = $_POST['Minit'];
	$Lname = $_POST['Lname'];
	$ssn = $_POST['Ssn'];
	$Bdate = $_POST['Bdate'];
	$Address = $_POST['address'];
	$Sex = $_POST['gender'];
	$Salary = $_POST['Salary'];
	$Super = $_POST['Super_ssn'];
	$Dno = $_POST['Dno'];
	$sql = "UPDATE employee SET Fname = '$Fname', Minit= '$Minit', Lname= '$Lname', Bdate= '$Bdate', Address = '$Address', Sex='$Sex', Salary ='$Salary', Super_ssn='$Super', Dno ='$Dno' WHERE Ssn='$ssn'";


	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}

	$conn->close();
}


 ?>
</html>