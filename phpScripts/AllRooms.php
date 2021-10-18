<?php
    require('connectDB.php');
    $stmt = $conn -> prepare('SELECT RoomLocation FROM room_table');
    $stmt -> execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()){
        echo "<option name='staff' value='".$row['RoomLocation']."'>".$row['RoomLocation']."</option>";
    }
?>