<?php 
	session_start();
	
	$conn = mysqli_connect('localhost','root','','onlineteachertrainer');
	
    $user_id= $_SESSION["UserId"];

    if(isset($_POST['submit'])){

		$Lec_FirstName = $_POST['Lec_FirstName'];
		$Lec_LastName = $_POST['Lec_LastName'];
		$Lec_AddL1 = $_POST['Lec_AddL1'];
		$Lec_Gender = $_POST['Lec_Gender'];
		$Lec_AddL2 = $_POST['Lec_AddL2'];
		$Lec_Mobile = $_POST['Lec_Mobile'];
		$Lec_AddL3 = $_POST['Lec_AddL3'];
		$Lec_Email = $_POST['Lec_Email'];
		$Lec_PW = $_POST['Lec_PW'];
		$Lec_DOB = $_POST['Lec_DOB'];
        $Lec_Cat = $_POST['Lec_Cat'];
		mysqli_query($conn, "UPDATE support_agent SET 	FirstName = '$Lec_FirstName', LastName = '$Lec_LastName', AddressLine1 = '$Lec_AddL1', 
		Gender = '$Lec_Gender', AddressLine2 = '$Lec_AddL2', Mobile = '$Lec_Mobile', AddressLine3 = '$Lec_AddL3', Email = '$Lec_Email',
         Password = '$Lec_PW', DOB = '$Lec_DOB', Category = '$Lec_Cat' where SupAgentId = '$user_id'");
	
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
	<title>TT - Support Agent User Profiles</title> 
	
	<!-- google font & icons -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" text="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	
	<!-- external page link -->
	<link rel="stylesheet" type="text/css" href="style\mainStyle.css">
	<link rel="stylesheet" type="text/css" href="style\supARegStyle.css">
	
</head>
 
<body>
	<?php include('header-in.php'); ?>  <!-- website header -->
	
	<h3 class="lrnReg-title">Support Agent User Profile</h3>

    <?php
	
	$select = mysqli_query($conn, "select * from support_agent where SupAgentId = '$user_id'");

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
				<input type="text" name="Lec_AddL1" value="<?php echo $fetch['AddressLine1']?>" required>
			</td>
			<td class="lrnReg-table-label">
				<p>Gender :</p>
			</td>
			<td class="lrnReg-table-input">
				<select name="Lec_Gender" value="<?php echo $fetch['Gender']?>" required>
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
				<input type="text" name="Lec_Mobile"value="<?php echo $fetch['Mobile']?>" required>
			</td>
		</tr>
		
		<tr>
			<td class="lrnReg-table-label">
				<p>Address Line 03 :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Lec_AddL3"value="<?php echo $fetch['AddressLine3']?>" required>
			</td>
			<td class="lrnReg-table-label">
				<p>Email :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Lec_Email"value="<?php echo $fetch['Email']?>" required>
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
				
            </td>			
		</tr>
		<tr>
			<td class="lrnReg-table-label">
				<p>Category :</p>
			</td>
			<td class="lrnReg-table-input">
				<select name="Lec_Cat" value="<?php echo $fetch['Category']?>" required>
						<option selected hidden value="">Select your catgory</option>
						<option value="Finance">Finance</option>
						<option value="Technical">Technical</option>
						<option value="User-Accounts">User Accounts</option>
				</select>
			</td>
			<td class="lrnReg-table-label">
				
			</td>
			<td class="lrnReg-table-input">
				<input type="submit" id="btnLearnerReg" name="submit" value="Save">	
			</td>
		</tr>		
	</table>	
	</form>
	
	<?php include('footer-in.php'); ?>		
	
</body> 
</html>


