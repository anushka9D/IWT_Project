<!DOCTYPE HTML>
<html lang="en">
 
<head>
	<!-- webpage data -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/website_icon.ico">
	<title>Teacher Trainer - Home</title> 
	
	<!-- google font & icons -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" text="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	
	<!-- external page link -->
	<link rel="stylesheet" type="text/css" href="style\mainStyle.css">
</head>
 
<body>
	<?php include('header-in.php'); ?>  <!-- website header -->

	<div class="home-title">
		<h2>Online Teacher Trainer</h2>
		<h3>
			Online Teacher Trainer is a website that helps teachers and lecturers to learn new skills and develop their knowledge about their subjects. 
			This learning platform consists of many courses under several skill categories and learners can select any course depending on the skill 
			they want to learn or improve. Courses are created by well educated and reputed lecturers who 
			egistered on the website.
		</h3>
	</div>
	
	<hr class="h-introClassDivider">
	
	<table border=1 class="h-c-table">
		<tr class="h-c-row">
			<td class="h-c-data">
				<h4>Information Technology</h4> 
				<img src="images/courses/infoTech.jpg">
				<p> Information technology is a set of related fields that encompass computer systems, software, programming languages and data and information processing and</p>
				<a href="cart-in.php"><button>Buy Now</button></a>
				<a href="courses-in.php"><button>View Course</button></a>
			</td>
			
			<td class="h-c-data">
				<h4>Software Engineering</h4> 
				<img src="images/courses/softEng.jpg">
				<p>Software engineering is an engineering-based approach to software development. A software engineer is a person who applies the engineering</p>
				<a href="cart-in.php"><button>Buy Now</button></a>
				<a href="courses-in.php"><button>View Course</button></a>
			</td>
			
			<td class="h-c-data">
				<h4>Cyber Security</h4> 
				<img src="images/courses/cyber.jpg">
				<p>Computer security, cyber security, digital security or information technology security (IT security) is the protection of computer systems and networks from stion</p>
				<a href="cart-in.php"><button>Buy Now</button></a>
				<a href="courses-in.php"><button>View Course</button></a>
			</td>
			
			<td class="h-c-data">
				<h4>Data Science</h4> 
				<img src="images/courses/dataSci.jpg">
				<p>Data science is an inter disciplinary academic field that uses statistics, scientific computing, scientific methods, processes, algorithms and</p>
				<a href="cart-in.php"><button>Buy Now</button></a>
				<a href="courses-in.php"><button>View Course</button></a>
			</td>
			
			<td class="h-c-data">
				<h4>Network Engineering</h4> 
				<img src="images/courses/network.jpg">
				<p>Network engineers are responsible for designing, maintaining, implementing, and troubleshooting an organization's computer networks.</p>
				<a href="cart-in.php"><button>Buy Now</button></a>
				<a href="courses-in.php"><button>View Course</button></a>
		</tr>
	</table>

	<?php include('footer-in.php'); ?>	
</body>
 
</html>