<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php

$localhost = "localhost";
$user = "root";
$password = "";
$database = "flysaveairline";


$con = mysqli_connect($localhost, $user, $password, $database)
  or die(mysqli_connect_error());

session_start();
if (isset($_SESSION["username"])) {
  $username = $_SESSION["username"];
} else $username = '';



?>

<head>

  <link rel="icon" type="image/x-icon" href="logo01.png">
  <link rel="stylesheet" type="text/css" href="FlySave.Css?version=21">
  <link rel="stylesheet" href="fly.css?version=26">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">

  <title>Fly Safe</title>

  <style media="screen">
    body {
      background-image: url(backgraund003.jpg);
      background-size: cover;
      background-repeat: repeat;
      background-position: right top;
      background-attachment: fixed;
      font-family: Arial, Helvetica, sans-serif !important;
    }

    h5 {
      color: white;
    }

    h3 {
      text-align: center;
    }

    #mar:hover {
      color: #b22222;
    }

    .button2 {
      font-size: 14px;
    }

    .bold2 {
      font-weight: bold;
      font-size: 19px;
    }
  </style>

</head>

<body>
  <ul>
    <li> <img src="Logo02.png" alt="home" height="70px" width="100px"></li>
    <li><a class="active" onclick="refresh()">Home</a></li>
    <li><a href="LogIn.php">Log in</a></li>
    <li> <a href="ViewYourBooking.php">View your booking</a></li>
    <li><a href="AboutUs.html">Abuot us</a></li>

  </ul>
  <marquee>
    <h4 id="mar">" <a style="color: white; font-size: 30px; font-weight: bold;"><?php echo $username ?></a> Life is
      short and the world is wide, TRAVEL!"</h4>
  </marquee>
<br><br>
  <div class="bookimg-form-box">
    <h1 class="bold">Flights</h1>
    <form class="" action="booking.php" method="POST">
      <br>
      <div class="bookimg-form">
        <lable class="bold2">Flying From </lable>
        <select class="custom-select" name="fromCity" style="width: 30%;">
          <option value="Riyadh">Riyadh</option>
          <option value="Qassim">Qassim</option>
          <option value="Jeddah">Jeddha</option>
          <option value="Dubai">Dubai</option>
        </select>
        <lable class="bold2">Going To </lable>
        <select class="custom-select" name="toCity" style="width: 30%;">
          <option value="Dubai">Dubai</option>
          <option value="Riyadh">Riyadh</option>
          <option value="Jeddah">Jeddah</option>
          <option value="Qassim">Qassim</option>
        </select>
        <br><br>
        <div class="input-grp">
          <lable class="bold2">Date </lable>
          <input type="date" name="date" class="form-control select-date">
        </div>


        <div class="input-grp">
          <lable class="bold2">Adults </lable>
          <input type="number" class="form-control" name="adults" value="1">
        </div>

        <div class="input-grp">
          <lable class="bold2">Travel Class </lable>
          <select class="custom-select" name="class">
            <option value="Economy">Economy Class</option>
            <option value="Business">Business Class</option>
          </select>
        </div>
        <br><br>
        <input type="submit" name="submit" value="Book now" class="button button2 bold2">
        <br><br>
      </div>
    </form>
  </div>

  <br>
  <hr width="100%" class="dotted">

  <h3 id="mar" class="bold">Trending Destinations, </h3>
  <h3 id="mar" class="bold">Chosen by our happy customers.</h3><br>

  <div class="T">
    <div class="dc">
      <div class="desc">
        <h5>Travel to Paris ? </h5>
      </div>
      <a target="_blank" href="paris.html">
        <img src="paris2.jpg" alt="paris" width="600" height="400">
      </a>
    </div>

    <div class="dc">
      <div class="desc">
        <h5>Travel to Cairo ? </h5>
      </div>
      <a target="_blank" href="Aboutcairo.html">
        <img src="cairo1.jpg" alt="Cairo" width="600" height="400">
      </a>
    </div>

    <div class="dc">
      <div class="desc">
        <h5>Travel to Dubai ? </h5>
      </div>
      <a target="_blank" href="AboutDubai.html">
        <img src="Dubai2.jpg" alt="Dubai" width="600" height="400">
      </a>
    </div>

    <div class="dc">
      <div class="desc">
        <h5>Travel to Riyadh ? </h5>
      </div>
      <a target="_blank" href="Riyadh.html">
        <img src="riyadh2.jpg" alt="Riyadh" width="600" height="400">
      </a>
    </div>

  </div>

</body>

</html>