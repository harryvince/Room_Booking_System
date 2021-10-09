<?php
require('connectDB.php');

$room_id= mysqli_real_escape_string($conn, $_POST['room_join_id']);
$user_id= mysqli_real_escape_string($conn, $_POST['user_id_join_id']);
$bookingTime= mysqli_real_escape_string($conn, $_POST['time_booking']);
// mysqli_query($conn, "UPDATE bookings SET approved = '1' WHERE booking_id = '$booking_id'");
// mysqli_query($conn, "UPDATE items SET booked = '1' WHERE item_id = '$item_id'");

if($bookingTime == '9'){
    $bookingTime = '09';
}

$addedEnd = ':00';
$addedEnd = (string)$addedEnd;

$bookingTime = (string)$bookingTime;
$end = intval($bookingTime) + 1;
$end = (string)$end;
$bookingTime = $bookingTime.$addedEnd;
$endOfBooking = $end.$addedEnd;

$date = date('Y-m-d', strtotime('+1 day'));
$booking = date("h:i:s", strtotime($bookingTime));
$bookingEnd = date("h:i:s", strtotime($endOfBooking));

mysqli_query($conn, "INSERT INTO booking_table (userId, RoomID, DateOfBooking, StartTime, EndTime) 
VALUES ($user_id, $room_id, '" . $date . "', '" . $booking . "', '" . $bookingEnd . "')");
?>