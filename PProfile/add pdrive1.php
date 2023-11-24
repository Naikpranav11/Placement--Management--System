<?php
// Assuming you have a database connection established
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "details";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_POST['submit']))
{ 
$cname = $_POST['compny'];
$date = $_POST['date'];
$ctc = $_POST['ctc'];
$interview = $_POST['interview'];
$required_cgpa = $_POST['required_cgpa'];


$insert = "INSERT INTO pdrive(CompanyName, Date, ctc, interview, required_cgpa) VALUES ('$cname', '$date', '$ctc', '$interview', '$required_cgpa')";

if ($conn->query($insertQuery) === TRUE) {
	$_SESSION['success_message'] = "Data inserted successfully!";
} else {
	$_SESSION['error_message'] = "Error: " . $insertQuery . "<br>" . $conn->error;
}
}
?>