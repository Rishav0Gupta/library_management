<?php
      $connection = mysqli_connect("localhost","root","");
      $db = mysqli_select_db($connection,"lmss");
      $issue_id = $_GET["id"];
      
      $query = "update issue_book set return_date=CURRENT_DATE where id = $issue_id";
      $query_run = mysqli_query($connection,$query);


      $res = mysqli_query($connection,"select issue_book.*,student.usn,student.name,student.email,books.bookid,books.book_name from issue_book,student,books 
                                   where  issue_book.id = $issue_id and issue_book.usn=student.usn and issue_book.bookid=books.bookid");
      $row = mysqli_fetch_assoc($res);

      $a=0;
      $d=$row['issue_date'];
      $e=$row['return_date'];
      $f= $row['book_name'];
      $g=$row['name'];


         $b=new DateTime("$d");
        $c=new DateTime("$e");
            $intvl = $b->diff($c);
        $days= $intvl->days;
         if($days > 15){
          $count=$days -15;
        for($i=0; $i<$count; $i++){
          $a+=5;
        }
           $to_email = $row['email'];
          $subject = "Delay in Returning Book";
          $body = "Hello!  $g\nThe $f book that was issued by you on $d has been returned today.\nDue to the delay in returning this book, a fine of Rs$a must be paid.";
           $headers = "From: libraryyforyou@gmail.com";
           mail($to_email, $subject, $body, $headers);
          
}
      mysqli_query($connection,"delete from request_book where id = $issue_id ");


?>


      <script type="text/javascript">
            alert("Book Returned!");
            window.location.href = "request.php";
      </script>
