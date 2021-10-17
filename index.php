<html>

<?php
session_start();
if(isset($_SESSION['username'])!="")
{
    header("Location: dashboard.php");
}
?>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/logincss.css">
  <title>Login | DigiTech</title>
  <link rel="icon" href="images/favicon.ico"/>
  <script src="https://use.typekit.net/rjb4unc.js"></script>
  <script>try{Typekit.load({ async: true });}catch(e){}</script>
</head>

<div class="loginbackground">
<body>
    <div class="container">
    <div class="logo"><img src="images/icon.png" style="width:40px;height:40px;margin-top:5px;margin-right:5px;" /></div>
    <?php require('phpScripts/loginScript.php'); ?>
    <div class="login-item">
      <form method="post" class="form form-login">
        <div class="form-field">
          <label class="user" for="login-username"><span class="hidden">Username</span></label>
          <input id="login-username" type="text" class="form-input" name="username" placeholder="Username" required>
        </div>

        <div class="form-field">
          <label class="lock" for="login-password"><span class="hidden">Password</span></label>
          <input id="login-password" type="password" name="password" class="form-input" placeholder="Password" required>
        </div>

        <div class="form-field">
          <input type="submit" value="Log in">
        </div>
      </form>
    </div>
    </div>

</body>
</div>

</html>