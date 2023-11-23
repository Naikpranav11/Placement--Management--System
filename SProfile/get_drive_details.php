<?php
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

// Check if 'drive_id' is the correct column name in your database
$driveId = $_GET['drive_id']; // assuming you are passing this parameter via GET

// Fetch details of the selected drive
$driveDetailsQuery = "SELECT * FROM pdrive WHERE cname = '$driveId'";
$driveDetailsResult = $conn->query($driveDetailsQuery);

if ($driveDetailsResult->num_rows >= 1) {
    $driveDetails = $driveDetailsResult->fetch_assoc();
    // Output drive details as needed
    echo "Company Name: " . $driveDetails['cname'] . "<br>";
    echo "Test Date: " . $driveDetails['date'] . "<br>";
    echo "Interview Date: " . $driveDetails['interview'] . "<br>";
    echo "Required CGPA: " . $driveDetails['required_cgpa'] . "<br>";
    echo "CTC: " . $driveDetails['ctc'] . "<br>";
    // Add other drive details here
} 
// else {
//     // echo "Drive details not found.";
// }

// Close the database connection
$conn->close();
?>
