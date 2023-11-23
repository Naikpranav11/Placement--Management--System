<?php
session_start();

if (isset($_POST['placeButton'])) {
    $prn = $_POST['prn'];

    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'details');

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Update the placement_status to "Placed"
    $updateQuery = "UPDATE students SET placement_status = 'Placed' WHERE prn = '$prn'";
    $updateResult = $conn->query($updateQuery);

    // Check if the update was successful
    if ($updateResult) {
        echo "Placement status updated to 'Placed' for PRN: $prn";
    } else {
        echo "Error updating placement status: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
