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

<?php
    include('nav.php')
?>
    <?php 

        $conferenceCost = 4000;
        $hotelCost = 4000;
        $cost = $conferenceCost;
        $hotel = $_REQUEST["hotel"];
        $country = $_REQUEST["country"];       
        $bronzeCost = 4000;
        $glodCost = 5000;
        $platinum = 6000;
        $deluxe = 8000;

        if($hotel=="Bronze")
            CurrencyConverter($bronzeCost,$country);
        elseif($hotel=="Gold")
            CurrencyConverter($glodCost,$country);
        elseif($hotel =="Platinum")
            CurrencyConverter($platinum,$country);
        else
            CurrencyConverter($deluxe,$country);


        function CurrencyConverter($hCost,$country)
        {
            if($country == "India"){
                $GLOBALS['cost'] = intval($GLOBALS['conferenceCost'])." INR";
                $GLOBALS['hotelCost'] = (int)$hCost . " INR";
            }
            elseif($country=="UK"){
                $GLOBALS['cost'] = intval($GLOBALS['conferenceCost']/85)." &pound;";
                $GLOBALS['hotelCost'] = intval($hCost/85) ." &pound;";
            }
            else{
                $GLOBALS['cost'] =intval( $GLOBALS['conferenceCost']/65) . " $";
                $GLOBALS['hotelCost'] =intval( $hCost/65) . " $";
            }
        }




    ?>


    <div class="container p-5">
        <div class="card">
            <div class="card-header">Payment Gateway</div>
            <div class="card-body">
                <div class="card p-5">
                    <div class="card-header">Conference Cost:-</div>
                    <div class="card-body"><?php echo $cost; ?></div>
                </div>
                <div class="card p-5">
                    <div class="card-header">Accomodation Cost:-</div>
                    <div class="card-body"><?php echo $hotelCost; ?></div>
                </div>                
            </div>    
            <div class="card-footer">
            <a href="<?php
                    $conn = new mysqli("localhost:3306", "root","","conference");
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $q = "INSERT INTO users(name,email,country) VALUES('".$_REQUEST["name"]."','".$_REQUEST["email"]."','".$country."')";
                    if( $conn->query($q) === true)
                    echo ('<script type="text/javascript">window.location = "/Conference"</script>');
                        
                    else {
                            echo "Error: " . $q . "<br>" . $conn->error;}
                    $conn->close();
                        
                    
                        ?>">
                <button type="submit" class="btn btn-primary">Finish</button>
            </a>
        
            </div>
        </div>
    </div>







</body>
</html>