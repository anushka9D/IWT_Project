<?php 
	$db = mysqli_connect('localhost','root','','onlineteachertrainer');
?>

<!DOCTYPE html>
<html lang="en">
 
<head>
	<!-- webpage data -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/website_icon.ico">
	<title>TT - Lecture Dashboard</title> 
	
	<!-- google font & icons -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" text="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	
	<!-- external page link --> 
	<link rel="stylesheet" type="text/css" href="style\mainStyle.css">
	<link rel="stylesheet" type="text/css" href="style\lecDashStyle.css">
	<script src="js\mainscript.js"></script>	
</head>
 
<body>
	<?php include('header-in.php'); ?>	<!-- website header -->	
	
	<div class="lecDash-content">
		<h2>Lecture Dashboard</h2>
	</div>
    

    <a href="lecturer_dashboard_create.php"><button class="add-button" id="btnadduser">Add Course</button></a>

    <table class = "lecDash_table"border=1>
        <tr>
            <th>CourseId</th>
            <th>Course Name</th>
            <th>Skill Category</th>
            <th>Operations</th>
</tr>
    <tr>
    <?php
			$qry = "SELECT * FROM course";
			$run = $db -> query($qry);
			if($run -> num_rows > 0)
			{
				while($row = $run -> fetch_assoc())
				{
					$id = $row['SeqId'];
		?>	
			<tr>
				<td><?php echo $row['CourseId'] ?></td>
				<td><?php echo $row['CourseName'] ?></td>
				<td><?php echo $row['Skill_Category'] ?></td>				
				<td class="saDash-Operations">
					<div class="saDash-buttons">
					<a href="lec_update.php?id=<?php echo $id ?>"><button id="saDash-changeStatus"> Update </button> </a>
					<a href="delete-Lec-Course.php?id=<?php echo $id ?>" onClick="return confirm('Are you sure?')"><button id="saDash-delete"> Delete </button> </a>
					</div>
				</td>
			</tr>
            
		<?php
				}	
			}
		?>
	</tr>
    </table>

	<?php include('footer-in.php'); ?>		
</body>
 
</html>