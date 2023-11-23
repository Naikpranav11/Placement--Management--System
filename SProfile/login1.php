<?php
session_start();

if (isset($_POST['prn']) && isset($_POST['password'])) {
    $username = $_POST['prn'];
    $password = $_POST['password'];

    if ($username && $password) {
        $connect = mysqli_connect("localhost", "root", "", "details") or die("Couldn't Connect");
        $query = $connect->query("SELECT * FROM students WHERE prn='$username'");

        $numrows = $query->num_rows;

        if ($numrows != 0) {
            $row = $query->fetch_assoc();
            $dbusername = $row['prn'];
            $dbpassword = $row['password'];

            if ($username == $dbusername && $password == $dbpassword) {
                echo "<center>Login Successful..!! <br/>Redirecting you to HomePage! </br>If not, go to <a href='index.php'> Here </a></center>";
                echo "<meta http-equiv='refresh' content ='3; url=index.php'>";
                $_SESSION['username'] = $username;
                // $_SESSION['Name'] = mysqli_query($connect, "SELECT Name FROM slogin WHERE USN='$username'");
            } else {
                $message = "Username and/or Password incorrect.";
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo "<center>Redirecting you back to the Login Page! If not, go to <a href='index.php'> Here </a></center>";
                echo "<meta http-equiv='refresh' content ='1; url=index.php'>";
            }
        } else {
            die("User does not exist");
        }
    } else {
        die("Please enter prn and Password");
    }
} else {
    die("Invalid request");
}
?>
