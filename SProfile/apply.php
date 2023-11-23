<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    header("location: index.php");
    die("You must be logged in to view this page. <a href='index.php'>Click here to login</a>");
}

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
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['apply'])) {
    $driveCname = $_POST['drive_cname'];
    $studentPrn = $_SESSION['username'];

    // Check if the student has already applied for this drive (Consider using prepared statements)
    $checkQuery = "SELECT * FROM applications WHERE pdrive_cname = '$driveCname' AND student_prn = '$studentPrn'";
    $checkResult = $conn->query($checkQuery);

// $driveCname = $_POST['drive_cname'];


//             // Fetch details of the selected drive
//             $driveDetailsQuery = "SELECT * FROM pdrive WHERE cname = '$driveCname'";
//             $driveDetailsResult = $conn->query($driveDetailsQuery);

//             // Display drive details
//             if ($driveDetailsResult->num_rows > 0) {
//                 $driveDetails = $driveDetailsResult->fetch_assoc();
//                 echo "<h3>Details of the Selected Drive:</h3>";
//                 echo "Company Name: " . $driveDetails['cname'] . "<br>";
//                 echo "Date: " . $driveDetails['date'] . "<br>";
//                 echo "CTC: " . $driveDetails['ctc'] . "<br>";
//                 // Add other drive details here
//             } else {
//                 echo "Drive details not found.";
//             }

    if ($checkResult->num_rows == 0) {
        // Insert the application into the database (Consider using prepared statements)
        $applyQuery = "INSERT INTO applications (student_prn, pdrive_cname) VALUES ('$studentPrn', '$driveCname')";
        if ($conn->query($applyQuery) === TRUE) {
            echo "Application submitted successfully!";
        } else {
            echo "Error: " . $applyQuery . "<br>" . $conn->error;
        }
    } else {
        echo "You have already applied for this drive.";
    }
}
// Fetch available drives from the database
$drivesQuery = "SELECT * FROM pdrive";
$drivesResult = $conn->query($drivesQuery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Drive</title>
    <!-- Add your CSS stylesheets and other meta tags here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Add additional stylesheets if needed -->
    <style>
        /* Your custom styles go here */
    </style>
</head>

<body class="bg-light">

    <div class="container mt-5">
        <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <h3>Apply for a Drive</h3>

        <form method="post" action="" class="my-4">
            <div class="form-group">
                <label for="drive_cname" onchange="displayDriveDetails(this.value)" >Select Drive:</label>
                <select name="drive_cname" class="form-control" required>
                    <option value="" disabled selected>Select Drive</option>
                    <?php
                    while ($row = $drivesResult->fetch_assoc()) {
                        echo "<option value='" . $row['cname'] . "'>" . $row['cname'] . " - " . $row['date'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" name="apply" class="btn btn-primary">Apply</button>
        </form>

        <br>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>

    <!-- Bootstrap JS and other scripts if needed -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>

</html>

<?php
// Close the database connection
$conn->close();
?> 
