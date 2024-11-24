<!DOCTYPE HTML>
<html lang="en">
 
<head>
	<!-- webpage data -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/website_icon.ico">
	<title>TT - Cart</title> 
	
	<!-- google font & icons -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" text="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>

	
	<!-- external page link -->
	<link rel="stylesheet" type="text/css" href="style\cartStyles.css">
	<script src="js\mainscript.js"></script>

</head>
 
<body>
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

	<div class="sample-content">
        <h2>Cart Page</h2>
        <div class="shopping">
            <img src="images/shopping.svg">
            <span class="quantity">0</span>
        </div>
    </div>

    <div class="list">
        <!-- Your product items go here -->
    </div>

    <div class="card">
        <h1>Card</h1>
        <ul class="listCard">
            <!-- Shopping cart items go here -->
        </ul>
        <div class="checkOut">
            <div class="total">0</div>
            <div class="closeShopping">Close</div>
        </div>
    </div>

    <script src="js/app.js"></script>
	<link rel="stylesheet" type="text/css" href="style\cart.css">
	
	<?php include('footer-in.php'); ?>	  <!-- website footer -->	
</body> 
</html>