<?php 
	$conn = mysqli_connect('localhost','root','','onlineteachertrainer');


$Cid = "";
$Cname = "";
$SKC = "";


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Fetch the admin record using the provided ID
    $sql = "SELECT * FROM course WHERE SeqId = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result && $adminData = mysqli_fetch_assoc($result)) {
        // Populate the form fields with the retrieved values
        	$Cid = $adminData['CourseId'];
            $Cname = $adminData['CourseName'];
            $SKC = $adminData['Skill_Category'];
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
	<title>TT - Course Update</title> 
	
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
	<?php include('header-in.php'); ?>	<!-- website header -->	
	
	<center>
	<div class="lecDash-content">
		<h2>Course Detail Update</h2>
	</div>
	</center>
 


	<form method="POST">
    <table class="lrnReg-table" border=1>
        <tr>
            <td class="lrnReg-table-label">
                <p>Course ID :</p>
            </td>
            <td class="lrnReg-table-input">
                <input type="text" name="Cid" value="<?php echo $Cid; ?>" required>
            </td>
        </tr>

        <tr>
            <td class="lrnReg-table-label">
                <p>Course Name :</p>
            </td>
            <td class="lrnReg-table-input">
                <input type="text" name="Cname" value="<?php echo $Cname; ?>" required>
            </td>
        </tr>

        <tr>
            <td class="lrnReg-table-label">
                <p>Skill Category :</p>
            </td>
            <td class="lrnReg-table-input">
                <select name="SKC" required>
                    <option value="">Select your skill</option>
                    <option value="Programming" <?php if ($SKC == "Programming") echo "selected"; ?>>Programming</option>
                    <option value="Animation" <?php if ($SKC == "Animation") echo "selected"; ?>>Animation</option>
                    <option value="Marketing" <?php if ($SKC == "Marketing") echo "selected"; ?>>Marketing</option>
                    <option value="Accounting" <?php if ($SKC == "Accounting") echo "selected"; ?>>Accounting</option>
                    <option value="Music" <?php if ($SKC == "Music") echo "selected"; ?>>Music</option>
                    <option value="UI/UX Design" <?php if ($SKC == "UI/UX Design") echo "selected"; ?>>UI/UX Design</option>
                </select>
            </td>
        </tr>

        <tr>
            <td></td>
            <td class="lrnReg-table-input">
                <input type="submit" id="btnCourseCreate" name="submit" value="Update">
            </td>
        </tr>
    </table>
</form>

<?php include('footer-in.php'); ?>	

</body>
 
</html>

<?php

if(isset($_POST['submit'])){
    $Cid = $_POST['Cid'];
    $Cname = $_POST['Cname'];
    $SKC = $_POST['SKC'];

    $sql = "UPDATE course SET CourseId='$Cid', CourseName='$Cname', Skill_Category='$SKC' where SeqId = '$id'";


    $result = mysqli_query($conn, $sql);
    if($result){

        echo '<script type="text/javascript">
            window.onload = function () { alert("Account Updated !"); 
            window.location.href = "lecturer_dashboard.php";}
            </script>';
            return;
            exit();

    }
}

?>