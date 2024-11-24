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
	<title>TT - Support Form</title> 
	
	<!-- google font & icons -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" text="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	
	<!-- external page link -->
	<link rel="stylesheet" type="text/css" href="style\mainStyle.css"> 
	<link rel="stylesheet" type="text/css" href="style\mainStyle.css"> 
	<link rel="stylesheet" type="text/css" href="style\supFormStyle.css"> 
	
</head>
 
<body>
	<?php include('header-in.php'); ?>  <!-- website header -->
	
	<h3 class="sf-title">User Support Form</h3>
	
	<form method="POST">
	<table class="sf-table" border=1>
		<tr>
			<td class="sf-table-label">
				<p>Name :</p>
			</td>
			<td class="sf-table-input">
				<input type="text" name="sf-Name" required>	
			</td>
		</tr>
		
		<tr>
			<td class="sf-table-label">
				<p>Email :</p>
			</td>
			<td class="sf-table-input">
				<input type="text" name="sf-Email" required>
			</td>
		</tr>
		
		<tr>
			<td class="sf-table-label">
				<p>Mobile :</p>
			</td>
			<td class="sf-table-input">
				<input type="text" name="sf-Mobile" required>
			</td>
		</tr>
		
		<tr>
			<td class="sf-table-label">
				<p>Requet Type :</p>
			</td>
			<td class="sf-table-input">
				<select name="sf-ReqType" required>
						<option selected hidden value="">Select your request type</option>
						<option value="REG_ISUE">Registration issue</option>
						<option value="LOG_ISUE">Login related issue</option>
						<option value="PW_RESET">Password reset request</option>
						<option value="COURSE">Question about courses</option>
						<option value="PAYMENT">Payment related question</option>
						<option value="PAY_CNL">Payment cancellation</option>
				</select>
			</td>
		</tr>
		
		<tr>
			<td class="sf-table-label">
				<p>Message :</p>
			</td>
			<td class="sf-table-input">
				<input type="text" name="sf-Msg" required>
			</td>
			
		</tr>
		
		<tr>
			<td colspan="2">
				<input type="submit" id="btnSupForm" name="submit" value="Register">	
			</td>
		</tr>		
	</table>
	</form>
	
	<?php include('footer-in.php'); ?>	  <!-- website footer -->	

</body> 
</html>



<?php 

if(isset($_POST['submit'])) {
	
	$Name = $_POST['sf-Name'];
	$Email = $_POST['sf-Email'];
	$Mobile = $_POST['sf-Mobile'];
	$ReqType = $_POST['sf-ReqType'];
	$Message = $_POST['sf-Msg'];
	$Status = 'Pending';

	$checkSeqId = "SELECT * FROM `support_form` ORDER BY SeqId DESC LIMIT 1";
	$checkSeqIdResult = mysqli_query($conn,$checkSeqId);
	$rowCount = mysqli_num_rows($checkSeqIdResult);

	if($rowCount > 0) {
		if($row = mysqli_fetch_assoc($checkSeqIdResult)) {
			$uId = $row['SupFormId'];
			$get_numbers = str_replace("SF", "", $uId);
			$id_increase = $get_numbers + 1;
			$get_string = str_pad($id_increase, 4, 0, STR_PAD_LEFT);	
			$SupFormId = "SF".$get_string;
			
			//data insert to learner
			$sql1 = "INSERT INTO support_form(Name,Email,Mobile,ReqType,Message,Status,SupFormId) VALUES('$Name','$Email','$Mobile','$ReqType','$Message','$Status','$SupFormId')";

			if ($conn->query($sql1)) {
				echo '<script>alert("Support form submited successfully");</script>';
			}
			
			else {
				echo "Error : ".$conn->error;
			}
		}
	}
		
	else {
		$SupFormId = 'SF0001';
		
		//data insert to learner
		$sql2 = "INSERT INTO support_form(Name,Email,Mobile,ReqType,Message,Status,SupFormId) VALUES('$Name','$Email','$Mobile','$ReqType','$Message','$Status','$SupFormId')";
		
		if ($conn->query($sql2)) {
				echo '<script>alert("Support form submited successfully");</script>';
		}
			
		else {
			echo "Error : ".$conn->error;
		}
	}
}

$conn->close();

?>