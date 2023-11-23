<?php
session_start();

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "details";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cname = $_POST['cname'];

    // Insert data into the hr table
    $insertQuery = "INSERT INTO `hr` (id, username, password, company) VALUES ('$id', '$username', '$password', '$cname')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();

header("Location:Students Eligibility.php");
exit();
?>
