<?php
require('connectDB.php');

if(isset($_POST["edit"])) {
    $capacity = stripslashes($_POST['Capacity']);
    $capacity = mysqli_real_escape_string($conn, $capacity);
    $roomNum = $_POST['EditSelect'];
    $machines = $_POST['machines'];

    $stmt = $conn -> prepare('SELECT RoomID FROM room_table WHERE RoomLocation = ? LIMIT 1');
    $stmt -> bind_param('s', $roomNum);
    $stmt -> execute();
    $stmt -> bind_result($roomid);
    $stmt -> store_result();
    $stmt -> fetch();

    if($stmt->num_rows == 1){
        $secure = $conn -> prepare('UPDATE room_table SET Capacity= ?, Machines= ? WHERE RoomID = ? LIMIT 1');
        $secure -> bind_param('iii', $capacity, $machines, $roomid);
        $secure -> execute();
        echo "<div class='form'>
              <h3>Details Successfully updated.</h3><br/>
              </div>";
        header('Location: ..\ManagementDashboard.php');
    } else {
        echo "<div class='form'>
              <h3>Details Entered do not exsist.</h3><br/>
              </div>";
    }
}

?>