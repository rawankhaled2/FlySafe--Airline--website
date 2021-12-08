<!DOCTYPE html>
<html lang="en">

<head>
    <title>Log in</title>
    <link rel="icon" type="image/x-icon" href="logo01.png">
    <link rel="stylesheet" type="text/css" href="FlySave.Css?version=20">
    <style>
    body {
        background-image: url("backgraund003.jpg");
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
        <li><a class="active" onclick="refresh()">Log in</a></li>
        <li> <a href="ViewYourBooking.php">View your booking</a></li>
        <li><a href="AboutUs.html">Abuot us</a></li>

    </ul>
    <div class="ResBox ResBox2" id="Res">
        <h2 class="bold">User Log In</h2>

        <Form method="post" action="<?=$_SERVER['PHP_SELF'];?>">

            <label class="bold" for="username">username:</label>
            <input class="inputBox" type="text" id="username" name="username"><br>
            <label class="bold" for="pass">Password:</label>
            <input class="inputBox" type="Password" id="pass" name="password"><br><br>
            <input class="button button:hover button2" type="submit" name="submit" value="Log In">
        </Form>
        <br>
        <a>Don't have an account?</a>
        <a href="singUp.php">SingUp</a>
    </div>

    <?php
    if(isset($_POST["submit"])){
    $localhost = "localhost";
    $user = "root";
    $password = "";
    $database = "flysaveairline";
    
    
    $con = mysqli_connect($localhost, $user, $password, $database)
        or die(mysqli_connect_error());

       function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
    
        $username= $password1 ="";
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = test_input($_POST["username"]);
            $password1 = test_input($_POST["password"]);
        }  
    
    $query04 = "SELECT `Usersname`,`Password1` FROM `users` WHERE Usersname='".$username."' AND Password1= '".$password1."'";   
    
    if ($con->query($query04)->num_rows>0) {
        echo "<script type= 'text/javascript'>alert('welcome ".$username." wish you a happy travel');</script>";
        session_start();
        $_SESSION["username"] = $username;
         ?>
         <script type="text/javascript">window.location.href= "home.php";</script>
         <?php
        } else {
        echo "<script type= 'text/javascript'>alert('Error: The password or username is incorrect');</script>";
        }
    }
    ?>
</body>

</html>