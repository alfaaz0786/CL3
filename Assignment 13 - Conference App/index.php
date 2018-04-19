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

    <div class="contianer-fluid p-5">
        <div class="card">
            <div class="card-header">Registration Form for Internation Conference</div>
            <div class="card-body">
                <form action="payment.php" method="POST">
                    <div class="form-group">
                        <label for="name">Enter Your Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Enter Your Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="designation">Enter Your Designation</label>
                        <input type="text" name="designation" id="designation" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <select class="form-control" id="country" name="country">
                            <option>India</option>
                            <option>USA</option>
                            <option>UK</option>
                            <option>Rest of the World</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hotel">Hotel</label>
                        <select class="form-control" id="hotel" name="hotel">
                            <option>Bronze</option>
                            <option>Gold</option>
                            <option>Platinum</option>
                            <option>Deluxe</option>
                        </select>                
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>           
            </div>
        </div>


        <hr>

           <?php
        $conn = new mysqli("localhost:3306", "root","","conference");

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
            <div class="card-header">All Registations:</div>
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
                            echo "Country: ". $row["country"]."</div>";
                            
                        ?>

                    <?php echo "</div><hr>";
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