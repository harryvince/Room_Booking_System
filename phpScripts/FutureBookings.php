<?php

require('connectDB.php');
require('auth_session.php');

$dateRN = date('y-m-d');
$dateRN = strtotime($dateRN);

$statement = "SELECT booking_table.UserId, room_table.RoomLocation, booking_table.DateOfBooking, room_table.Capacity, room_table.Machines, 
    booking_table.StartTime, booking_table.EndTime FROM booking_table
    INNER JOIN room_table ON booking_table.RoomID=room_table.RoomID";
$result = $conn->query($statement);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $userid = $row['UserId'];
        $capacity = $row['Capacity'];
        $computers = $row['Machines'];
        $Start = $row['StartTime'];
        $End = $row['EndTime'];
        $room = $row['RoomLocation'];
        $date = $row['DateOfBooking'];
        $OGDATE = $date;
        $date = strtotime($date);
        if ($computers == 1 ){
            $machines = "Yes";
        } else {
            $machines = "No";
        }
        if ($userid == $_SESSION['userID'] && $date > $dateRN){
?>

<tr>
    <td><?=$OGDATE?></td>
    <td><?=$Start?></td>
    <td><?=$End?></td>
    <td><?=$room?></td>
    <td><?=$capacity?></td>
    <td><?=$machines?></td>
</tr>

<?php
        }
    }
} else {
    echo "0 Results";
}
mysqli_close($conn);

?>