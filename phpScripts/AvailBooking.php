<?php

require('connectDB.php');
require('auth_session.php');

function like_match($pattern, $subject)
{
    $pattern = str_replace('%', '.*', preg_quote($pattern, '/'));
    return (bool) preg_match("/^{$pattern}$/i", $subject);
}

if(isset($_POST['DATECONTROL'])) {
    $DATECONTROL= mysqli_real_escape_string($conn, $_POST['DATECONTROL']);
    $_SESSION['SelectedDate'] = $DATECONTROL;
    $dateToday = date('Y-m-d', strtotime($_SESSION['SelectedDate']));
} else{
    $dateToday = date('Y-m-d', strtotime('+1 day'));
}
class ClassStartTimes {

    public $bookingStart;
    public $IDforROOM;
    public $dateBooking;

    function set_booking($bookingStart){
        $this->bookingStart = $bookingStart;
    }
    function get_booking() {
        return $this->bookingStart;
    }
    function set_id($IDforROOM){
        $this->IDforROOM = $IDforROOM;
    }
    function get_id(){
        return $this->IDforROOM;
    }
    function set_date($dateBooking) {
        $this->dateBooking = $dateBooking;
    }
    function get_dateBooking(){
        return $this->dateBooking;
    }

}

$arrayOfBookings = new ArrayObject(array());

$statement = "SELECT room_table.RoomLocation, room_table.Capacity, room_table.Machines, room_table.RoomID
    FROM room_table";
$result = $conn->query($statement);

$CheckStatement = "SELECT room_table.RoomLocation, room_table.Capacity, room_table.Machines, booking_table.StartTime, booking_table.EndTime, booking_table.RoomID, booking_table.DateOfBooking
    FROM room_table INNER JOIN booking_table ON room_table.RoomID=booking_table.RoomID";
$checkResults = $conn->query($CheckStatement);

if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $room = $row['RoomLocation'];
        $capacity = $row['Capacity'];
        $computers = $row['Machines'];
        if ($computers == 1 ){
            $machines = "Yes";
        } else {
            $machines = "No";
        }
            while($row2 = $checkResults->fetch_assoc()){
                $Finding = new ClassStartTimes();
                $Finding->set_booking($row2['StartTime']);
                $Finding->set_id($row2['RoomID']);
                $Finding->set_date($row2['DateOfBooking']);
                $arrayOfBookings->append($Finding);
            }
                for($i = 9; $i <= 16; $i++){
                    $booked = "FALSE";
                    for($x = 0; $x < count($arrayOfBookings); $x++){
                        if((like_match('%'.strval($i).'%', $arrayOfBookings[$x]->get_booking()) == 1 && $row['RoomID'] == $arrayOfBookings[$x]->get_id() && $_SESSION['SelectedDate'] == $arrayOfBookings[$x]->get_dateBooking())){
                            $booked = "TRUE";
                            break;
                        } else {
                            $booked = "FALSE";
                        }
                    }
                    if($booked == "FALSE"){
                ?>

<tr>
    <td><img src="images/<?=$room?>.jpeg" style="width:50px;height:50px;"></td>
    <td><?=$room?></td>
    <td><?=$capacity?></td>
    <td><?=$machines?></td>
    <td><?=$i?> - <?=$i+1?></td>
    <td><button type='submit' class='Book' name='Book' id='<?=$row['RoomID']?>_<?=$_SESSION['userID']?>_<?=$i?>_<?=$_SESSION['SelectedDate']?>'>Book</button></td>
</tr>

                        <?php
                            }
                        }
                    }
                    }
    else {
    echo "0 Results";
}
mysqli_close($conn);
?>
<script>
$(function(){
  $(document).on('click','.Book',function(){
    var join_id = this.id;
    var split_join_id = join_id.split("_");
    var room_join_id = split_join_id[0];
    var user_id_join_id = split_join_id[1];
    var time_booking = split_join_id[2];
    var DATEofBOOKING = split_join_id[3];
      $.ajax({
          type:'POST',
          url:'phpScripts/book.php',
          data:{'room_join_id':room_join_id, 'user_id_join_id':user_id_join_id, 'time_booking':time_booking, 'DATEofBOOKING':DATEofBOOKING},
          success: function(data){
              alert ("Request Successfully Approved");
              location.reload();
          }
      });
  });
});
</script>