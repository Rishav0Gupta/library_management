<?php 
  session_start();
  $connection = mysqli_connect("localhost","root","");
  $db = mysqli_select_db($connection,"lmss");
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
	</nav>
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
	<div class="container-fluid">
		<ul class="nav navbar-nav navbar-center">
		
			<li class="nav-item">
				<a href="book_info.php" class="nav-link">Books</a>
			</li>
			<li class="nav-item">
				<a href="request.php" class="nav-link">Requested Books</a>
			</li>
			<li class="nav-item">
				<a href="issue_info.php" class="nav-link">Issued Books</a>
			</li>
			<li class="nav-item ">
                   <a href="fyp.php"class="nav-link ">For You</a>
            </li>
		</ul>
	</div>
</nav>
<div  style = "margin: 30px 50px 10px 50px"><h3>ISSUED BOOKS INFO<hr></h3>
<?php
        
        $res = mysqli_query($connection,"select issue_book.bookid,issue_book.issue_date,issue_book.return_date,books.book_name 
                                         from issue_book,books where issue_book.bookid=books.bookid and issue_book.usn='$_SESSION[usn]'");
        
        if(mysqli_num_rows($res)==0)
		{
			echo "No Books Issued";
		}

        else
        {
        echo "<table class='table table-bordered'>";
        echo "<tr style='background-color: #a07ef954'>";
        echo "<th>"; echo "Book ID"; echo "</th>";
        echo "<th>"; echo "Book Name"; echo "</th>";
        echo "<th>"; echo "Issue Date"; echo "</th>";
        echo "<th>"; echo "Return Date"; echo "</th>";
        echo "</tr>";
    
        while($row = mysqli_fetch_assoc($res)){
            echo "<tr>";
            echo "<td>"; echo $row["bookid"]; echo "</td>";
            echo "<td>"; echo $row["book_name"]; echo "</td>";
            echo "<td>"; echo $row["issue_date"]; echo "</td>";
            echo "<td>"; echo $row["return_date"]; echo "</td>";
            echo "</tr>";
    
        }
        echo "</table>";
        }
?>

  </div>

</body>
</html>