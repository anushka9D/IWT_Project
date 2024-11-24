<?php 
	session_start();
	
	$conn = mysqli_connect('localhost','root','','onlineteachertrainer');

	$user_id = $_SESSION["UserId"];

	if(isset($_POST['submit'])){

		$admin_FirstName = $_POST['admin_FirstName'];
		$admin_LastName = $_POST['admin_LastName'];
		$admin_AddL1 = $_POST['admin_AddL1'];
		$admin_Gender = $_POST['admin_Gender'];
		$admin_AddL2 = $_POST['admin_AddL2'];
		$admin_Mobile = $_POST['admin_Mobile'];
		$admin_AddL3 = $_POST['admin_AddL3'];
		$admin_Email = $_POST['admin_Email'];
		$admin_PW = $_POST['admin_PW'];
		$admin_DOB = $_POST['admin_DOB'];
		mysqli_query($conn, "UPDATE admins SET 	FirstName = '$admin_FirstName', LastName = '$admin_LastName', Addressline1 = '$admin_AddL1', 
		Gender = '$admin_Gender', Addressline2 = '$admin_AddL2', Mobile = '$admin_Mobile', Addressline3 = '$admin_AddL3', Email = '$admin_Email', 
		 Password = '$admin_PW',
		Birthday = '$admin_DOB'  where AdminId = '$user_id'");
	
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
	<title>TT - Admin User Profile</title> 
	
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
	
	<h3 class="lrnReg-title">Admin User Profile</h3>

	<?php
	
	$select = mysqli_query($conn, "select * from admins where AdminId = '$user_id'");

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
				<input type="text" name="admin_FirstName" value="<?php echo $fetch['FirstName']?>" required>	
			</td>
			<td class="lrnReg-table-label">
				<p>Last Name :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="admin_LastName" value="<?php echo $fetch['LastName']?>" required>
			</td>
		</tr>
		
		<tr>
			<td class="lrnReg-table-label">
				<p>Address Line 01:</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="admin_AddL1" value="<?php echo $fetch['Addressline1']?>"required>
			</td>
			<td class="lrnReg-table-label">
				<p>Gender :</p>
			</td>
			<td class="lrnReg-table-input">
			<input type="text" name="admin_Gender" value="<?php echo $fetch['Gender']?>" required>
			</td>
		</tr>
		
		<tr>
			<td class="lrnReg-table-label">
				<p>Address Line 02 :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="admin_AddL2" value="<?php echo $fetch['Addressline2']?>" required>
			</td>
			<td class="lrnReg-table-label">
				<p>Mobile :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="admin_Mobile" value="<?php echo $fetch['Mobile']?>" required>
			</td>
		</tr>
		
		<tr>
			<td class="lrnReg-table-label">
				<p>Address Line 03 :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="admin_AddL3" value="<?php echo $fetch['Addressline3']?>" required>
			</td>
			<td class="lrnReg-table-label">
				<p>Email :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="admin_Email" value="<?php echo $fetch['Email']?>"required>
			</td>
		</tr>
				

		<tr>
			<td class="lrnReg-table-label">
				<p>Password :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="Password" name="admin_PW" value="<?php echo $fetch['Password']?>" required>													
			</td>
			<td class="lrnReg-table-label">
				<p>Date of Birth :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="admin_DOB" value="<?php echo $fetch['Birthday']?>"required>
				<input type="submit" id="btnLearnerReg" name="submit" value="Save">	
			</td>
			
		</tr>	
	</table>
	</form>
	
	<?php include('footer-in.php'); ?>
	
</body> 
</html>


