<?php 
require('phpScripts/auth_session.php');
require('phpScripts/scripts.php');
if($_SESSION['userType'] != 1){
    header("Location: phpScripts/logout.php");
}
?>
<html>
    <head>
        <title> DigiTech - Room Booking Tool | Management</title>
    </head>
    <body>
        <ul class="toolbar">
            <li><img src="images/icon.png" style="width:40px;height:40px;margin-top:5px;margin-right:5px;"></li>
            <li><a href="dashboard.php"class="active">Home</a></li>
            <a href="phpScripts/logout.php"class="usernameBox" style="float:right"><?php echo $_SESSION['username'] ?></a>
        </ul>
        <div class="four">
            <div class="centre-four">
                Edit Room Layout
                <br>
                <br>
                <form action="phpScripts/uploadFile.php" method="post" enctype="multipart/form-data">
                  <select class="selector" name="selecting">
                      <?= require('phpScripts/AllRooms.php'); ?>
                  </select>
                  <br>
                  <br>
                  Select image to upload:
                  <input type="file" name="fileToUpload" id="fileToUpload">
                  <br>
                  <br>
                  <input type="submit" value="Upload" name="submit">
                </form>
            </div>
        </div>
        <div class="five">
            <div class="centre-four">
                Edit Room Details
                <br>
                <br>
                <form class="EditRoom" method="post" action="phpScripts/editRoom.php">
                    <select class="EditSelect" name="EditSelect">
                        <?= require('phpScripts/AllRooms.php'); ?>
                    </select>
                    <br>
                    <br>
                    <input style="text-align:center" type="number" name="Capacity" placeholder="Capacity" required />
                    <br>
                    <br>
                    <select class="machines" name="machines">
                        <option name='true' value='1'>Has Machines</option>
                        <option name='false' value='0'>No Machines</option>
                    </select>
                    <br>
                    <br>
                    <input type="submit" value="Edit" name="edit">
                </form>
            </div>
        </div>
    </body>
</html>