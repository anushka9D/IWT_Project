<?php
	include 'learner_connect.php';

	if(isset($_GET['deleteid'])){
		$id = $_GET['deleteid'];

		$sql = "DELETE FROM purchase WHERE id = $id";
		$result=mysqli_query($con,$sql);
		if($result){

			header('location:learner_dashboard.php');
		}
		else
		{
			die(mysqli_error($con));

		}
	}
?>