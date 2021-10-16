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
        <div class="five" style="text-align:center; padding:20px;">
        <div class="centre-four">
        Create Users
        <?php require('phpScripts\CreateUser.php'); ?>
        <form class="loginForm" method="post">
          <input style="margin: 10px;" type="text" class="loginForm" class="login-input" name="username1" placeholder="Username" required />
          <input style="margin: 10px;" type="password" id="psw1" class="loginForm" class="login-input" name="check" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
          <input style="margin: 10px;" type="password" id="confirmpsw1" class="loginForm" class="login-input" name="check" placeholder="Confirm Password" required/>
          <div id="message">
            <h3>Password must contain:</h3>
              <p id="letter1" class="invalid">A <b>lowercase</b> letter</p>
              <p id="uppercase1" class="invalid">An <b>uppercase</b> letter</p>
              <p id="number1" class="invalid">A <b>number</b></p>
              <p id="length1" class="invalid">Minimum <b>8 characters</b></p>
          </div>
          <input style="margin:10px;" type="submit" name="submit" onclick="return Validate1()" value="Reset Password" class="button">
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

var myPassword1 = document.getElementById('psw1');
var myPassword21 = document.getElementById('confirmpsw1');
var letter1 = document.getElementById("letter1");
var uppercase1 = document.getElementById("uppercase1");
var number1 = document.getElementById("number1");
var length1 = document.getElementById("length1");

function Validate1() {
    if (myPassword21.value != myPassword1.value) {
      alert("Passwords do not match");
      return false;
    }
      return true;

}

myPassword1.onkeyup = function() {
  var lowerCaseLetters1 = /[a-z]/g;
  if(myPassword1.value.match(lowerCaseLetters1)) {
    letter1.classList.remove("invalid");
    letter1.classList.add("valid");
  } else {
    letter1.classList.remove("valid");
    letter1.classList.add("invalid");
  }

  var upperCaseLetters1 = /[A-Z]/g;
  if(myPassword1.value.match(upperCaseLetters1)) {
    uppercase1.classList.remove("invalid");
    uppercase1.classList.add("valid");
  } else {
    uppercase1.classList.remove("valid");
    uppercase1.classList.add("invalid");
  }

  var numbers1 = /[0-9]/g;
  if(myPassword1.value.match(numbers1)) {
    number1.classList.remove("invalid");
    number1.classList.add("valid");
  } else {
    number1.classList.remove("valid");
    number1.classList.add("invalid");
  }

  if(myPassword1.value.length >= 8) {
    length1.classList.remove("invalid");
    length1.classList.add("valid");
  } else {
    length1.classList.remove("valid");
    length1.classList.add("invalid");
  }
}
</script>

</html>