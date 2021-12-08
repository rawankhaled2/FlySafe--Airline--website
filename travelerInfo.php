<!DOCTYPE html>
<html>

<head>
    <title>Traveler Information</title>
    <link rel="icon" type="image/x-icon" href="logo01.png">
    <link rel="stylesheet" type="text/css" href="FlySave.Css?version=20">
    <style>
        #Fname {
            margin-left: 25px;
            width: 200px;
        }

        #Lname {
            margin-left: 25px;
            width: 200px;
        }

        #male {
            margin-left: 60px;
        }

        #female {
            margin-left: 45px;
        }

        #DOB {
            margin-left: 10px;
            width: 200px;
        }

        #mobno {
            margin-left: 20px;
            width: 200px;
        }

        #eml {
            margin-left: 50px;
            width: 200px;
        }

        #ID {
            margin-left: 14px;
            width: 200px;
        }

        body {
            background-image: url("backgraund004.jpg");
        }

        .ResBox2 {
            width: 500px;
            padding: 30px;

        }

        .button2 {
            font-size: 18px;
        }
    </style>
</head>

<body>
    <ul>
        <li> <img src="Logo02.png" alt="home" height="70px" width="100px"></li>
        <li><a href="home.php">Home</a></li>
        <li><a href="LogIn.php">Log in</a></li>
        <li> <a href="ViewYourBooking.php">View your booking</a></li>
        <li><a href="AboutUs.html">Abuot us</a></li>

    </ul>

    <form action="" method="post">
        <div class="ResBox ResBox2">

            <label class="bold">First name: </label>
            <input class="inputBox" type="text" name="first" placeholder="First Name" required>
            <br><br>
            <label class="bold">Last name: </label>
            <input class="inputBox" type="text" name="last" placeholder="Last Name" required>
            <br><br>
            <label class="bold">Male: </label>
            <input type="radio" name="gander" value="Mr" id="male">
            <br><br>
            <label class="bold">Female: </label>
            <input type="radio" name="gander" value="Ms" id="female">
            <br><br>
            <label class="bold"> Date of birth: </label>
            <input class="inputBox" type="date" name="data" id="DOB" required>
            <br> <br>
            <label class="bold">Mobile No: </label>
            <input class="inputBox" type="telno" name="mobile" id="mobno" required>
            <br><br>
            <label class="bold">Email: </label>
            <input class="inputBox" type="email" name="email" id="eml" required>
            <br><br>
            <label class="bold">National ID: </label>
            <input class="inputBox" type="id" name="id" id="id">
            <br>
            <br>

            <button class="button button:hover button2" type="submit" name="submit" value="Post">Submit</button>


        </div>
    </form>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "flysaveairline";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //for the next page
    session_start();
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
    } else $username = '';

    $query01 = mysqli_query($conn, "SELECT Reservation_num FROM  reservation WHERE  Username = '" . $username . "'");
    $row = mysqli_fetch_array($query01);
    $ResNum = $row['Reservation_num'];

    $flight_ID = $_SESSION["flight_ID"];

    $class= $_SESSION['class0'];
    //^to the next page


    if (isset($_POST["submit"])) {

        $sql = "INSERT INTO traveler (FirstName, LastName, Gender, DOB, PhoneNum, Email, National_ID) 
VALUES('" . $_POST["first"] . "','" . $_POST["last"] . "','" . $_POST["gander"] . "','" . $_POST["data"] . "','" . $_POST["mobile"] . "','" . $_POST["email"] . "','" . $_POST["id"] . "')";

        if ($conn->query($sql) === TRUE) {
            echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";

            //add to view last page
            $sql02 = "SELECT `TravelerID` FROM `traveler` WHERE National_ID ='" . $_POST["id"] . "' ";
            $Row = mysqli_fetch_array(mysqli_query($conn, $sql02));
            $TravelerID = $Row['TravelerID'];

            $query07 = "INSERT INTO ticket(`TravelerID`,`Flight_ID`, `Ticket_Type`) VALUES ('" . $TravelerID . "','" . $flight_ID. "','" . $class . "')";

            mysqli_query($conn, $query07);

            $query08 = "SELECT `TicketNo` FROM `ticket` WHERE Flight_ID = '" . $flight_ID . "' AND Ticket_Type ='" . $class . "' AND TravelerID = '" . $TravelerID . "'";

            $Row2 = mysqli_fetch_array(mysqli_query($conn, $query08));
            $TicketNum = $Row2['TicketNo'];

            $query09 = "INSERT INTO `res_tic`(`Reservation_num`, `TicketNo`) VALUES ('" . $ResNum . "','" . $TicketNum . "') ";
            mysqli_query($conn, $query09);

            ?>
            <script type="text/javascript">
                window.location.href = "ReseravationView.php?ResNum=<?php echo $ResNum ?>";
            </script>
             <?php
            //^just to view last page
        } else {
            echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
        }

        $conn->close();
    }
    ?>
</body>

</html>