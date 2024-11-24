<?php
include_once 'learner_connect.php';

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $course = $_POST['course'];

    $sql = "INSERT INTO purchase (name, email, mobile, course)
    VALUES ('$name', '$email', '$mobile', '$course')";
    $result = mysqli_query($con,$sql);
    if($result){
        echo "Data insert successfully";
        header('location:learner_dashboard.php');
    }else{
        die(mysqli_error($con));
    }
}

?>

<!DOCTYPE HTML>
<html lang="en">
 
<head>
	<!-- webpage data -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/website_icon.ico">
	<title>Teacher Trainer - Courses</title> 
	
	<!-- google font & icons -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" text="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!-- Add jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<!-- Add Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<!-- Add Bootstrap JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<!-- external page link -->
	<link rel="stylesheet" type="text/css" href="style\courseStyle.css">
</head>
 
<body>
	<!-- website header -->
	<header>
		<img class="header-logo" src="images/website_logo.png" alt="Teacher_Trainer_Icon">
		<nav class="header-nav">
			<ul class="nav-links">
				<li><a href="home-in.php">Home</a></li>
				<li><a href="courses-in.php">Courses</a></li>
				<li><a href="support_form-in.php">Support</a></li>
				<li><a href="about-in.php">About</a></li>	
				<li><a href="faq-in.php">FAQ</a></li>				
			</ul>
		</nav>
		<div class="header-btns">
		<a href="cart-in.php"><button id="btnCart" class="header-btn">Cart</button></a>
		<a href="myAccount.php"><button id="btnMyAcc" class="header-btn">My Account</button></a>
		<a href="logout.php"><button id="btnLogOut" class="header-btn">Logout</button></a>
		</div>
	</header>	
	
	<div class="sample-conetnt">
		<h2>Course</h2>
	</div>
	
	<div class="album py-5 bg-light">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="card mb-4 box-shadow">
					<label>Information Technology</label>
						<img class="card-img-top" src="images/courses/infoTech.jpg" alt="Card image cap">
						<div class="card-body">
							<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
							<div class="d-flex justify-content-between align-items-center">
								<div class="btn-group">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
										Buy
									</button>
								</div>	
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card mb-4 box-shadow">
					<label>Software Engineering</label>
						<img class="card-img-top" src="images/courses/softEng.jpg" alt="Card image cap">
						<div class="card-body">
							<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
							<div class="d-flex justify-content-between align-items-center">
								<div class="btn-group">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
										Buy
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card mb-4 box-shadow">
					<label>Data Science</label>
						<img class="card-img-top" src="images/courses/dataSci.jpg" alt="Card image cap">
						<div class="card-body">
							<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
							<div class="d-flex justify-content-between align-items-center">
								<div class="btn-group">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
										Buy
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Modal -->
	<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Select Your Courses</h5>
					<div class="container my-5">
						<form method = "post">
							<div class="mb-3">
								<label>Name :</label>
								<input type="text" class="form-control" placeholder ="Enter your name" name ="name" autocomplete="off">
							</div>

							<div class="mb-3">
								<label>Email :</label>
								<input type="email" class="form-control" placeholder ="Enter your email" name ="email" autocomplete="off">
							</div>

							<div class="mb-3">
								<label>Mobile:</label>
								<input type="text" class="form-control" placeholder ="Enter your Mobile" name ="mobile" autocomplete="off">
							</div>

							<div class="mb-3">
								<label>Course Name:</label>
								<input type="text" class="form-control" placeholder ="Course" name ="course" autocomplete="off">
							</div>
						
							<button type="submit" class="btn btn-primary" name="submit">Submit</button>
						</form>
   					</div>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<?php include('footer-in.php'); ?>	  <!-- website footer -->	
	
</body>
 
</html>