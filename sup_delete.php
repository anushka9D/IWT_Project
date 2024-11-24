	<?php
		$db = mysqli_connect('localhost','root','','onlineteachertrainer');
		
		if(!$db){
			die('error in db'.mysqli_error($db));
		}
		
		$id = $_GET['id'];
		
		$qry = "delete from support_form where SeqId = $id";
		
		if(mysqli_query($db, $qry)){
			header('location: sup_agnt_dashboard.php');
		}
		
		else {
			echo mysqli_error($db);
		}

	?>
