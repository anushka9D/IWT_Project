<!DOCTYPE HTML>
<html lang="en">
 
<head>
	<!-- webpage data -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/website_icon.ico">
	<title>Teacher Trainer - Login</title> 
	
	<!-- google font & icons -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" text="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	
	<!-- external page link -->
	<link rel="stylesheet" type="text/css" href="style\mainStyle.css">
	<link rel="stylesheet" type="text/css" href="style\loginStyle.css">
</head>
 
<body>
	<?php include('header-out.php'); ?>  <!-- website header -->

	<div class="login-box">
		<form action="login_backend.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Email :</label>
     	<input type="text" name="uname"><br>

     	<label>Password :</label>
     	<input type="password" name="password"><br>

     	<input type="submit" name="submit" value="Login">
     </form>
	</div>
	
	<?php include('footer-out.php'); ?>	
</body>
 
</html>