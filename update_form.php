<?php 
 echo $_GET['id'];
 require_once("dbcon.php");
$sql = "SELECT * FROM mvinfo WHERE mvid = '{$_GET['id']}'";
$result = $conn->query($sql);
if($result->num_rows > 0 ) {
    $row = $result->fetch_assoc();
}
?>
<h3>FixMovieInfo <small> <a href = "."><br>Back</a></h3>
<form action="update.php" method="post">
    <label for="mvid">MovieID</label>
    <?php echo $row['mvid'];?>
    <input type = "hidden" name = "mvid" id = "mvid" value ="<?php echo $row['mvid'];?>">
    <br><br>
    <label for="mvid">MovieName</label>
    <input type ="text" name = "mvname" id ="mvname"value ="<?php echo $row['mvname'];?>">
    <br><br>
    <label for="mvid">DD/MM/YYYY</label>
    <input type ="date" name = "mvdate" id ="mvdate"value ="<?php echo $row['mvdate'];?>">
    <br><br>
    <label for="mvid">Time</label>
    <input type ="time" name = "mvtime" id ="mvtime"value ="<?php echo $row['mvtime'];?>">
    <br><br>
    <button type="submit">confirm</button>
    <button type="reset">clear</button>
</form>