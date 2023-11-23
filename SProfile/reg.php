<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "details";

$connect = mysqli_connect($host, $username, $password, $database);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $FName = $_POST['Fullname'];
    $LName = $_POST['Lastname'];
    $PRN = $_POST['PRN'];
    $password = $_POST['PASSWORD'];
    $repassword = $_POST['repassword'];
    $Email = $_POST['Email'];
    $Branch = $_POST['Branch'];
    $CGPA = $_POST['CGPA'];

    $checkQuery = "SELECT * FROM students WHERE prn='$PRN'";
    $checkResult = mysqli_query($connect, $checkQuery);

    if (mysqli_num_rows($checkResult) == 0) {
        if ($repassword == $password) {
            $insertQuery = "INSERT INTO students(first_name, last_name, prn, PASSWORD, Email,branch, cgpa) VALUES ('$FName','$LName','$PRN', '$password','$Email','$Branch','$CGPA')";
            
            if (mysqli_query($connect, $insertQuery)) {
                echo "<center>You have registered successfully...!! Go back to </center>";
                echo "<center><a href='index.php'>Login here</a></center>";
            } else {
                echo "<center>Error: " . $insertQuery . "<br>" . mysqli_error($connect) . "</center>";
            }
        } else {
            echo "<center>Your password do not match</center>";
        }
    } else {
        echo "<center>This PRN already exists</center>";
    }
}

mysqli_close($connect);
?>
