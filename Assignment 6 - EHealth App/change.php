<?php
        $conn = new mysqli("localhost:3306", "root","","e_health_app");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 


        $name = $_REQUEST['name'];
        $time = $_REQUEST['time'];
        echo $name ." ". $time;
        $query1 = "UPDATE users SET users.status ='confirmed', users.appointment_date ='".$time."' WHERE users.name ='".$name."'";

        $conn->query($query1);

        echo '<script type="text/javascript">
                window.location = "/EHealth"
           </script>';
?>
