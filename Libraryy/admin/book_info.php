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
    <div class="row">
<div class="col-md-4"></div>
<div class="col-md-4"></div>
<div class="col-md-4"style="margin-top:30px" >
    <form action="" class="navbar-form " method="post" name="form1">
        <div>
            <input   type="text" name="search" placeholder="Search any Book">
            <input type="submit" name="submit" value="Go" class=" btn-default btn-primary">           
        </div>
    </form>
</div>
    </div>
<div  style = "margin: 20px 20px 10px 50px"><h3>BOOK DETAILS <hr></h3>
<?php

    if(isset($_POST["submit"]))
    {
        
    $res = mysqli_query($connection,"select * from books where book_name like('$_POST[search]%')");
	echo "<table class='table table-bordered'>";
	echo "<tr style='background-color: #a07ef954'>";
	echo "<th>"; echo "Book Image"; echo "</th>";
	echo "<th>"; echo "Book Name"; echo "</th>";
	echo "<th>"; echo "Book ID"; echo "</th>";
	echo "<th>"; echo "Author"; echo "</th>";
	echo "<th>"; echo "Publication"; echo "</th>";
	echo "<th>"; echo "Year of Publication"; echo "</th>";
	echo "<th>"; echo "Category"; echo "</th>";
	echo "<th>"; echo "Copies Available"; echo "</th>";
	echo "</tr>";

	while($row = mysqli_fetch_assoc($res)){
		echo "<tr>";
    	echo "<td>"; ?> <img src="../<?php echo $row["books_image"];?>" alt="Book Image"  height="150" width="120"> <?php  echo "</td>";
		echo "<td>"; echo $row["book_name"]; echo "</td>";
		echo "<td>"; echo $row["bookid"]; echo "</td>";
		echo "<td>"; echo $row["author_name"]; echo "</td>";
		echo "<td>"; echo $row["pub_name"]; echo "</td>";
		echo "<td>"; echo $row["pub_year"]; echo "</td>";
		echo "<td>"; echo $row["c_name"]; echo "</td>";
		echo "<td>"; echo $row["copies"]; echo "</td>";
		
		echo "</tr>";

	}
	echo "</table>";
    }

    else
    {

    

    $res = mysqli_query($connection,"select * from books");
	echo "<table class='table table-bordered'>";
	echo "<tr style='background-color: #a07ef954'>";
	echo "<th>"; echo "Book Image"; echo "</th>";
	echo "<th>"; echo "Book Name"; echo "</th>";
	echo "<th>"; echo "Book ID"; echo "</th>";
	echo "<th>"; echo "Author"; echo "</th>";
	echo "<th>"; echo "Publication"; echo "</th>";
	echo "<th>"; echo "Year of Publication"; echo "</th>";
	echo "<th>"; echo "Category"; echo "</th>";
	echo "<th>"; echo "Copies Available"; echo "</th>";
	echo "</tr>";

	while($row = mysqli_fetch_assoc($res)){
		echo "<tr>";
    	echo "<td>"; ?> <img src="../<?php echo $row["books_image"];?>" alt="Book Image"  height="150" width="120"> <?php  echo "</td>";
		echo "<td>"; echo $row["book_name"]; echo "</td>";
		echo "<td>"; echo $row["bookid"]; echo "</td>";
		echo "<td>"; echo $row["author_name"]; echo "</td>";
		echo "<td>"; echo $row["pub_name"]; echo "</td>";
		echo "<td>"; echo $row["pub_year"]; echo "</td>";
		echo "<td>"; echo $row["c_name"]; echo "</td>";
		echo "<td>"; echo $row["copies"]; echo "</td>";
		echo "</tr>";

	}
	echo "</table>";
}
?>
</div>
</body>
</html>