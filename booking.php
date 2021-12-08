<?php

if (isset($_POST["submit"])) {
    $localhost = "localhost";
    $user = "root";
    $password = "";
    $database = "flysaveairline";

    $con = mysqli_connect($localhost, $user, $password, $database)
        or die(mysqli_connect_error());


    session_start();
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
    } else $username = ' ';

    $adults = $_POST['adults'];
    $from = $_POST['fromCity'];
    $to = $_POST['toCity'];
    $date = $_POST['date'];
    $class = $_POST['class'];
    


    $query06 = "SELECT `FlightNo` FROM `flight` WHERE FromCity ='" . $from . "' AND ToCity= '" . $to . "' AND Flight_date= '" . $date . "'";
    $Row = mysqli_fetch_array(mysqli_query($con, $query06));
    
    $flightNum =$Row['FlightNo'];
    $_SESSION["flight_ID"] = $flightNum;
    $_SESSION["class0"] = $class;
    

    $query07 = "INSERT INTO reservation(`Username`, `NmberOfAdults`) VALUES ('" .$username . "','" .$adults . "')";

   ;
    if ( mysqli_query($con, $query07)=== TRUE) {
        ?>
                <script type="text/javascript">
                    window.location.href = "travelerInfo.php";
                </script>
        <?php 
 } else echo " Something Went Roang ";

}
?>