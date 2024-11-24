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
	<title>TT - Lecturer Registration</title> 
	
	<!-- google font & icons -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" text="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	
	<!-- external page link -->
	<link rel="stylesheet" type="text/css" href="style\mainStyle.css">
	<script src="js\mainscript.js"></script>	
</head>
 
<body>
	<?php include('header-in.php'); ?>  <!-- website header -->
	
	<h3 class="lrnReg-title">Lecturer Registration Form</h3>
	
	<form method="POST">
	<table class="lrnReg-table" border=1>
		<tr>
			<td class="lrnReg-table-label">
				<p>First Name :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Lec-FirstName" required>	
			</td>
			<td class="lrnReg-table-label">
				<p>Last Name :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Lec-LastName" required>
			</td>
		</tr>
		
		<tr>
			<td class="lrnReg-table-label">
				<p>Address Line 01:</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Lec-AddL1" required>
			</td>
			<td class="lrnReg-table-label">
				<p>Gender :</p>
			</td>
			<td class="lrnReg-table-input">
				<select name="Lec-Gender" required>
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
				<input type="text" name="Lec-AddL2" required>
			</td>
			<td class="lrnReg-table-label">
				<p>Mobile :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Lec-Mobile" id="phone" onkeyup="validatePhone()">
				<span id="mobile-error"></span>
			</td>
		</tr>
		
		<tr>
			<td class="lrnReg-table-label">
				<p>Address Line 03 :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Lec-AddL3" required>
			</td>
			<td class="lrnReg-table-label">
				<p>Email :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="email" name="Lec-Email" id="email-field" onkeyup="validateEmail()">
				<span id="email-error"></span>
			</td>
		</tr>
				
		<tr>
			<td class="lrnReg-table-label">
				<p>Education :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Lec-Ed1" required>
			</td>
			<td class="lrnReg-table-label">
				<p>Skill Category :</p>
			</td>
			<td class="lrnReg-table-input">
				<select name="Lec-SKC1" required>
						<option selected hidden value="">Select your skill</option>
						<option value="Programming">Programming</option>
						<option value="Animation">Animation</option>
						<option value="Marketing">Marketing</option>
						<option value="Accounting">Accounting</option>
						<option value="Music">Music</option>
						<option value="UI/UX Design">UI/UX Design</option>
				</select>
			</td>
		</tr>
		
		<tr>
			<td class="lrnReg-table-label">
				<p>Education (Other):</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Lec-Ed2" required>
			</td>
			<td class="lrnReg-table-label">
				<p>Skill Category (Other):</p>
			</td>
			<td class="lrnReg-table-input">
				<select name="Lec-SKC2" required>
						<option selected hidden value="">Select your skill</option>
						<option value="Programming">Programming</option>
						<option value="Animation">Animation</option>
						<option value="Marketing">Marketing</option>
						<option value="Accounting">Accounting</option>
						<option value="Music">Music</option>
						<option value="UI/UX Design">UI/UX Design</option>
				</select>
			</td>
		</tr>
		
		
		<tr>
			<td class="lrnReg-table-label">
				<p>Password :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="Password" name="Lec-PW" required>							
			</td>
			<td class="lrnReg-table-label">
				<p>Date of Birth :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="Date" name="Lec-DOB" required>
				<input type="submit" id="btnLearnerReg" name="submit" value="Register">					

			</td>
			
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
	
	$FirstName = $_POST['Lec-FirstName'];
	$LastName = $_POST['Lec-LastName'];
	$Mobile = $_POST['Lec-Mobile'];
	$Email = $_POST['Lec-Email'];
	$AddressLine1 = $_POST['Lec-AddL1'];
	$AddressLine2 = $_POST['Lec-AddL2'];
	$AddressLine3 = $_POST['Lec-AddL3'];
	$DOB = $_POST['Lec-DOB'];
	$Gender = $_POST['Lec-Gender'];	
	$Education1 = $_POST['Lec-Ed1'];
	$Education2 = $_POST['Lec-Ed2'];
	$Skill_Category1 = $_POST['Lec-SKC1'];
	$Skill_Category2 = $_POST['Lec-SKC2'];		
	$Password = $_POST['Lec-PW'];
	$Type = 'LEC';

	$checkSeqId = "SELECT * FROM `lecturer` ORDER BY SeqId DESC LIMIT 1";
	$checkSeqIdResult = mysqli_query($conn,$checkSeqId);
	$rowCount = mysqli_num_rows($checkSeqIdResult);

	if($rowCount > 0) {
		if($row = mysqli_fetch_assoc($checkSeqIdResult)) {
			$uId = $row['LecturerId'];
			$get_numbers = str_replace("LEC", "", $uId);
			$id_increase = $get_numbers + 1;
			$get_string = str_pad($id_increase, 4, 0, STR_PAD_LEFT);	
			$LecturerId = "LEC".$get_string;
			
			//data insert to learner
			$sql1 = "INSERT INTO lecturer(FirstName,LastName,Mobile,Email,AddressLine1,AddressLine2,AddressLine3,DOB,Gender,Education1,Education2,Skill_Category1,Skill_Category2,Password,LecturerId) VALUES('$FirstName','$LastName','$Mobile','$Email','$AddressLine1','$AddressLine2','$AddressLine3','$DOB ','$Gender','$Education1','$Education2','$Skill_Category1','$Skill_Category2','$Password','$LecturerId')";

			if ($conn->query($sql1)) {
			}
			
			else {
				echo "Error : ".$conn->error;
			}
		}
	}
		
	else {
		$LecturerId = 'LEC0001';
		
		//data insert to learner
		$sql2 = "INSERT INTO lecturer(FirstName,LastName,Mobile,Email,AddressLine1,AddressLine2,AddressLine3,DOB,Gender,Education1,Education2,Skill_Category1,Skill_Category2,Password,LecturerId) VALUES('$FirstName','$LastName','$Mobile','$Email','$AddressLine1','$AddressLine2','$AddressLine3','$DOB ','$Gender','$Education1','$Education2','$Skill_Category1','$Skill_Category2','$Password','$LecturerId')";

		if ($conn->query($sql2)) {
				echo '<script> alert("Lecturer successfully registered...");</script>';
		}
			
		else {
			echo "Error : ".$conn->error;
		}	
	}

	//data insert to learner
	$sql3 = "INSERT INTO login (Email,Password,Type,UserId) VALUES('$Email','$Password','$Type','$LecturerId')";
		
	if ($conn->query($sql3)) {
			echo '<script> alert("Lecturer successfully registered...");</script>';
		}
			
	else {
		echo "Error login : ".$conn->error;
	}
}

$conn->close();

?>