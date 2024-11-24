<?php

$connection = mysqli_connect('localhost','root','','onlineteachertrainer');

        if(!$connection){
           die ('error in connection'.mysqli_error ($connection));
           
        }


if(isset($_POST['update'])){
    $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE lecturer SET FirstName='$firstName', LastName='$lastName', Mobile='$mobile', Email='$email', Password='$password' WHERE LecturerId='$id'";
    

    if ($connection->query($sql) === TRUE) {
        echo "Record updated successfully";

        if (isset($_POST['update'])) {
            header('location: admin_dashboard.php');
            exit();
        }
    } else {
        echo "Error updating record: " . $connection->error;
    }
}


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM lecturer WHERE LecturerId='$id'";
    $result = $connection->query($sql);

    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        $firstName = $row['FirstName'];
        $lastName = $row['LastName'];
        $mobile = $row['Mobile'];
        $email = $row['Email'];
        $password = $row['Password'];
    }
}
?>

<link rel="stylesheet" type="text/css" href="style\editAdmin.css">
<br><br>

<table class="admin-edit-table" border="2">

<form method="post" action="">

        <tr class="admin-lec-edit-header" style="height:30px";>    
            <th style="width:6%;">LecturerId</th>
            <th style="width:8%;">First Name</th>
            <th style="width:14%;">Last Name</th>
            <th style="width:14%;">mobile</th>
            <th style="width:14%;">Email</th>
            <th style="width:10%;">password</th>
            <th style="width:10%;">Action</th>
        </tr>

        <tr style="height:40px";>
        <th><input type="hidden" name="id" value="<?php echo $id; ?>"></th>
        <th><input type="text" name="firstName" value="<?php echo $firstName; ?>" required></th>
        <th><input type="text" name="lastName" value="<?php echo $lastName; ?>" required></th>
        <th><input type="text" name="mobile" value="<?php echo $mobile; ?>" required></th>
        <th><input type="email" name="email" value="<?php echo $email; ?>"required></th>
        <th><input type="password" name="password" value="<?php echo $password; ?>" required></th>
        <th ><input class="admin-lec-edit-btn" type="submit" name="update" value="Update"><br></th>
        </tr>      
           
    </form>
</table>

<?php  
if (isset($_POST['update'])) {
    header('location: admin_dashboard.php');
    exit();
}
?>

