<?php
session_start();

$husername = $_POST['username'];
$password = $_POST['password'];

if ($husername && $password) {
    $connect = mysqli_connect("localhost", "root", "", "details") or die("Couldn't Connect");
    
    // Use prepared statement to prevent SQL injection
    $query = $connect->prepare("SELECT * FROM hr WHERE username = ?");
    $query->bind_param('s', $husername);
    $query->execute();
    
    $result = $query->get_result();
    
    if ($result->num_rows != 0) {
        $row = $result->fetch_assoc();
        $dbusername = $row['username'];
        $dbpassword = $row['password'];

        if ($husername == $dbusername && $password == $dbpassword) {
            echo "<center>Login Successful..!! <br/>Redirecting you to HomePage! </br>If not, go to <a href='index.php'>Here</a></center>";
            echo "<meta http-equiv='refresh' content='3; url=index.php'>";
            $_SESSION['husername'] = $husername;
        } else {
            $message = "Username and/or Password is incorrect.";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo "<center>Redirecting you back to Login Page! If not, go to <a href='index.php'>Here</a></center>";
            echo "<meta http-equiv='refresh' content='1; url=index.php'>";
        }
    } else {
        die("User not exist");
    }
} else {
    $message = "Field Can't be Left Blank";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<center>Redirecting you back to Login Page! If not, go to <a href='index.php'>Here</a></center>";
    echo "<meta http-equiv='refresh' content='1; url=index.php'>";
}
?>
