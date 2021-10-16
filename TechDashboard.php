<?php 
require('phpScripts/auth_session.php');
require('phpScripts/scripts.php');
if($_SESSION['userType'] != 2){
    header("Location: phpScripts/logout.php");
}
?>
<html>
    <head>
        <title> DigiTech - Room Booking Tool | SysADMIN</title>
    </head>
    <body>
            <ul class="toolbar">
                <li><img src="images/icon.png" style="width:40px;height:40px;margin-top:5px;margin-right:5px;"></li>
                <li><a href="dashboard.php"class="active">Home</a></li>
                <a href="phpScripts/logout.php"class="usernameBox" style="float:right"><?php echo $_SESSION['username'] ?></a>
            </ul>
        <div class="four" style="text-align:center; padding:20px;">
        <div class="centre-four">
        Reset Passwords
        <?php require('phpScripts\resetPassword.php'); ?>
        <form class="loginForm" method="post">
          <input style="margin: 10px;" type="text" class="loginForm" class="login-input" name="username" placeholder="Username" required />
          <input style="margin: 10px;" type="password" id="psw" class="loginForm" class="login-input" name="check" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
          <input style="margin: 10px;" type="password" id="confirmpsw" class="loginForm" class="login-input" name="check" placeholder="Confirm Password" required/>
          <div id="message">
            <h3>Password must contain:</h3>
              <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
              <p id="uppercase" class="invalid">An <b>uppercase</b> letter</p>
              <p id="number" class="invalid">A <b>number</b></p>
              <p id="length" class="invalid">Minimum <b>8 characters</b></p>
          </div>
          <input style="margin:10px;" type="submit" name="submit" onclick="return Validate()" value="Reset Password" class="button">
        </form>
        </div>
        </div>
    </body>

<script type="text/javascript">
var myPassword = document.getElementById('psw');
var myPassword2 = document.getElementById('confirmpsw');
var letter = document.getElementById("letter");
var uppercase = document.getElementById("uppercase");
var number = document.getElementById("number");
var length = document.getElementById("length");

function Validate() {
    if (myPassword2.value != myPassword.value) {
      alert("Passwords do not match");
      return false;
    }
      return true;

}

myPassword.onkeyup = function() {
  var lowerCaseLetters = /[a-z]/g;
  if(myPassword.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }

  var upperCaseLetters = /[A-Z]/g;
  if(myPassword.value.match(upperCaseLetters)) {
    uppercase.classList.remove("invalid");
    uppercase.classList.add("valid");
  } else {
    uppercase.classList.remove("valid");
    uppercase.classList.add("invalid");
  }

  var numbers = /[0-9]/g;
  if(myPassword.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  if(myPassword.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>

</html>