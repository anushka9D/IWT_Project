<?php 
	session_start();
	
	$conn = mysqli_connect('localhost','root','','onlineteachertrainer');

	$user_id = $_SESSION["UserId"];

	if(isset($_POST['submit'])){

		$Lec_FirstName = $_POST['Lec_FirstName'];
		$Lec_LastName = $_POST['Lec_LastName'];
		$Lec_AddL1 = $_POST['Lec_AddL1'];
		$Lec_Gender = $_POST['Lec_Gender'];
		$Lec_AddL2 = $_POST['Lec_AddL2'];
		$Lec_Mobile = $_POST['Lec_Mobile'];
		$Lec_AddL3 = $_POST['Lec_AddL3'];
		$Lec_Email = $_POST['Lec_Email'];
		$Lec_Ed1 = $_POST['Lec_Ed1'];
		$Lec_SKC1 = $_POST['Lec_SKC1'];
		$Lec_Ed2 = $_POST['Lec_Ed2'];
		$Lec_SKC2 = $_POST['Lec_SKC2'];
		$Lec_PW = $_POST['Lec_PW'];
		$Lec_DOB = $_POST['Lec_DOB'];
		mysqli_query($conn, "UPDATE lecturer SET 	FirstName = '$Lec_FirstName', LastName = '$Lec_LastName', AddressLine1 = '$Lec_AddL1', 
		Gender = '$Lec_Gender', AddressLine2 = '$Lec_AddL2', Mobile = '$Lec_Mobile', AddressLine3 = '$Lec_AddL3', Email = '$Lec_Email', 
		Education1 = '$Lec_Ed1', Skill_Category1 = '$Lec_SKC1' , Education2 = '$Lec_Ed2', Skill_Category2 = '$Lec_SKC2', Password = '$Lec_PW',
		DOB = '$Lec_DOB'  where LecturerId = '$user_id'");
	
		echo '<script>alert("Update successfull!");</script>';
	}

?>

<!DOCTYPE HTML>
<html lang="en">
 
<head>
	<!-- webpage data -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/website_icon.ico">
	<title>TT - Lecturer User Profile</title> 
	
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
	
	<h3 class="lrnReg-title">Lecturer User Profile</h3>

	<?php
	
	$select = mysqli_query($conn, "select * from lecturer where LecturerId = '$user_id'");

	if(mysqli_num_rows($select) > 0){
		$fetch=mysqli_fetch_assoc($select);
	}
	
	?>
	
	<form method="POST">
	<table class="lrnReg-table">
		<tr>
			<td class="lrnReg-table-label">
				<p>First Name :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Lec_FirstName" value="<?php echo $fetch['FirstName']?>" required>	
			</td>
			<td class="lrnReg-table-label">
				<p>Last Name :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Lec_LastName" value="<?php echo $fetch['LastName']?>" required>
			</td>
		</tr>
		
		<tr>
			<td class="lrnReg-table-label">
				<p>Address Line 01:</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Lec_AddL1" value="<?php echo $fetch['AddressLine1']?>"required>
			</td>
			<td class="lrnReg-table-label">
				<p>Gender :</p>
			</td>
			<td class="lrnReg-table-input">
				<select name="Lec_Gender" value="<?php echo $fetch['Gender']?>">
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
				<input type="text" name="Lec_AddL2" value="<?php echo $fetch['AddressLine2']?>" required>
			</td>
			<td class="lrnReg-table-label">
				<p>Mobile :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Lec_Mobile" value="<?php echo $fetch['Mobile']?>" required>
			</td>
		</tr>
		
		<tr>
			<td class="lrnReg-table-label">
				<p>Address Line 03 :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Lec_AddL3" value="<?php echo $fetch['AddressLine3']?>" required>
			</td>
			<td class="lrnReg-table-label">
				<p>Email :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Lec_Email" value="<?php echo $fetch['Email']?>"required>
			</td>
		</tr>
				
		<tr>
			<td class="lrnReg-table-label">
				<p>Education :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Lec_Ed1" value="<?php echo $fetch['Education1']?>"required>
			</td>
			<td class="lrnReg-table-label">
				<p>Skill Category :</p>
			</td>
			<td class="lrnReg-table-input">
				<select name="Lec_SKC1" value="<?php echo $fetch['Skill_Category1']?>">
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
				<input type="text" name="Lec_Ed2" value="<?php echo $fetch['Education2']?>" required>
			</td>
			<td class="lrnReg-table-label">
				<p>Skill Category (Other):</p>
			</td>
			<td class="lrnReg-table-input">
				<select name="Lec_SKC2" value="<?php echo $fetch['Skill_Category2']?>" >
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
				<input type="Password" name="Lec_PW" value="<?php echo $fetch['Password']?>" required>													
			</td>
			<td class="lrnReg-table-label">
				<p>Date of Birth :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="Date" name="Lec_DOB" value="<?php echo $fetch['DOB']?>"required>
				<input type="submit" id="btnLearnerReg" name="submit" value="Save">	
			</td>			
		</tr>		
	</table>	
	</form>
	
	<?php include('footer-in.php'); ?>
	
</body> 
</html>


