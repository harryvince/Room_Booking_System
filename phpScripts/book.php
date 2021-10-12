<?php
require('connectDB.php');

$room_id= mysqli_real_escape_string($conn, $_POST['room_join_id']);
$user_id= mysqli_real_escape_string($conn, $_POST['user_id_join_id']);
$bookingTime= mysqli_real_escape_string($conn, $_POST['time_booking']);
$DATEofBOOKING= mysqli_real_escape_string($conn, $_POST['DATEofBOOKING']);

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

$booking = date("H:i:s", strtotime($bookingTime));
$bookingEnd = date("H:i:s", strtotime($endOfBooking));

mysqli_query($conn, "INSERT INTO booking_table (userId, RoomID, DateOfBooking, StartTime, EndTime) 
VALUES ($user_id, $room_id, '" . $DATEofBOOKING . "', '" . $booking . "', '" . $bookingEnd . "')");
?>