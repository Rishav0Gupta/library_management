<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
  	<style type="text/css">
  		#lms{
  			background-color: #ce2029;
  		}
        #main_content{
            padding-top: 60px;
			
        }
  	</style>
</head>
<body>
<nav id="lms" class="navbar navbar-expand-lg navbar-dark ">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="student_dashboard.php"><b>Student Dashboard</b></a>
			</div>
			<font style="color: white"><span><em>Name: <?php echo $_SESSION['name'];?></em></span></font>
			<font style="color: white"><span><em>USN:<?php echo $_SESSION['usn'];?></em></span></font>
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
			<form action="update_password.php" method="post" id="main_content">
				<div class="form-group">
					<label>Enter Current Password:</label>
					<input type="password" name="old_password" class="form-control">
				</div>
				<div class="form-group">
					<label>Enter New Password:</label>
					<input type="password" name="new_password" class="form-control">
				</div>
				<button type="submit" name="update" class="btn btn-primary">Update Password</button>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>
</html>