<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Health Application</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <?php include('nav.php') ?>
    <div class="container p-5">
        <div class="card">
            <div class="card-header">Appointment</div>
            <div class="card-body">
                <form action="appointment.php" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email id</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="number">Phone Number</label>
                        <input type="number" name="number" id="number"  class="form-control">
                    </div>
                    <button type="submit" id="submit" class="btn btn btn-primary"  class="form-control">Submit</button>
                </form>
               
            </div>
        </div>
    <hr>

    <a href="/EHealth/admin">
        <button type="submit" class="btn btn-primary">Go to Admin Panel</button>
    </a>
    <hr>
    
    <?php
        $conn = new mysqli("localhost:3306", "root","","e_health_app");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $query1 = "SELECT * FROM users;";
        $result  =  $conn->query($query1);
        ?>

        <?php
        if ($result->num_rows > 0)
        {
        ?>
        <div class="card">
            <div class="card-header">All Appointments:</div>
            <div class="card-body">
                <?php
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                ?>
                <div class="row">
                    <div class="col-md-4">
                        <?php
                                echo "Name: " . $row["name"];
                        ?>
                    </div>
                    <div class="col-md-3">
                        <?php 
                            echo "Status: ". $row["status"]."</div>";
                            
                        ?>
                    <div class="col-md-4">
                        <?php
                            echo "Time: ". $row["appointment_date"] ;
                        ?>
                        </a>
                    <?php echo "</div><hr></div><hr>";
                            }
                        }
                    ?>

            </div>
        </div>

        <?php

                $conn->close();

        ?>

</div>
</body>
</html>