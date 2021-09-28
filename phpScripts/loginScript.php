<?php
require('connectDB.php');
error_reporting(E_ERROR | E_PARSE);
session_start();
if(isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $password = hash('sha256', $password);

  $stmt = $conn -> prepare('SELECT * FROM login_table WHERE username = ? and password = ?');
  $stmt -> bind_param('ii', $username, $password);
  $stmt -> execute();
  $result = $stmt -> get_result();

  $row = mysqli_fetch_array($result);
  if ($row['username'] == $username && $row['password'] == $password) {
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    header("Location: dashboard.php");
  }
   else {
    echo "<br>";
    echo "<br>";
    echo "<p class='fonts' style='text-align: center; color: red;'>Incorrect Username or Password!</p>";
  }
}
?>