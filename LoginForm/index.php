<html>
<!--
//index.php

/*
 * Class:       AD 320 WI 18
 * Author:      Danielle Coulter
 * Title:       index.php, Assignment 7
 * Due Date:    Feb 20, 2018
 * Text:        Chapter 12
*/
-->
<head>
    <title>Login Form</title>
</head>

<body>
<?php
if(!isset($_COOKIE['user'])) {
    echo '

        <form action="index.php" method="post">
        Username:<input type="text" name="user"><br><br>
        Password:<input type="password" name="password"><br><br>
        <input type="checkbox" name="rememberme" value="1">Remember Me<br><br><br>
        <input type="submit" value="Login" name="check">
        </form>
        ';

}else{
    //echo "Cookie '" . $cookie_name . "' is set!<br>";

    echo "Welcome " . $_COOKIE['user']. "<br> <form action='index.php' method='post'>
        <input type='submit' value='Logout' name='logout'> </form>";
}

if(isset($_POST["logout"])){
    //changed to session_destroy and set cookie with negative expire time
    //need to work on this stuff to get the logout to forget the cookie and re-show the form
    session_destroy();
    setcookie("user", '', time() - 1);
    header('Location: index.php');
}

if(isset($_POST["check"])){
    $servername = 'localhost';
    $dbname   = 'icoolsho_dcoulter';
    $username = 'icoolsho_dcoulte';
    $password = '$!980-49-2554';
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $username=$_POST['user'];
    $password=$_POST['password'];

    $sql = "SELECT id FROM login where userName = '".$username."' and passWord='".$password."'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        //echo "success";

        if(isset($_POST['rememberme'])){
            setcookie('user',$username,time()+ 60,"/");
        }
        session_start();
        $_SESSION['name'] = $myusername;
        header("Location: index.php");

        //echo "Welcome ".$_COOKIE['user'];
    }else{
        echo("Invalid Username/Password");
    }

    $conn->close();
}

?>

</body>

</html>
