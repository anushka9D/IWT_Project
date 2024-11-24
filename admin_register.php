<?php 
	$conn = mysqli_connect('localhost','root','','onlineteachertrainer');
?>

<!DOCTYPE HTML>
<html lang="en">
 
<head>
	<!-- webpage data -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/website_icon.ico">
	<title>TT - Admin Agent Registration</title> 
	
	<!-- google font & icons -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" text="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	
	<!-- external page link -->
	<link rel="stylesheet" type="text/css" href="style\mainStyle.css">
	<link rel="stylesheet" type="text/css" href="style\supARegStyle.css">
	<script src="js\mainscript.js"></script>
	
</head>
 
<body>
	<?php include('header-in.php'); ?>  <!-- website header -->
	
	<h3 class="supReg-title">Admin Registration</h3>
	
	<form method="POST">
	<table class="lrnReg-table" border=1>
		<tr>
			<td class="lrnReg-table-label">
				<p>First Name :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Adm-FirstName" required>	
			</td>
			<td class="lrnReg-table-label">
				<p>Last Name :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Adm-LastName" required>
			</td>
		</tr>
		
		<tr>
			<td class="lrnReg-table-label">
				<p>Address Line 01:</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Adm-AddL1" required>
			</td>
			<td class="lrnReg-table-label">
				<p>Gender :</p>
			</td>
			<td class="lrnReg-table-input">
				<select name="Adm-Gender" required>
						<option selected hidden value="">Select your gender</option>
						<option value="M">Male</option>
						<option value="F">Female</option>
				</select>
			</td>
		</tr>
		
		<tr>
			<td class="lrnReg-table-label">
				<p>Address Line 02 :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Adm-AddL2" required>
			</td>
			<td class="lrnReg-table-label">
				<p>Mobile :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Adm-Mobile" id="phone" onkeyup="validatePhone()">
				<span id="mobile-error"></span>
			</td>
		</tr>
		
		<tr>
			<td class="lrnReg-table-label">
				<p>Address Line 03 :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Adm-AddL3" required>
			</td>
			<td class="lrnReg-table-label">
				<p>Email :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="email" name="Adm-Email" id="email-field" onkeyup="validateEmail()">
				<span id="email-error"></span>
			</td>
		</tr>
						
		<tr>
			<td class="lrnReg-table-label">
				<p>Password :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="Password" name="Adm-PW" required>							
			</td>
			<td class="lrnReg-table-label">
				<p>Date of Birth :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="Date" name="Adm-DOB" required>
				<input type="submit" id="btnLearnerReg" name="submit" value="Register">
			</td>			
		</tr>
		</tr>		
	</table>
	</form>
	
	<?php include('footer-in.php'); ?>			
	
	
	<script>
	
		var emailField = document.getElementById("email-field");
		var emailError = document.getElementById("email-error");
				
		function validateEmail() {
			if(!emailField.value.match(/^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)){
				emailError.innerHTML = "Please enter a valid email";
				emailField.style.backgroundColor = "red";		
				emailField.style.color = "white";				
				return false;
			}
						
				emailError.innerHTML = "";
				emailField.style.backgroundColor = "#34ebae";		
				emailField.style.color = "black";			
				return true;
		}
		  
		function validatePhone() {
			
		var number = document.getElementById("phone").value;
		
		var numberField = document.getElementById("phone");
		var mobileError = document.getElementById("mobile-error");		
				
		if(number.length !== 10) {
				mobileError.innerHTML = "Mobile number not correct";
				numberField.style.backgroundColor = "red";		
				numberField.style.color = "white";				
				return false;
			}
						
				mobileError.innerHTML = "";
				numberField.style.backgroundColor = "#34ebae";		
				numberField.style.color = "black";			
				return true;
		}
		
	</script>
	
	
</body> 
</html>



<?php 

if(isset($_POST['submit'])) {
	
	$FirstName = $_POST['Adm-FirstName'];
	$LastName = $_POST['Adm-LastName'];
	$Mobile = $_POST['Adm-Mobile'];
	$Email = $_POST['Adm-Email'];
	$AddressLine1 = $_POST['Adm-AddL1'];
	$AddressLine2 = $_POST['Adm-AddL2'];
	$AddressLine3 = $_POST['Adm-AddL3'];
	$DOB = $_POST['Adm-DOB'];
	$Gender = $_POST['Adm-Gender'];	
	$Password = $_POST['Adm-PW'];
	$Type = 'ADM';

	$checkSeqId = "SELECT * FROM admins ORDER BY SeqId DESC LIMIT 1";
	$checkSeqIdResult = mysqli_query($conn,$checkSeqId);
	$rowCount = mysqli_num_rows($checkSeqIdResult);

	if($rowCount > 0) {
		if($row = mysqli_fetch_assoc($checkSeqIdResult)) {
			$uId = $row['AdminId'];
			$get_numbers = str_replace("AD", "", $uId);
			$id_increase = $get_numbers + 1;
			$get_string = str_pad($id_increase, 3, 0, STR_PAD_LEFT);	
			$AdminId = "AD".$get_string;
			
			//data insert
			$sql1 = "INSERT INTO admins(FirstName,LastName,Mobile,Email,Addressline1,Addressline2,Addressline3,Birthday,Gender,Password,AdminId) VALUES('$FirstName','$LastName','$Mobile','$Email','$AddressLine1','$AddressLine2','$AddressLine3','$DOB ','$Gender','$Password','$AdminId')";

			if ($conn->query($sql1)) {
				
			}
			
			else {
				echo 'Error : '.$conn->error;
			}
		}
	}
		
	else {
		$AdminId = 'AD001';
		
		//data insert
		$sql2 = "INSERT INTO admins(FirstName,LastName,Mobile,Email,Addressline1,Addressline2,Addressline3,Birthday,Gender,Password,AdminId) VALUES('$FirstName','$LastName','$Mobile','$Email','$AddressLine1','$AddressLine2','$AddressLine3','$DOB ','$Gender','$Password','$AdminId')";

		if ($conn->query($sql2)) {
				echo '<script>alert("Support agent added successfully");</script>';
		}
			
		else {
			echo 'Error : '.$conn->error;
		}	
	}

	//data insert
	$sql3 = "INSERT INTO login (Email,Password,Type,UserId) VALUES('$Email','$Password','$Type','$AdminId')";
		
	if ($conn->query($sql3)) {
			echo '<script>alert("Admin added successfully");</script>';
		}
			
	else {
		echo 'Error login : '.$conn->error;
	}
}

$conn->close();

?>