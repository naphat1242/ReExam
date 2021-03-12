<!DOCTYPE html>
<html lang="en">
<head>

    <title>MovieSystem</title>
</head>
<body>
<?php
    require_once("dbcon.php");
    session_start();
    if(isset($_POST['login'])) {
        $sql = "SELECT * FROM users WHERE user = '{$_POST['user']}' AND pass = '{$_POST['pass']}'";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION["user"] = $row['user'];
        } else {
            echo "<p>WrongPin</p>";
        }
    }
    if(isset($_POST['logout'])) {
        session_unset();
    }
    if(isset($_SESSION['user'])) {
        require_once("tables.php");
    } else {
        require_once("login.php");
    }
?>
</body>
</html>