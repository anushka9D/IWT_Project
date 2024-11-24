<?php

    $connection = mysqli_connect('localhost','root','','onlineteachertrainer');

        if(!$connection){
           die ('error in connection'.mysqli_error ($connection));
           
        }

        $id=$_GET['id'];

        $sql = "delete from support_agent where SupAgentId = '$id'";

        if (mysqli_query($connection,$sql)){
            header('location: admin_dashboard.php');
        }

        else{

            echo mysqli_error($connection);
        }

        
?>