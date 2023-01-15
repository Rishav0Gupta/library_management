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

    <center> <div  style = "margin: 20px 10px 10px 50px" ><h3>New Book Details</h3><br>
        <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data" >
           <table class="table table-bordered ">
               <tr>
                    <td>
                        <input type="text"  class="form-control" placeholder="Book Name" name="book_name" required>
                    </td>
               </tr>
               <tr>
                    <td>
                        <input type="text"  class="form-control" placeholder="Book ID" name="bookid" required>
                    </td>
               </tr>
               <tr>
                    <td>
                        &nbsp;  Book Image 
                        <input type="file"  name="f1"  required>
                    </td>
               </tr>
               <tr>
                    <td>
                        <input type="text"  class="form-control" placeholder="Author Name" name="author_name" required>
                    </td>
               </tr>
               <tr>
                    <td>
                        <input type="text"  class="form-control" placeholder="Publication" name="pub_name" required>
                    </td>
               </tr>
               <tr>
                    <td>
                        <input type="text"  class="form-control" placeholder="Year of Publication" name="pub_year" required>
                    </td>
               </tr>
               <tr>
                    <td>
                        <select name="category">
                            <option value="" disabled selected >Select Category</option>
                            <option value="ISE">ISE</option>
                            <option value="CSE">CSE</option>
                            <option value="ECE">ECE</option>
                            <option value="EEE">EEE</option>
                            <option value="Civil">Civil</option>
                            <option value="Mechanical">Mechanical</option>
                            <option value="Fiction">Fiction</option>
                        </select>
                    </td>
               </tr>    
               <tr>
                    <td>
                        <input type="text"  class="form-control" placeholder="Available Copies" name="copies" required>
                    </td>
               </tr>
               <tr>
                    <td>
                        <input type="submit" name="submit1" class="btn btn-default submit" value= "insert book details" style = "background-color: blue; color:white "required>
                    </td>
               </tr>
            </table>
        </form>
    </div></center>

    <?php
      if(isset($_POST["submit1"]))
      {   
          $tm=md5(time());
          $fnm=$_FILES["f1"]["name"];
          $dst="../books_image/".$tm.$fnm;
          $dst1="books_image/".$tm.$fnm;
          move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);
          mysqli_query($connection,"insert into books values('','$_POST[bookid]','$_POST[book_name]','$_POST[author_name]','$_POST[pub_name]','$_POST[pub_year]','$_POST[copies]','$dst1','$_POST[category]')");
          mysqli_query($connection,"insert into category values('','$_POST[category]','$_POST[bookid]','$_POST[book_name]')");
          ?>
          <script type="text/javascript">
              alert("Books inserted successfully!");

          </script>
          <?php
      }
    ?>

</body>

</html>