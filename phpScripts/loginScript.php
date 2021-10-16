<?php
require('connectDB.php');
error_reporting(E_ERROR | E_PARSE);
session_start();
if(isset($_POST['username']) && isset($_POST['password'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $userid;

  $password = hash('sha256', $password);

  $stmt = $conn -> prepare('SELECT * FROM login_table WHERE username = ? and password = ? LIMIT 1');
  $stmt -> bind_param('ss', $username, $password);
  $stmt -> execute();
  $stmt -> bind_result($userid, $username, $password, $usertype);
  $stmt -> store_result();
  if($stmt->num_rows == 1){
    if($stmt->fetch()){
      if($usertype == 0){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['userID'] = $userid;
        $_SESSION['userType'] = $usertype;
        $_SESSION['SelectedDate'] = date('Y-m-d', time());
        header("Location: dashboard.php");
      } elseif ($usertype == 1){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['userID'] = $userid;
        $_SESSION['userType'] = $usertype;
        $_SESSION['SelectedDate'] = date('Y-m-d', time());
        header("Location: ManagementDashboard.php");
      } elseif ($usertype == 2){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['userID'] = $userid;
        $_SESSION['userType'] = $usertype;
        $_SESSION['SelectedDate'] = date('Y-m-d', time());
        header("Location: TechDashboard.php");
      }
    }
  }
  else {
    echo "<br>";
    echo "<br>";
    echo "<p class='fonts' style='text-align: center; color: red;'>Incorrect Username or Password!</p>";
  }
  $stmt->close();
}
?>