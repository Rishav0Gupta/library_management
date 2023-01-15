<?php
 $connection = mysqli_connect("localhost","root","");
 $db = mysqli_select_db($connection,"lmss");
 $query = "insert into student values ('','$_POST[name]','$_POST[usn]','$_POST[branch]','$_POST[sem]','$_POST[phone]','$_POST[email]','$_POST[password]','Active')";
 $query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
    alert("Registration Successful");
    window.location.href = "index.php";
</script>