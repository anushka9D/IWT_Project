<?php 
	session_start();

	$conn = mysqli_connect('localhost','root','','onlineteachertrainer');

	$user_id = $_SESSION["UserId"];

	if(isset($_POST['submit'])){

		$Ler_FirstName = $_POST['Ler_FirstName'];
		$Ler_LastName = $_POST['Ler_LastName'];
		$Ler_AddL1 = $_POST['Ler_AddL1'];
		$Ler_Gender = $_POST['Ler_Gender'];
		$Ler_AddL2 = $_POST['Ler_AddL2'];
		$Ler_Mobile = $_POST['Ler_Mobile'];
		$Ler_AddL3 = $_POST['Ler_AddL3'];
		$Ler_Email = $_POST['Ler_Email'];
		$Ler_PW = $_POST['Ler_PW'];
		$Ler_DOB = $_POST['Ler_DOB'];
		mysqli_query($conn, "UPDATE learner SET 	FirstName = '$Ler_FirstName', LastName = '$Ler_LastName', AddressLine1 = '$Ler_AddL1', 
		Gender = '$Ler_Gender', AddressLine2 = '$Ler_AddL2', Mobile = '$Ler_Mobile', AddressLine3 = '$Ler_AddL3', Email = '$Ler_Email', Password = '$Ler_PW',
		DOB = '$Ler_DOB'  where StudentId = '$user_id'");
	
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
	<title>TT - Learner User Profile</title> 
	
	<!-- google font & icons -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" text="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	
	<!-- external page link -->
	<link rel="stylesheet" type="text/css" href="style\learnerDeleteStyle.css">
	</head>
 
<body>
	<?php include('header-in.php'); ?>  <!-- website header -->
	
	<h3 class="lrnReg-title">Learner User Profile</h3>

    <?php
	
	$select = mysqli_query($conn, "select * from learner where StudentId = '$user_id'");

	if(mysqli_num_rows($select) > 0){
		$fetch=mysqli_fetch_assoc($select);
	}
	
	?>
	
	
	<form method="POST">
	<table class="lrnReg-table" >
		<tr>
			<td class="lrnReg-table-label">
				<p>First Name :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Ler_FirstName" value="<?php echo $fetch['FirstName']?>" required>	
			</td>
			<td class="lrnReg-table-label">
				<p>Last Name :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Ler_LastName" value="<?php echo $fetch['LastName']?>" required>
			</td>
		</tr>
		
		<tr>
			<td class="lrnReg-table-label">
				<p>Address Line 01:</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Ler_AddL1"  value="<?php echo $fetch['AddressLine1']?>" required>
			</td>
			<td class="lrnReg-table-label">
				<p>Gender :</p>
			</td>
			<td class="lrnReg-table-input">
				<select name="Ler_Gender"  value="<?php echo $fetch['Gender']?>" required>
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
				<input type="text" name="Ler_AddL2"  value="<?php echo $fetch['AddressLine2']?>" required>
			</td>
			<td class="lrnReg-table-label">
				<p>Mobile :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Ler_Mobile"  value="<?php echo $fetch['Mobile']?>" required>
			</td>
		</tr>
		
		<tr>
			<td class="lrnReg-table-label">
				<p>Address Line 03 :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Ler_AddL3"  value="<?php echo $fetch['AddressLine3']?>" required>
			</td>
			<td class="lrnReg-table-label">
				<p>Email :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Ler_Email"  value="<?php echo $fetch['Email']?>" required>
			</td>
		</tr>
		
		<tr>
			<td class="lrnReg-table-label">
				<p>Password :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="Password" name="Ler_PW"  value="<?php echo $fetch['Password']?>" required>							
			</td>
			<td class="lrnReg-table-label">
				<p>Date of Birth :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="Date" name="Ler_DOB"  value="<?php echo $fetch['DOB']?>" required>
			</td>			
		</tr>	
		
		<tr>
			<td></td>
			<td>	</td>
			<td></td>
			<td class="lrnReg-table-input">
				<input type="submit" id="btnLearnerReg" name="submit" value="Save">
   			</td>
		</tr>
		
	</table>
	</form>
	
				<a href="learner_delete_account.php?	id=<?php echo $user_id ?>" onClick="return confirm('Are you sure you want to delete profile?')"><button class="lrnReg-table-delete"> Delete </button></a>

	
	<?php include('footer-in.php'); ?>
	
</body> 
</html>


