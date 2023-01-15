<?php
      session_start();
      $connection = mysqli_connect("localhost","root","");
      $db = mysqli_select_db($connection,"lmss");
      $password = "";
      $query = "select * from student where usn = '$_SESSION[usn]'";
      $query_run = mysqli_query($connection,$query);
      while($row = mysqli_fetch_assoc($query_run)){
          $password = $row['password'];
      }
      if($password == $_POST['old_password']){
          $query = "update student set password = '$_POST[new_password]' where usn = '$_SESSION[usn]'";
          $query_run = mysqli_query($connection,$query);
        ?>
          <script type="text/javascript">
           alert("Password Updated Successfully");
           window.location.href = "student_dashboard.php";
          </script>
          <?php
      }
      else{
          ?>
         <script type="text/javascript">
           alert("Wrong Password!!");
           window.location.href = "change_password.php";
         </script>  
         <?php
      }
?>
