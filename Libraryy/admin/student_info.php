<?php 
  session_start();
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
			  height: 90px;  
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
				<a class="navbar-brand" href="admin_dashboard.php"><b style ="font-size: xx-large">Admin Dashboard</b></a>
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
	</nav>
	
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
	<div class="container-fluid">
		<ul class="nav navbar-nav navbar-center">
			<li class="nav-item">
				<a href="student_info.php" class="nav-link">Student Info</a>
			</li>
			<li class="nav-item">
				<a href="book_info.php" class="nav-link">Books</a>
			</li>
			<li class="nav-item ">
				<a href="add_book.php" class="nav-link">Add Book+</a>
			</li>
			<li class="nav-item">
				<a href="request.php" class="nav-link">Requests</a>
			</li>
			<li class="nav-item">
				<a href="issue_info.php" class="nav-link">Books Issued</a>
			</li>
			<li class="nav-item">
				<a href="author.php" class="nav-link">Authors</a>
			</li>
		</ul>
	</div>
</nav>

<div  style = "margin: 30px 50px 10px 50px"><h3>STUDENT DETAILS <hr></h3>
<?php
   $connection = mysqli_connect("localhost","root","");
   $db = mysqli_select_db($connection,"lmss");
   $query = "select * from student";
   $query_run = mysqli_query($connection,$query);
   echo "<table class='table table-bordered'>";
   echo "<tr style='background-color: #a07ef954'>";
   echo "<th>"; echo "USN"; echo "</th>";
   echo "<th>"; echo "NAME"; echo "</th>";
   echo "<th>"; echo "BRANCH"; echo "</th>";
   echo "<th>"; echo "SEM"; echo "</th>";
   echo "<th>"; echo "EMAIL"; echo "</th>";
   echo "<th>"; echo "PHONE"; echo "</th>";
   echo "<th>"; echo "STATUS"; echo "</th>";
   echo "<th>"; echo "CHANGE STATUS"; echo "</th>";
   echo "</tr>";
   while($row = mysqli_fetch_assoc($query_run))
   {
	echo "</tr>";
	echo "<td>"; echo $row["usn"]; echo "</td>";
	echo "<td>"; echo $row["name"]; echo "</td>";
	echo "<td>"; echo $row["branch"]; echo "</td>";
	echo "<td>"; echo $row["sem"]; echo "</td>";
	echo "<td>"; echo $row["email"]; echo "</td>";
	echo "<td>"; echo $row["phone"]; echo "</td>";
	echo "<td>"; echo $row["status"]; echo "</td>";
	echo "<td>"; ?> <table><tr><td style='background-color:#f33d3d7a' ><a href="block.php?id=<?php echo $row["id"];?>" style="color:black">Block</a></td>
	                  <td style='background-color:#1f7dffa8'><a href="unblock.php?id=<?php echo $row["id"];?>" style="color:black">Unblock</a></td></tr></table> <?php echo "</td>";
	echo "</tr>";
   }
   echo "</table>";
?>

</div>

</body>
</html>