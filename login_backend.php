<?php 
 session_start();

$sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "onlineteachertrainer";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}

if(isset($_POST['uname']) && isset($_POST['password'])) {
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: login.php?error=Email is required");
	    exit();

	}else if(empty($pass)){
        header("Location: login.php?error=Password is required");
	    exit();
	}
	
	else
	{
		$sql = "SELECT * FROM login WHERE Email='$uname' AND Password='$pass'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_assoc($result);
			
            if ($row['Email'] == $uname && $row['Password'] == $pass) {
				
				// session id save
				$sql2 = "SELECT UserId FROM login WHERE Email='$uname'";
				$result2 = mysqli_query($conn, $sql2);
				$row = mysqli_fetch_assoc($result2);
				
				$_SESSION['UserId'] = $row['UserId'];
				
				
				$sql5 = "SELECT Type FROM login WHERE Email='$uname'";
				$result5 = mysqli_query($conn, $sql5);
				$row = mysqli_fetch_assoc($result5);
				
				$_SESSION["Type"] = $row['Type'];
				
				// session user type search and direct
				
				echo "User is: ".$_SESSION["UserId"];  
		        
				$sql3 = "SELECT Type FROM login WHERE Email='$uname'";
				$result3 = mysqli_query($conn, $sql3);
				$row = mysqli_fetch_assoc($result3);
				
				if($row['Type'] == "LRN") {
				header("Location: learner_dashboard.php");
					}
								
				else if($row['Type'] == "LEC") {
					header("Location: lecturer_dashboard.php");
				}
				
				else if($row['Type'] == "SA") {
					header("Location: sup_agnt_dashboard.php");
				} 
				
				else if($row['Type'] == "ADM") {
					header("Location: admin_dashboard.php");
				} 	
								
				else {
					echo"include web page. Invalid type";
				}
			}
			
			else{
				header("Location: login.php?error=Incorect User name or password");
		        exit();
			}
		}
		else{
			header("Location: login.php?error=Incorect email or password");
	        exit();
		}		
	}	
}

else {
	header("Location: home.php");
	exit();
}