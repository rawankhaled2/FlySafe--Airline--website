<!DOCTYPE html>
<html lang="en">

<head>
    <title>singUp</title>
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
    .button3 {
        font-size: 10px;
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
    <div class="ResBox ResBox2" id="Res">
        <h2 class="bold">Create New User Account</h2>

        <Form method="post" action="<?=$_SERVER['PHP_SELF'];?>">

            <label class="bold" for="username">user name:</label><br>
            <input class="inputBox" type="text" id="username" name="username"><br>
            <label class="bold" for="Email">Email:</label><br>
            <input class="inputBox" type="email" id="Email" name="Email"><br>
            <label class="bold" for="pass">Password:</label><br>
            <input class="inputBox" type="password" id="pass" name="password"><br>
            <label class="bold" for="pass2">Re-Enter your password:</label><br>
            <input class="inputBox" type="password" id="pass2" name="password2"><br><br>
            <input class="button button:hover button2" type="submit" name="submit" value="SingUp">
        </Form>
        
        
        <br>
        <a> Already have an account?</a>
        <a href="LogIn.php">LogIn</a><br><br>
        <button class="button button:hover button3" onclick='document.location="home.html"'> Cancel </button>
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

    $username= $email =$password1 = $password2 = $query03 = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = test_input($_POST["username"]);
        $email = test_input($_POST["Email"]);
        $password1 = test_input($_POST["password"]);
        $password2 = test_input($_POST["password2"]);
    }

$query03= "INSERT INTO `users`(`Usersname`, `Email`, `Password1`) VALUES ('".$username."','".$email."','".$password1."')"; 
 

    if($password1==$password2 && $password1!=""){
        if(mysqli_query($con,$query03) === TRUE){
        echo '<h3 style="color:Green;">Your account has been successfully registered,</h3>';
        echo '<h3><a href="LogIn.php"> Log in now</a></h3>';
        }else echo '<h3> something went roang try Agin </h3>';
    }elseif($password1!=$password2 && $password1!="") {
        echo '<h3 style="color:Red;">Passwords do not match each other</h3>' ;
    }else echo " ";
}    
    ?>

</body>

</html>