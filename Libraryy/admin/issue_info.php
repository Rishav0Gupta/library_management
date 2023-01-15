<?php 
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"lmss");
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
<div  style = "margin: 30px 50px 10px 50px"><h3>ISSUED BOOKS INFO<hr></h3>
<?php
        
        $res = mysqli_query($connection,"select * from issue_book");
        
        if(mysqli_num_rows($res)==0)
		{
			echo "No Books Issued";
		}
        else
        {
        echo "<table class='table table-bordered'>";
        echo "<tr style='background-color: #a07ef954'>";  
        echo "<th>"; echo "Student USN"; echo "</th>";
        echo "<th>"; echo "Book ID"; echo "</th>";
        echo "<th>"; echo "Issue Date"; echo "</th>";
        echo "<th>"; echo "Return Date"; echo "</th>";
		echo "<th>"; echo "Fine"; echo "</th>";
        echo "</tr>";
    
        while($row = mysqli_fetch_assoc($res)){
            echo "<tr>";
            echo "<td>"; echo $row["usn"]; echo "</td>";
            echo "<td>"; echo $row["bookid"]; echo "</td>";   
            echo "<td>"; echo $row["issue_date"]; echo "</td>";
            echo "<td>"; echo $row["return_date"]; echo "</td>";
			?>
			<td><?php 
				$a=0;
				$d=$row['issue_date'];
				$e=$row['return_date'];
				if($e == '0000-00-00'){
					echo "not returned yet";
					continue;
				}
				
				$b=new DateTime("$d");
				$c=new DateTime("$e");
				$intvl = $b->diff($c);
				$days= $intvl->days;
				if($days > 15){
					$count=$days -15;
					for($i=0; $i<$count; $i++){
						$a+=5;
					}
					echo "₹".$a."<br>";
				} 
				else{
					echo "₹".$a."<br>";
				}
				?></td>
			
			<?php
            echo "</tr>";
    
        }
        echo "</table>";
        }
?>

  </div>




</body>
</html>