<?php
    require('connectDB.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username1'])) {
        $username = stripslashes($_REQUEST['username1']);
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['check']);
        $password = mysqli_real_escape_string($conn, $password);
        $password = hash('sha256', $password);

        $stmt = $conn -> prepare('SELECT username FROM login_table WHERE username = ? LIMIT 1');
        $stmt -> bind_param('s', $username);
        $stmt -> execute();
        $stmt -> bind_result($username);
        $stmt -> store_result();

        if($stmt->num_rows == 1){
            echo "<div class='form'>
                  <h3>This user already exists.</h3><br/>
                  </div>";
        } else {
            $secure = $conn -> prepare('INSERT INTO login_table (username, password) VALUES (?, ?) LIMIT 1');
            $secure -> bind_param('ss', $username, $password);
            $secure -> execute();
            echo "<div class='form'>
                  <h3>User Created.</h3><br/>
                  </div>";
        }
    }
?>