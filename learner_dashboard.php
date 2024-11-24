<?php
	include 'learner_connect.php';
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <!-- webpage data -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/website_icon.ico">
    <title>TT - Learner Dashboard</title>

    <!-- google font & icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" text="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- external page link -->
    <link rel="stylesheet" type="text/css" href="style\mainStyle.css">
    <script src="js\mainscript.js"></script>
</head>

<body>
    <?php include('header-in.php'); ?>  <!-- website header -->
	
	<center>
    <div>
        <h2>Learner Dashboard</h2>
    </div>
	</center>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Course ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Course</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql="SELECT * FROM purchase";
                    $result=mysqli_query($con,$sql);
                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            $id = $row['id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $mobile = $row['mobile'];
                            $course = $row['course'];

                            echo'<tr>
                                    <th scope="row">'.$id.'</th>
                                    <td>'.$name.'</td>
                                    <td>'.$email.'</td>
                                    <td>'.$mobile.'</td>
                                    <td>'.$course.'</td>

                                    <td>
                                        <button class="btn btn-danger"><a href="learner_delete.php?
                                        deleteid='.$id.'" class="text-light">Delete</a></button>
                                    </td>>
                                </tr>';
                        }
                    }
                ?>            
            </tbody>
        </table>
    </div>

    <?php include('footer-in.php'); ?> <!-- Include the footer file here -->
</body>

</html>
