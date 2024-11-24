	<?php
    $servername="localhost";
    $username="root";
    $password="";
    $database="onlineteachertrainer";

    $connection = mysqli_connect($servername,$username,$password,$database);
?>

<!DOCTYPE HTML>
<html lang="en">
 
<head>
	<!-- webpage data -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/website_icon.ico">
	<title>TT - Admin Dashboard</title> 
	
	<!-- google font & icons -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" text="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	
	<!-- external page link -->
	<link rel="stylesheet" type="text/css" href="style\mainStyle.css">
    <link rel="stylesheet" type="text/css" href="style\adminDashStyle.css">
	<link rel="stylesheet" type="text/css" href="style\editAdmin.css">
	<script src="js\mainscript.js"></script>	
</head>
 
<body>
	<?php include('header-in.php'); ?>	<!-- website header -->	
	
	<h2 class="adminDash-title">Admin Dashboard</h2>
	<hr class="adminDash-divid">
	
	<div class="top-button">
	<a href="lecturer_register.php"><button>Add New Lecturer</button></a>
	<a href="supagent_register.php"><button>Add New Support Agent</button></a>
	<a href="admin_register.php"><button>Add New Admin</button></a>	
	</div>

	<h3 class="adminDash-subtitle">List of Lecturers</h3>
    <br>
    
    <table class="admin-table" border="1">
        
            <tr class="admin-header" style="height:30px";>
                <th style="width:6%;">Number</th>
                <th style="width:8%;">Lecture Id</th>
                <th style="width:14%;">First Name</th>
                <th style="width:14%;">Last Name</th>
                <th style="width:8%;">mobile</th>
                <th style="width:14%;">Email</th>
                <th style="width:10%;">password</th>
                <th style="width:10%;">Action</th>
            </tr>


    <?php
    $i=1;
    $sql="SELECT* FROM lecturer";
    $result=$connection->query($sql);
    if($result->num_rows>0)
    {

    
    
    while($row=$result->fetch_assoc()){

        $id=$row['LecturerId'];
?>
        <tr style="height:30px";>
            <td style="text-align:center;"><?php echo $i++; ?></td>
            <td style="text-align:center;"><?php echo $row['LecturerId'] ?></td>
            <td style="text-align:center;"><?php echo $row['FirstName'] ?></td>
            <td style="text-align:center;"><?php echo $row['LastName'] ?></td>
            <td style="text-align:center;"><?php echo $row['Mobile'] ?></td>
            <td style="text-align:center;"><?php echo $row['Email'] ?></td>
            <td style="text-align:center;"><?php echo $row['Password'] ?></td>
            
            <td class="admin-buttons">
                <div class="admin-button">
               <a href="admin_edit.php?id=<?php echo $id ?>"><button id="ad-update"> Update</button> </a>
               <a href="admin_delete.php?id=<?php echo $id ?>" onClick="return confirm('Are you sure?')"><button id="ad-delete"> Delete </button></a>
            </div>
            </td>
    
        </tr>
    <?php
         }
        }
    ?>

</table>



    <br><br><br>
	<h3 class="adminDash-subtitle">List of Learners</h3>
    <br>
    <table class="admin-table" border="1">
     
                <tr class="admin-header" style="height:30px";>
                <th style="width:6%;">Number</th>
                <th style="width:8%;">Student Id</th>
                <th style="width:14%;">First Name</th>
                <th style="width:14%;">Last Name</th>
                <th style="width:10%;">mobile</th>
                <th style="width:14%;">Email</th>
                <th style="width:10%;">password</th>
                <th style="width:10%;">Action</th>
                </tr>


    <?php
    $i=1;
    $sql="SELECT* FROM learner";
    $result=$connection->query($sql);
    if($result->num_rows>0)
    {

    
    
    while($row=$result->fetch_assoc()){

        $id=$row['StudentId'];
?>
        <tr style="height:30px";>
            <td style="text-align:center;"><?php echo $i++; ?></td>
            <td style="text-align:center;"><?php echo $row['StudentId'] ?></td>
            <td style="text-align:center;"><?php echo $row['FirstName'] ?></td>
            <td style="text-align:center;"><?php echo $row['LastName'] ?></td>
            <td style="text-align:center;"><?php echo $row['Mobile'] ?></td>
            <td style="text-align:center;"><?php echo $row['Email'] ?></td>
            <td style="text-align:center;"><?php echo $row['Password'] ?></td>
            
            <td class="admin-buttons">
                <div class="admin-button">
               <a href="editAdmin-lern.php?id=<?php echo $id ?>"><button id="ad-update"> Update</button> </a>
               <a href="delete-Admin-lern.php?id=<?php echo $id ?>" onClick="return confirm('Are you sure?')"><button id="ad-delete"> Delete </button></a>
                </div>
            </td>
    
        </tr>
    <?php
         }
        }
    ?>

</table>


<br><br><br>
<h3 class="adminDash-subtitle">List of Support Agents</h3>
<br>
<table class="admin-table" border="1">

        <tr class="admin-header" style="height:30px";>
            <th style="width:6%;">Number</th>
            <th style="width:8%;">SupAgentId</th>
            <th style="width:14%;">First Name</th>
            <th style="width:14%;">Last Name</th>
            <th style="width:8%;">mobile</th>
            <th style="width:14%;">Email</th>
            <th style="width:10%;">password</th>
            <th style="width:10%;">Action</th>
        </tr>


<?php
$i=1;
$sql="SELECT* FROM support_agent";
$result=$connection->query($sql);
if($result->num_rows>0)
{



while($row=$result->fetch_assoc()){

    $id=$row['SupAgentId'];
?>
    <tr style="height:30px";>
        <td style="text-align:center;"><?php echo $i++; ?></td>
        <td style="text-align:center;"><?php echo $row['SupAgentId'] ?></td>
        <td style="text-align:center;"><?php echo $row['FirstName'] ?></td>
        <td style="text-align:center;"><?php echo $row['LastName'] ?></td>
        <td style="text-align:center;"><?php echo $row['Mobile'] ?></td>
        <td style="text-align:center;"><?php echo $row['Email'] ?></td>
        <td style="text-align:center;"><?php echo $row['Password'] ?></td>
        
        <td class="admin-buttons">
                <div class="admin-button">
               <a href="editAdmin-sup.php?id=<?php echo $id ?>"><button id="ad-update"> Update</button> </a>
               <a href="delete-Admin-supp.php?id=<?php echo $id ?>" onClick="return confirm('Are you sure?')"><button id="ad-delete"> Delete </button></a>
                </div>
            </td>
    </tr>
<?php
     }
    }
?>

</table>

<br><br><br>

<?php include('footer-in.php'); ?>	

</body>
 
</html>
