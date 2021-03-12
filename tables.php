<?php
    require_once("dbcon.php");
    if(isset($_GET['delete'])){
        echo $_GET['id'];
        $sql = "DELETE FROM mvinfo WHERE mvid = '{$_GET['id']}'";
        if (mysqli_query($conn, $sql)) {
          echo " Record deleted successfully ";
        } else {
          echo "Error deleting record: " . mysqli_error($conn);
        }
      }
    $sql = "SELECT * FROM mvinfo";
    if(isset($_GET['search_click'])) {
      $sql = "SELECT * FROM mvinfo WHERE mvid LIKE '%{$_GET['search']}%' OR mvname LIKE '%{$_GET['search']}%' ";
      echo "<p>Search: {$_GET['search']}</p>";
    }
    $result = $conn->query($sql);
?>
<a href ="insert_form.php">InsertMovie</a>
<form action="" method="get">
  <label for="search">SearchBox</label>
  <input type ="text" name = "search" id = "search">
  <button type="submit" name = "search_click">Search</button>
</form>
<form action="." method="post">
    <button type="submit" name="logout">Logout</button>
</form>

<table style="width:100%;" border="1">
  <tr>
    <th>MovieID</th>
    <th>MovieName</th>
    <th>MovieDate</th>
    <th>MovieTime</th>
  </tr>
  <?php
  if($result->num_rows >= 0) {
        while($row = $result->fetch_assoc()) {
  ?>
  <tr>
    <td><?php echo $row['mvid'];?></td>
    <td><?php echo $row['mvname'];?></td>
    <td><?php echo $row['mvdate'];?></td>
    <td><?php echo $row['mvtime'];?></td>
    <td align = "center">
        <a href ="update_form.php?id=<?php echo $row['mvid']; ?>">Fix</a>
      <a href ="?delete=1&id=<?php echo $row['mvid']; ?>"><br>Del</a>
    </td>
  </tr>
  <?php 
  }
} else {
  echo "0 results";
  }
$conn->close();
?>
</table>
