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
    <?php
        $conn = new mysqli("localhost:3306", "root","","e_health_app");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $name = $_REQUEST["name"];
        $email = $_REQUEST["email"];
        $number = $_REQUEST["number"];
        $stmt = $conn->prepare("INSERT INTO users (name, email, phone_number) VALUES (?, ?, ?)");
        $stmt->bind_param("sss",$name, $email, $number);
        $stmt->execute();

    ?>

    <div class="container p-5">
        <div class="card">
            <div class="card-header">Appointment Scheduled for :</div>
            <div class="card-body">     
                <div class="row">       
                    <div class="col-md-6">
                    <?php
                        echo $_REQUEST["name"];
                    ?>
                    </div>
                    <div class="col-md-4">
                    <?php 
                        echo $_REQUEST["email"];
                    ?>
                    </div>  
                </div>
            </div>

            <hr>
            <a href="/EHealth/admin" class="p-3">
                <button type="submit" class="btn btn-primary">Go to Admin Panel</button>
            </a>
            <hr>

            <hr>
            <a href="/EHealth/index" class="p-3">
                <button type="submit" class="btn btn-primary">Go to Home</button>
            </a>
            <hr>
        </div>
    </div>
            <?php

            $conn->close();

            ?>
</body>
</html>
