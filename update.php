<h1>Update successfully </h1>
<?php
   require_once("dbcon.php");
   $sql = "UPDATE mvinfo SET
            mvname = '{$_POST['mvname']}',
            mvdate = '{$_POST['mvdate']}',
            mvtime = '{$_POST['mvtime']}'
            WHERE mvid = '{$_POST['mvid']}' ";
   if ($conn->query($sql) === TRUE) {
     echo "New record successfully";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   $conn->close();
?>