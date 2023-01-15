<?php
      session_start();
      $connection = mysqli_connect("localhost","root","");
      $db = mysqli_select_db($connection,"lmss");
      $issue_id = $_GET["id"];
      $res= mysqli_query($connection,"select bookid from request_book where id = $issue_id");
      $row = mysqli_fetch_assoc($res);
      $query = "update request_book set status='Approved', issue_date=CURRENT_DATE, due_date= (SELECT ADDDATE(CURRENT_DATE,15)) where id = $issue_id";
      $query_run = mysqli_query($connection,$query);
      mysqli_query($connection,"insert into issue_book values('','$_SESSION[usn]','$row[bookid]',CURRENT_DATE,'')" );
?>
<script type="text/javascript">
    alert("Book Request Approved!");
    window.location.href = "request.php";
</script>