<?php 
    session_start();
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"lmss");
    $name = "";
    $usn = "";
    $branch = "";
    $sem = "";
    $phone = "";
    $email = "";
    $query = "select * from student where usn = '$_SESSION[usn]'";
    $query_run = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($query_run)){
        $name = $row['name'];
        $usn = $row['usn'];
        $branch = $row['branch'];
        $sem = $row['sem'];
        $phone = $row['phone'];
        $email = $row['email'];

    }
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
            padding-top: 20px;
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
			<form id="main_content">
				<div class="form-group">
					<label>Name:</label>
					<input type="text" class="form-control" value="<?php echo $name;?>" disabled>
				</div>
				<div class="form-group">
					<label>USN:</label>
					<input type="text" class="form-control" value="<?php echo $usn;?>" disabled>
				</div>
				<div class="form-group">
					<label>Branch:</label>
					<input type="text" class="form-control" value="<?php echo $branch;?>" disabled>
				</div>
				<div class="form-group">
					<label>Semester:</label>
					<input type="text" class="form-control" value="<?php echo $sem;?>" disabled>
				</div>
                <div class="form-group">
					<label>Phone Number:</label>
					<input type="text" class="form-control" value="<?php echo $phone;?>" disabled>
				</div>
                <div class="form-group">
					<label>Email:</label>
					<input type="text" class="form-control" value="<?php echo $email;?>" disabled>
				</div>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>
</html>