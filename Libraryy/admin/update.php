<?php
      session_start();
      $connection = mysqli_connect("localhost","root","");
      $db = mysqli_select_db($connection,"lmss");
      $query = "update admin set adminid='$_POST[adminid]', name='$_POST[name]',email='$_POST[email]',phone='$_POST[phone]' where  adminid = '$_SESSION[adminid]'";
      $query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
    alert("Profile Updated Successfully");
    window.location.href = "admin_dashboard.php";
</script>