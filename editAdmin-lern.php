<?php


$connection = mysqli_connect('localhost','root','','onlineteachertrainer');

        if(!$connection){
           die ('error in connection'.mysqli_error ($connection));
           
        }

if(isset($_POST['update'])){
    $id = $_POST['studentId'];
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password']; 
    

    $sql = "UPDATE learner SET FirstName='$firstName', LastName='$lastName', Mobile='$mobile', Email='$email', Password='$password' WHERE StudentId='$id'";

    if ($connection->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $connection->error;
    }
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM learner WHERE StudentId='$id'";
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

        <tr class="admin-lear-edit-header" style="height:30px";>    
            <th style="width:6%;">StudentId</th>
            <th style="width:8%;">First Name</th>
            <th style="width:10%;">Last Name</th>
            <th style="width:10%;">mobile</th>
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
        <th ><input class="admin-lear-edit-btn" type="submit" name="update" value="Update"><br></th>

        </tr>

    </form>
</table>

<?php  
if (isset($_POST['update'])) {
    header('location: admin_dashboard.php');
    exit();
}
?>