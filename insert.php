<?php
    echo $_POST['mvid'].'<br>';
    echo $_POST['mvname'].'<br>';
    echo $_POST['mvdate'].'<br>';
    echo $_POST['mvtime'].'<br>';
require_once("dbcon.php");
$sql = "INSERT INTO mvinfo (mvid, mvname,mvdate,mvtime)
VALUES ('{$_POST['mvid']}','{$_POST['mvname']}', '{$_POST['mvdate']}','{$_POST['mvtime']}}')";
if ($conn->query($sql) === TRUE) {
  echo "New record successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>