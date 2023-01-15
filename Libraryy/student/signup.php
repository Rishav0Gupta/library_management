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
  			background-color: #ce2029;
  		}
        #main_content{
			padding-left: 50px;
			flex: 0 0 35%;
        }
  	</style>
</head>
<body>
<nav id="lms" class="navbar navbar-expand-lg navbar-dark ">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Library Management System</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li  class="nav-item">
					<a class="nav-link" href="../admin/index.php" >Admin Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php">Student Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="signup.php">Sign-Up</a>
				</li>
			</ul>
		</div>
	</nav><br>
    
    <div class="row">
		<div class="col-md-4"></div>		
		<div class="col-md-4" id="main_content" >
			<center><h3 style="margin-bottom: 30px">SIGN-UP</h3></center>
			<form action="register.php" method="post">
				<div class="form-group">
					<input type="text" name="name" class="form-control" placeholder="Name" required>
				</div>
				<div class="form-group">
					<input type="text" name="usn" class="form-control" placeholder="USN" required>
				</div>
				<div class="form-group">
					<input type="text" name="branch" class="form-control" placeholder="Branch" required>
				</div>
				<div class="form-group">
					<input type="text" name="sem" class="form-control" placeholder="Semester" required>
				</div>
				<div class="form-group">
					<input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
				</div>
				<div class="form-group">
					<input type="email" name="email" class="form-control" placeholder="Email" required>
				</div>
				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="Password" required>
				</div>
				<button type="submit" name="login" class="btn btn-primary">Register</button>
			</form>
        </div>
        <div class="col-md-4"></div>
    </div>
</body>
</html>