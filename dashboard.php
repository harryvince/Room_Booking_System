<?php 
require('phpScripts\auth_session.php');
require('phpScripts\scripts.php')
?>
<html>
    <head>
        <title> DigiTech - Room Booking Tool </title>
    </head>

    <body>
            <ul class="toolbar">
                <li><img src="images/icon.png" style="width:40px;height:40px;margin-top:5px;margin-right:5px;"></li>
                <li><a href="dashboard.php"class="active">Home</a></li>
                <li><a href="#news">Book a Classroom</a></li>
                <a href="phpScripts/logout.php"class="usernameBox" style="float:right"><?php echo $_SESSION['username'] ?></a>
            </ul>
        <div class="one">One</div>
  <div class="two">Two</div> 
    </body>
<html>