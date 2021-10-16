<?php 
require('phpScripts/auth_session.php');
require('phpScripts/scripts.php');
if($_SESSION['userType'] != 0){
    header("Location: phpScripts/logout.php");
}
?>
<html>
    <head>
        <title> DigiTech - Room Booking Tool </title>
    </head>
    <body>
            <ul class="toolbar">
                <li><img src="images/icon.png" style="width:40px;height:40px;margin-top:5px;margin-right:5px;"></li>
                <li><a href="dashboard.php">Home</a></li>
                <li><a href="bookings.php"class="active">Book a Classroom</a></li>
                <a href="phpScripts/logout.php"class="usernameBox" style="float:right"><?php echo $_SESSION['username'] ?></a>
            </ul>
        <div class="three" style="text-align:center; padding:20px;">
            Avaliable Classrooms: <input type="date" Value="<?= $_SESSION['SelectedDate']?>" Style="text-align:center" id="datepicker">
            <table class="table">
                <thead>
                  <tr>
                    <th>Layout</th>
                    <th>Room Location</th>
                    <th>Capacity</th>
                    <th>Computers</th>
                    <th>Time</th>
                    <th>Book</th>
                  </tr>
                </thead>
                <tbody id="table">

                </tbody>
            </table>
        </div>
    </body>

<script>
    $(document).ready(function() {
	$.ajax({
		url: "phpScripts/AvailBooking.php",
		type: "POST",
		cache: false,
		success: function(dataResult){
			$('#table').html(dataResult);
		}
	});
});
$("#datepicker").on("change",function(){
        var selected = $(this).val();
        $.ajax({
		    url: "phpScripts/AvailBooking.php",
		    type: "POST",
		    data:{'DATECONTROL':selected},
		    success: function(dataResult){
		    	alert ("Date Changed!");
                location.reload();
		    }
	    });
    });
</script>
</html>