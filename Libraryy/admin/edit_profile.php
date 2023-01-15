<?php 
    session_start();
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"lmss");
    $adminid = "";
    $name = "";
    $email = "";
    $phone = "";
    
    $query = "select * from admin where adminid = '$_SESSION[adminid]'";
    $query_run = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($query_run)){
        $adminid = $row['adminid'];       
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
  	<style type="text/css">
  		#lms{
  			background-color: #000080;
  		}
        #main_content{
            padding-top: 20px;
        }
  	</style>
</head>
<body>
<nav id="lms" class="navbar navbar-expand-lg navbar-dark ">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="Admin_dashboard.php"><b>Admin Dashboard</b></a>
			</div>
			<font style="color: white"><span><em>Name: <?php echo $_SESSION['adminname'];?></em></span></font>
			<font style="color: white"><span><em>Email:<?php echo $_SESSION['adminemail'];?></em></span></font>
            
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown"><b>My Profile</b></a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="view_profile.php">View Profile</a>
						<a class="dropdown-item" href="edit_profile.php"> Edit Profile</a>
						<a class="dropdown-item" href="change_password.php">Change Password</a>
					</div>
				</li>
				<li class="nav-item"><a class="nav-link" href="logout.php"><b>Logout</b></a></li>
			</ul>
		</div>
	</nav><br>
    <div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form action="update.php" method="post" id= "main_content">
                <div class="form-group">
					<label>ID:</label>
					<input type="text" class="form-control" value="<?php echo $adminid;?>" name="adminid">
				</div>
                <div class="form-group">
					<label>Name:</label>
					<input type="text" class="form-control" value="<?php echo $name;?>" name="name">
				</div>
                <div class="form-group">
					<label>Email:</label>
					<input type="text" class="form-control" value="<?php echo $email;?>" name="email">
				</div>
                <div class="form-group">
					<label>Phone Number:</label>
					<input type="text" class="form-control" value="<?php echo $phone;?>" name="phone">
				</div>
                
                <button type="submit" name="login" class="btn btn-primary">Update</button>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>
</html>