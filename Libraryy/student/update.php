<?php
      session_start();
      $connection = mysqli_connect("localhost","root","");
      $db = mysqli_select_db($connection,"lmss");
      $query = "update student set name='$_POST[name]', usn='$_POST[usn]',branch='$_POST[branch]',sem='$_POST[sem]',phone='$_POST[phone]',email='$_POST[email]' where usn = '$_SESSION[usn]'";
      $query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
    alert("Profile Updated Successfully");
    window.location.href = "student_dashboard.php";
</script>