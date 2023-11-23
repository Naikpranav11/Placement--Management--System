<?php
// Assuming you have a database connection established
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "details";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Escape user inputs to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    // Insert data into the tpo table
    $insertQuery = "INSERT INTO tpo (id, name, username, email, password) VALUES ('$id', '$name', '$username', '$email', '$pass')";

    if ($conn->query($insertQuery) === TRUE) {
        $_SESSION['success_message'] = "Data inserted successfully!";
    } else {
        $_SESSION['error_message'] = "Error: " . $insertQuery . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();

// Redirect back to the original page
header("Location: PriProfile\Students Eligibility.php");
exit();
?>
