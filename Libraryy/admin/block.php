<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"lmss");
$id = $_GET["id"];
mysqli_query($connection, "update student set status='Block' where id = $id");
?>
<script type="text/javascript">
    window.location="student_info.php";

</script>