<!DOCTYPE html>
<html>

<form>
<td>Show all data:</td><br>

<input type="submit" value="Click" name="click"><br>

<td>What do you want to do?</td><br>
<select name="insert" onchange="this.form.submit()">
  <option value="0"></option>
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
$dbname = "company_quiz";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
} 

$sql = "SELECT Fname ,Minit,Lname,Ssn,Bdate,Address,Sex,Salary,Super_ssn,Dno
FROM employee
;";
$result = mysqli_query($conn, $sql);

if (isset($_GET["click"]) && $result!= null && mysqli_num_rows($result) >0) {
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
if(isset($_GET["insert"])){
	$cho=$_GET["insert"];
 switch($cho){
	case 1:
	echo "--Insert data--";
		?>
		<table>
		<form method="post" ><br>
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
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
 ?>
</html>