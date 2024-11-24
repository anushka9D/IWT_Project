<?php 
	$conn = mysqli_connect('localhost','root','','onlineteachertrainer');

    if(isset($_POST['submit'])){
        $Cid = $_POST['Cid'];
        $Cname = $_POST['Cname'];
        $SKC = $_POST['SKC'];

        $sql = "Insert into course (CourseId, CourseName, Skill_Category) values ('$Cid', '$Cname', '$SKC')";

		if ($conn->query($sql)) {
			echo '<script> alert("You have successfully created course...");</script>';
			header("Location: lecturer_dashboard.php");
		}
			
	else {
		echo "Error login : ".$conn->error;
	}
}
?>

<!DOCTYPE html>
<html lang="en">
 
<head>
	<!-- webpage data -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/website_icon.ico">
	<title>TT - Create Course</title> 
	
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
	
	<center>
	<div class="lecDash-content">
		<h2>Create New Course</h2>
	</div>
	</center>

    <form method="POST">
	<table class="lrnReg-table" border=1>
		<tr>
			<td class="lrnReg-table-label">
				<p>Course ID :</p>
			</td>    
			<td class="lrnReg-table-input">
				<input type="text" name="Cid" required>	
			</td>
        </tr>    

        <tr>
			<td class="lrnReg-table-label">
				<p>Course Name :</p>
			</td>
			<td class="lrnReg-table-input">
				<input type="text" name="Cname" required>
			</td>
        </tr>
        
        <tr>
			<td class="lrnReg-table-label">
				<p>Skill Category :</p>
			</td>
			<td class="lrnReg-table-input">
                <select name="SKC" required>
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
            <td>
            </td>
            <td class="lrnReg-table-input">
				<input type="submit" id="btnCourseCreate" name="submit" value="Create">	
			</td>
        </tr>	
	</table>
	</form>
	<?php include('footer-in.php'); ?>
	
</body> 
</html>