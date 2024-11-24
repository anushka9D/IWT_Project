<?php
	$db = mysqli_connect('localhost','root','','onlineteachertrainer');
	
	if(!$db){
		die('error in db'.mysqli_error($db));
	}
	
	else 
	{
		$id = $_GET['id'];
		$status = 'Competed';
		
		$qry = "update support_form set Status='$status' where SeqId = $id";
		
		if(mysqli_query($db, $qry))
		{
			header('location: sup_agnt_dashboard.php');		
		}
		else
		{
			echo mysqli_error($db);
		}
	}
?>


