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
$input=$_GET["account"];
$input2=$_GET["password"];
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT * FROM user WHERE account= '$input' and password= '$input2'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$tempaccount =$row["account"];
$temppassword=$row["password"];

if ($result->num_rows > 0) {
	$sql = "SELECT * FROM employee WHERE account= '$input'";
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	$test=($tempaccount==$row["account"]);

	if ($test==1){
		$sql = "SELECT * FROM user WHERE account= '$input' ";
		$result = $conn->query($sql);
		$row = mysqli_fetch_assoc($result);
		echo "HI " .$row["name"]." WELCOME TO THE SYSTEM";
		
		?>
		<br><br>
		user imformation:
		<br>
		<table border="1">
		<tr>
		<td ><?php echo "name";?></td>
		<td ><?php echo "account";?></td>
		<td ><?php echo "password";?></td>
		<td ><?php echo "permit";?></td>
		<td ><?php echo "supercount";?></td>
		
		</tr>	
		
		<tr>
		<td ><?php echo $row["name"];?></td>
		<td ><?php echo $row["account"];?></td>
		<td ><?php echo $row["password"];?></td>
		
		
		<?php
		$sql = "SELECT * FROM employee WHERE account= '$input' ";
		$result = $conn->query($sql);
		$row = mysqli_fetch_assoc($result);
		?>
		<td ><?php echo $row["permit"];?></td>
		<td ><?php echo $row["supercount"];?></td>
		</tr>	
		</table>
		
		<br>
		<form action="final.html" method="get">
		<input type="submit" value="log out" name="show"><br>
		</form>
		<br>
		
		<!--usertable ****************************************    -->
		<table border="1">
		
		users:
		<br>
		<tr>
		<td >name</td>
		<td >account</td>
		<td >password</td>
		
		</tr>
		<tr>
		<?php		
			
			
	
		$sql = "SELECT * FROM user";
		$result = mysqli_query($conn, $sql);
	
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>".$row["name"]."</td>";
			echo "<td>".$row["account"]."</td>";
			echo "<td>".$row["password"]."</td>";
			
					
			echo "</tr>";
		}
		?>
		</tr>
		</table>
		
		
		<table border="1">
		<br><br>
		products:
		<br>
		<tr>
		<td >id</td>
		<td >number</td>
		<td >brand</td>
		<td >price</td>
		</tr>
		<tr>
		<?php		
			
			
	
		$sql = "SELECT * FROM item";
		$result = mysqli_query($conn, $sql);
	
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>".$row["id"]."</td>";
			echo "<td>".$row["number"]."</td>";
			echo "<td>".$row["brand"]."</td>";
			echo "<td>".$row["price"]."</td>";
		
			echo "</tr>";
		}
		?>
		</tr>
		</table>
		
		<table border="1">
		<br><br>
		list:
		<br>
		<tr>
		<td >total</td>
		<td >address</td>
		<td >number</td>
		<td >id</td>
		<td >account</td>
		</tr>
		<tr>
		<?php		
			
			
	
		$sql = "SELECT * FROM list";
		$result = mysqli_query($conn, $sql);
	
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>".$row["total"]."</td>";
			echo "<td>".$row["address"]."</td>";
			echo "<td>".$row["number"]."</td>";
			echo "<td>".$row["id"]."</td>";
			echo "<td>".$row["account"]."</td>";
		
			echo "</tr>";
		}
		?>
		</tr>
		</table>
		
		
		
		<br>
		
		<form method="post">
		<input type="submit" value="insert" name="insert">
		<input type="submit" value="update" name="update">
		<input type="submit" value="delete" name="delete">
		<!--<input type="submit" value="show detail" name="show"><br>-->
		<!--<input type="submit" value="show list" name="showlist"><br>-->
		<input type="submit" value="clear list" name="clearlist"><br><br>
		user management:
		<br><br>
		<input type="submit" value="delete user" name="deleteuser">
		<input type="submit" value="enploy new enployee" name="employuser">
		<br><br>
		<input type="button" value="refresh !" onClick="window.location.reload()">
		
		</form>
		
		
		
		<?php
		
		
	}
	else {
		$sql = "SELECT * FROM user WHERE account= '$input' and password= '$input2'";
		$result = $conn->query($sql);
		$row = mysqli_fetch_assoc($result);
		$tempaddress = $row["address"];
		echo "HI " .$row["name"]." WELCOME TO THE SYSTEM	";
		?>

		<table border="1">
		<tr>
		<td ><?php echo "name";?></td>
		<td ><?php echo "account";?></td>
		<td ><?php echo "password";?></td>
		<td >address</td>
		<!--<td >remain</td>-->
		</tr>	
		<tr>
		<td ><?php echo $row["name"];?></td>
		<td ><?php echo $row["account"];?></td>
		<td ><?php echo $row["password"];?></td>		
		<td ><?php echo $row["address"];?></td>
		
		
		</tr>	
		</table>
		
		<br><br><br>
		
		</form>
		
		<form action="final.html" method="get">
		<input type="submit" value="log out" name="show"><br>
		</form>
		
		show all data:<br><br>
		
		<table border="1">
		<tr>
		<td >id</td>
		<td >number</td>
		<td >brand</td>
		<td >price</td>
		
		</tr>
		<tr>
		<?php		
			
			
	
		$sql = "SELECT * FROM item";
		$result = mysqli_query($conn, $sql);
		
    // output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			
			echo "<tr>";
			echo "<td>".$row["id"]."</td>";
			echo "<td>".$row["number"]."</td>";
			echo "<td>".$row["brand"]."</td>";
			echo "<td>".$row["price"]."</td>";
			//echo "<td>".$row["image"]."</td>";
			
		
			echo "</tr>";
    }
	?>
		</tr>
		</table>
		
		<br><br><br>
		what do you want to buy:
		
		<form method="post" ><br>
		<table>
			
			
			<tr width="30%">
			<td>item id:</td>
			<td><input type="text" name='itemid'></td></tr>
			
			<tr width="30%">
			<td>number:</td>
			<td><input type="text" name='itemnumber'></td></tr>
			
		</table>		
		<br><br>
		<input type="submit" value="Add to your Shopping Cart" name="buy" ><br>	
		<br><br>
		<input type="submit" value="Shopping Cart" name="usershowlist"><br>
		<br><br>
		<!--
		<input type="button" value="refresh after you add something in shopping cart!" onClick="window.location.reload()">
		-->
		</form>
		
		
		
		
		
		<?php
		
	}
	
	
} else {
    ?>
	
	
	<form action="final.html" method="get">
	<center>
	<br>
	<br>
	<br>
	<br>
	<br>
	error plese try it again
	<br>
	<input type="submit" value="back">
	</center>
	</form>
	<?php
}

//-------------****************------------------*********************----------------------------------
if(isset($_POST["buy"])){
	$buyid = $_POST['itemid'];
	$buynumber = $_POST['itemnumber'];
	$useaddress=$tempaddress;
	$useaccount=$tempaccount;
	$sql = "SELECT * FROM item WHERE id= '$buyid'";
	$result = $conn->query($sql);	
	$row = mysqli_fetch_assoc($result);
	$buyprice=$row["price"];
	$origionalnumber=$row["number"];
	$total=$buynumber*$buyprice;
	
	if (($origionalnumber-'$buynumber')>=0)
	{
		$sql = "INSERT INTO list (id,total,address,number,account) VALUES($buyid,$total,'$useaddress',$buynumber,'$useaccount');";
	
		if (mysqli_query($conn, $sql)) {
			echo "<br> New record created successfully";
		} else {
			echo "<br> Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
		
		$sql2 = "UPDATE item SET number=$origionalnumber-'$buynumber' WHERE id='$buyid';";
		$result2 = mysqli_query($conn, $sql2);
	}
	else
	{
		echo "<br>Not Enough Products!!";
	}
	
	
	
	
	
}



if(isset($_POST["insert"])){
	?>
	<form method="post" ><br>
		<table>
			<tr width="30%">
			<td>id:</td>
			<td><input type="text" name='id'></td></tr>
			
			
			<tr width="30%">
			<td>number:</td>
			<td><input type="text" name='number'></td></tr>
			
			<tr width="30%">
			<td>brand:</td>
			<td><input type="text" name='brand'></td></tr>
			
			<tr width="30%">
			<td>price:</td>
			<td><input type="text" name='price'></td></tr>
			
			
			
			
			
		  </table>			
			<input type="submit" value="insert" name="inse">
		</form>
	<?php
		
}

if(isset($_POST["inse"])){
	$id = $_POST['id'];
	$number = $_POST['number'];
	$brand = $_POST['brand'];
	$price = $_POST['price'];
	
	$sql = "INSERT INTO item (id,number,brand,price)
	VALUES($id,$number,'$brand',$price)";
	if (mysqli_query($conn, $sql)) {
		echo "<br> New record created successfully";
	} else {
		echo "<br> Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}


if(isset($_POST["update"])){
	
	?>
	<form method="post" ><br>
		<table>
			<tr width="30%">
			<td>input id to modify:</td>
			<td><input type="text" name='modiId'></td>
			</tr>
		</table>
		<input type="submit" value="Modify" name="moClick">
		<form>	
	
	<?php
		
}


if(isset($_POST["moClick"])){
	
	$mo = $_POST['modiId'];
	$sql = "SELECT * FROM item WHERE id= '$mo'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	
	$iid = $row['id'];
	$nnu = $row['number'];
	$bbr = $row['brand'];
	$ppr = $row['price'];
	?>
	
	<form method="post" ><br>
		<table>
		
			<tr width="30%">
			<td>id:</td>
			<?php
			echo "<td><input type='text' name='mmid' value='$iid'></td></tr>";
			?>
			</tr>
			
			<tr width="30%">
			<td>number:</td>
			<?php
			echo "<td><input type='text' name='mmnumber' value='$nnu'></td></tr>";
			?>
			</tr>
			
			<tr width="30%">
			<td>brand:</td>
			<?php
			echo "<td><input type='text' name='mmbrand' value='$bbr'></td></tr>";
			?>
			</tr>
			
			<tr width="30%">
			<td>price:</td>
			<?php
			echo "<td><input type='text' name='mmprice' value='$ppr'></td></tr>";
			?>
			</tr>
			
			
		  </table>			
			<input type="submit" value="Change" name="moFinish">
	</form>
	
	<?php
		
}

if(isset($_POST["moFinish"])){
	$newid = $_POST['mmid'];
	$newnumber = $_POST['mmnumber'];
	$newbrand = $_POST['mmbrand'];
	$newprice = $_POST['mmprice'];
	$sql = "UPDATE item SET id ='$newid',number='$newnumber', brand='$newbrand',price='$newprice' WHERE id='$newid'";


	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}

}




if(isset($_POST["delete"])){
	echo "which one do you want to delete:";
	?>
	
	
	<form  method="post"><br>
	item id: 
	<input type="text" name="deid"><br>
	
	<input type="hidden" name="ac" value="<?php echo $input;?>" />
	<input type="hidden" name="pa" value="<?php echo $input2;?>" />
	<input type="submit" value="delete" name="deletebutton">
	
	</form>
	<?php	
}

if(isset($_POST["deletebutton"])){
	$de =$_POST["deid"];
	$sql = "DELETE FROM item WHERE id= '$de'";
	
	if (mysqli_query($conn, $sql)) {
		echo "<br> delete successfully<br>";
	} else {
		echo "<br> Error: " . $sql . "<br>" . mysqli_error($conn);
	}


}





if(isset($_POST["show"])){
?>
	<table border="1">
		<tr>
		<td >id</td>
		<td >number</td>
		<td >brand</td>
		<td >price</td>
		</tr>
		<tr>
<?php		
			
			
	
	$sql = "SELECT * FROM item";
	$result = mysqli_query($conn, $sql);
	
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
		echo "<td>".$row["id"]."</td>";
		echo "<td>".$row["number"]."</td>";
		echo "<td>".$row["brand"]."</td>";
		echo "<td>".$row["price"]."</td>";
		
		echo "</tr>";
    }
	?>
	</tr>
	</table>
	<?php
    
}

if(isset($_POST["showlist"])){
?>
	<table border="1">
		<tr>
		<td >total</td>
		<td >address</td>
		<td >number</td>
		<td >id</td>
		<td >account</td>
		</tr>
		<tr>
<?php		
			
			
	
	$sql = "SELECT * FROM list";
	$result = mysqli_query($conn, $sql);
	
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
		echo "<td>".$row["total"]."</td>";
		echo "<td>".$row["address"]."</td>";
		echo "<td>".$row["number"]."</td>";
		echo "<td>".$row["id"]."</td>";
		echo "<td>".$row["account"]."</td>";
		
		echo "</tr>";
    }
	?>
	</tr>
	</table>
	<?php
    
}
//---------------------------------------------------------------------------------------------
if(isset($_POST["usershowlist"])){
?>
	<table border="1">
		<tr>
		<td >total</td>
		<td >address</td>
		<td >number</td>
		<td >id</td>
		<td >account</td>
		</tr>
		<tr>
<?php		
			
			
	
	$sql = "SELECT * FROM list WHERE account=$tempaccount;";
	$result = mysqli_query($conn, $sql);
	
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
		echo "<td>".$row["total"]."</td>";
		echo "<td>".$row["address"]."</td>";
		echo "<td>".$row["number"]."</td>";
		echo "<td>".$row["id"]."</td>";
		echo "<td>".$row["account"]."</td>";
		
		echo "</tr>";
    }
	?>
	</tr>
	</table>
	<?php
    
}
//-------------------------------------------------------------------------------------------
if(isset($_POST["clearlist"])){
	
	$sql = "DELETE FROM list WHERE 1";
	
	if (mysqli_query($conn, $sql)) {
		echo "<br> delete successfully<br>";
	} else {
		echo "<br> Error: " . $sql . "<br>" . mysqli_error($conn);
	}


}
//------**********************user delete*******************
if(isset($_POST["deleteuser"])){
	echo "which one do you want to delete:";
	?>
	<!-- <form action="finaltest.php" method="get"> -->
	
	<form  method="post"><br>
	user account: 
	<input type="text" name="deid"><br>
	
	<input type="hidden" name="ac" value="<?php echo $input;?>" />
	<input type="hidden" name="pa" value="<?php echo $input2;?>" />
	<input type="submit" value="delete" name="userdeletebutton">
	
	</form>
	<?php	
}
if(isset($_POST["userdeletebutton"])){
	$de =$_POST["deid"];
	$sql = "DELETE FROM user WHERE account='$de'";
	
	if (mysqli_query($conn, $sql)) {
		echo "<br> delete successfully<br>";
	} else {
		echo "<br> Error: " . $sql . "<br>" . mysqli_error($conn);
	}


}
//---------------***********-----------------*************---------
if(isset($_POST["employuser"])){
	?>
	<form method="post" ><br>
		<table>
		input the account you want to enploy
			<tr width="30%">
			<td>account:</td>
			<td><input type="text" name='account'></td></tr>
						
		  </table>			
			<input type="submit" value="unploy!!" name="employfinish">
		</form>
	<?php
		
}

if(isset($_POST["employfinish"])){
	$account = $_POST['account'];
	
	
	$sql = "INSERT INTO employee (permit, supercount, account)
	VALUES(0, 123, '$account')";
	if (mysqli_query($conn, $sql)) {
		echo "<br> New record created successfully";
	} else {
		echo "<br> Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}




$conn->close();
?>

	


</body>


</html>