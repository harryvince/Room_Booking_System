<?php
    require('connectDB.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['check']);
        $password = mysqli_real_escape_string($conn, $password);
        $password = hash('sha256', $password);

        $stmt = $conn -> prepare('SELECT * FROM login_table WHERE username = ? LIMIT 1');
        $stmt -> bind_param('s', $username);
        $stmt -> execute();
        $stmt -> bind_result($userid, $username, $usless, $usertype);
        $stmt -> store_result();

        if($stmt->num_rows == 1){
            if($stmt->fetch()){
                $secure = $conn -> prepare('UPDATE `login_table` SET `password`= ? WHERE userId = ? LIMIT 1');
                $secure -> bind_param('si', $password, $userid);
                $secure -> execute();
                echo "<div class='form'>
                      <h3>Details Successfully updated.</h3><br/>
                      </div>";
            } else {
                echo "<div class='form'>
                      <h3>Details Entered do not exsist.</h3><br/>
                      </div>";
            }
        }
    }
?>