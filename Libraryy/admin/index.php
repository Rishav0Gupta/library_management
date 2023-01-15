<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
  	<style type="text/css">
  		#lms{
  			background-color: #000080;
  		}
        #main_content{
            padding-top: 100px;
			padding-left: 50px;
			flex: 0 0 30%;
        }
  	</style>
</head>
<body>
<nav id="lms" class="navbar navbar-expand-lg navbar-dark ">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php"><b>Library Management System</b></a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li  class="nav-item">
					<a class="nav-link" href="index.php" ><b>Admin Login</b></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../student/index.php"><b>Student Login</b></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../student/signup.php"><b>Sign-Up</b></a>
				</li>
			</ul>
		</div>
	</nav><br>
    
    <div class="row">
		<div class="col-md-4"></div>		
		<div class="col-md-4" id="main_content" >
			<center><h3 style="margin-bottom: 30px">ADMIN LOGIN</h3></center>
			<form action="" method="post">
				<div class="form-group">
					<input type="text" name="adminid" class="form-control" placeholder="ID" required>
				</div>
				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="Password" required>
				</div>
				<button type="submit" name="login" class="btn btn-primary">Login</button>
			</form>

            <?php
                session_start();
              if(isset($_POST['login'])){
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection,"lmss");
                $query = "select * from admin where adminid = '$_POST[adminid]'";
                $query_run = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($query_run)){
                    if($row['adminid'] == $_POST['adminid']){
                        if($row['password'] == $_POST['password']){
                            $_SESSION['adminname'] = $row['name'];
                            $_SESSION['adminid'] = $row['adminid'];
                            $_SESSION['adminemail'] = $row['email'];
                            header("Location:admin_dashboard.php");
                        }
                        else{
                            ?>
                          <br><br><center><span class="alert-danger">Wrong ID/Password!!</span></center>
                          <?php
                        }
                    }
                }

              }
            ?>  
           
        </div>
        <div class="col-md-4"></div>
    </div>
</body>
</html>