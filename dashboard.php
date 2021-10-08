<?php 
require('phpScripts/auth_session.php');
require('phpScripts/scripts.php');

?>
<html>
    <head>
        <title> DigiTech - Room Booking Tool </title>
    </head>
    <body>
            <ul class="toolbar">
                <li><img src="images/icon.png" style="width:40px;height:40px;margin-top:5px;margin-right:5px;"></li>
                <li><a href="dashboard.php"class="active">Home</a></li>
                <li><a href="bookings.php">Book a Classroom</a></li>
                <a href="phpScripts/logout.php"class="usernameBox" style="float:right"><?php echo $_SESSION['username'] ?></a>
            </ul>
        <div class="one" style="text-align:center; padding:20px;">
            Future Bookings
            <table class="table">
                <thead>
                  <tr>
                    <th>Booking Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Room Location</th>
                    <th>Capacity</th>
                    <th>Computers</th>
                  </tr>
                </thead>
                <tbody id="table">

                </tbody>
            </table>
        </div>
        <div class="two" style="text-align:center; padding:20px;">
            Previous Bookings
            <table class="table">
                <thead>
                  <tr>
                    <th>Booking Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Room Location</th>
                    <th>Capacity</th>
                    <th>Computers</th>
                  </tr>
                </thead>
                <tbody id="Previous">

                </tbody>
            </table>
        </div> 
    </body>

<script>
    $(document).ready(function() {
	$.ajax({
		url: "phpScripts/FutureBookings.php",
		type: "POST",
		cache: false,
		success: function(dataResult){
			$('#table').html(dataResult);
		}
	});
});
    $(document).ready(function() {
	$.ajax({
		url: "phpScripts/PreviousBookings.php",
		type: "POST",
		cache: false,
		success: function(dataResult){
			$('#Previous').html(dataResult);
		}
	});
});
</script>
</html>