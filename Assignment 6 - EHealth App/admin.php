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
        $query1 = "SELECT * FROM users WHERE status ='not confirmed';";
        $result  =  $conn->query($query1);

    ?>

    <div class="container p-5">
        <div class="card">
            <div class="card-header">Fix Appintment for</div>
            <div class="card-body"> 
                <form action="change.php" method="post">
                    <div class="form-group">
                        <label for="name">Select Name</label>
                        <select class="form-control" name="name" id="name">
                            <?php
                                while($row = $result->fetch_assoc()) {
                            ?>
                                <option>
                                    <?php
                                        echo $row["name"];
                                        
                                    ?>
                                </option>
                            <?php } ?>
                        </select>                
                    </div>
                    <div class="form-group">
                        <input type="datetime-local" name="time" id="time" class="form-control w-25">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <?php
        $conn->close();
    ?>

</body>
</html>
