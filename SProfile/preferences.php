<?php
  session_start();
  if($_SESSION["username"]){
    echo "Welcome, ".$_SESSION['username']."!";
  }
   else {
	   header("location: index.php");
   die("You must be Log in to view this page <a href='index.php'>Click here</a>");}
  

   //Connect to the database
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "details";
   
   $conn = new mysqli($servername, $username, $password, $dbname);

// Handle form submission
if (isset($_POST['apply'])) {
  $driveCname = $_POST['drive_cname'];
  $studentPrn = $_SESSION['username'];

  // Check if the student has already applied for this drive
  $checkQuery = "SELECT * FROM applications WHERE pdrive_cname = '$driveCname' AND student_prn = '$studentPrn'";
  $checkResult = $conn->query($checkQuery);

  if ($checkResult->num_rows == 0) {
      // Insert the application into the database
      $applyQuery = "INSERT INTO applications (student_prn, pdrive_cname) VALUES ('$studentPrn', '$driveCname')";
      if ($conn->query($applyQuery) === TRUE) {
          echo "Application submitted successfully!";

          // Fetch details of the selected drive
          // $driveDetailsQuery = "SELECT * FROM pdrive WHERE cname = '$driveCname'";
          // $driveDetailsResult = $conn->query($driveDetailsQuery);

          // // Display drive details
          // if ($driveDetailsResult->num_rows > 0) {
          //     $driveDetails = $driveDetailsResult->fetch_assoc();
          //     echo "<h3>Details of the Selected Drive:</h3>";
          //     echo "Company Name: " . $driveDetails['cname'] . "<br>";
          //     echo "Date: " . $driveDetails['date'] . "<br>";
          //     echo "CTC: " . $driveDetails['ctc'] . "<br>";
          //     // Add other drive details here
          // } else {
          //     echo "Drive details not found.";
          // }
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
    <!--favicon-->
        <link rel="shortcut icon" href="favicon.ico" type="image/icon">
        <link rel="icon" href="favicon.ico" type="image/icon">

    <link rel="shortcut icon" href="favicon.ico" type="image/icon">
    <link rel="icon" href="favicon.ico" type="image/icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preferences</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <!-- Left column -->
    <div class="templatemo-flex-row">
      <div class="templatemo-sidebar">
        <header class="templatemo-site-header">
          <div class="square"></div>

		  <?php
		  $Welcome = "Welcome";
          echo "<h1>" . $Welcome . "<br>". $_SESSION['username']. "</h1>";
		  ?>
        </header>
        <div class="profile-photo-container">
          <img src="images/profile-photo.jpg" alt="Profile Photo" class="img-responsive">
          <div class="profile-photo-overlay"></div>
        </div>
        <!-- Search box -->
        <form class="templatemo-search-form" role="search">
          <div class="input-group">
            <button type="submit" class="fa fa-search"></button>
            <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
          </div>
        </form>
        <div class="mobile-menu-icon">
          <i class="fa fa-bars"></i>
        </div>
        <nav class="templatemo-left-nav">
          <ul>
            <li>
              <a href="login.php"><i class="fa fa-home fa-fw"></i>Dashboard</a>
            </li>
            <li>
              <a href="dhome.php"><i class="fa fa-bar-chart fa-fw"></i>Placement Drives</a>
            </li>
            <li>
              <!-- <a href="#" class="active"><i class="fa fa-sliders fa-fw"></i>Preferences</a> -->
            </li>
            <li>
              <a href="logout.php"><i class="fa fa-eject fa-fw"></i>Sign Out</a>
            </li>
          </ul>
        </nav>
      </div>
      <!-- Main content -->
      <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li>
                  <a href="../Homepage/index.html" >Home DBCE</a>
                </li>
                <li>
                  <a href="../Drives/products.php">Drives Homepage</a>
                </li>
                <li>
                  <a href="">Overview</a>
                </li>
                <li>
                  <a href="login.html">Change Password</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
            <h2 class="margin-bottom-10">Apply for the drive</h2>
            <p></p>
            <form action="" class="templatemo-login-form" method="post" enctype="multipart/form-data">
              <div class="row form-group">
				<div class="col-lg-6 col-md-6 form-group">
        <label for="drive_cname">Select Drive:</label>
        <select name="drive_cname" required>
        <option value="" disabled selected>Select Drive</option>
            <?php
            while ($row = $drivesResult->fetch_assoc()) {
                echo "<option value='" . $row['cname'] . "'>" . $row['cname'] . " - " . $row['date'] . "</option>";
            }
            ?>
        </select>
        <br>
        <!-- <input type="submit" name="apply" value="Apply"> -->
				  </div>
              </div>
              </div>
              <div class="form-group text-right">

				<button type="submit"  name="apply" class="templatemo-blue-button">Apply</button>
				<button type="submit"  name="update" class="templatemo-blue-button">update</button>
                <button type="reset" class="templatemo-white-button">Reset</button>
              </div>
            </form>
          </div>
          <footer class="text-right">
 
          </footer>
        </div>
      </div>
    </div>
    <!-- JS -->
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <!-- jQuery -->
    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"></script>
    <!-- http://markusslima.github.io/bootstrap-filestyle/ -->
    <script type="text/javascript" src="js/templatemo-script.js"></script>
    <!-- Templatemo Script -->
  </body>

</html>
