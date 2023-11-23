<?php
  session_start();
 if (isset($_SESSION['husername'])){

	   }
   else {
	   header("location: index.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!--favicon-->
        <link rel="shortcut icon" href="favicon.ico" type="image/icon">
        <link rel="icon" href="favicon.ico" type="image/icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Applications</title>
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
          echo "<h1>" . $Welcome . "<br>". $_SESSION['husername']. "</h1>";

		  ?>
        </header>
        <div class="profile-photo-container">
          <!-- <img src="images/profile-photo.jpg" alt="Profile Photo" class="img-responsive"> -->
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
            <li><a href="login.php"><i class="fa fa-home fa-fw"></i>Dashboard</a></li>
            <li><a href="manage-student.php" class="active"><i class="fa fa-users fa-fw"></i>Applications</a></li>
            <li><a href="preferences.php"><i class="fa fa-sliders fa-fw"></i>Selected Candidates</a></li>
            <li><a href="logout.php"><i class="fa fa-eject fa-fw"></i>Sign Out</a></li>
          </ul>
        </nav>
      </div>
      <!-- Main content -->
      <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li><a href="../../Homepage/index.php">Home </a></li>
                <!-- <li><a href="../../Drives/index.php">Drives</a></li> -->
                     <!-- <li><a href="Notif.php">Notification</a></li> -->
                <li><a href="Change Password.php">Change Password</a></li>
              </ul>
            </nav>
          </div>
        </div>
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget no-padding">
            <div class="panel panel-default table-responsive">
              <table class="table table-striped table-bordered templatemo-user-table">
                <thead>
                  <tr>



					<td><a  class="white-text templatemo-sort-by">Name </a></td>
                    <td><a class="white-text templatemo-sort-by">Last Name </a></td>
                    <td><a class="white-text templatemo-sort-by">PRN</a></td>
                    <td><a  class="white-text templatemo-sort-by">Branch</a></td>
					   <td><a class="white-text templatemo-sort-by">Email</a></td>
                       <td><a  class="white-text templatemo-sort-by">CGPA</a></td>
   <td><a class="white-text templatemo-sort-by">Status</a></td>
   <!-- <td><a  class="white-text templatemo-sort-by">Branch</a></td>
   <td><a  class="white-text templatemo-sort-by">SSLC Percentage </a></td>
   <td><a class="white-text templatemo-sort-by">PU Percentage</a></td>
			      <td><a  class="white-text templatemo-sort-by">BE Aggregate</a></td>
			      <td><a  class="white-text templatemo-sort-by">Current Backlogs </a></td>
				     <td><a  class="white-text templatemo-sort-by">History of Backlogs </a></td>
				     <td><a  class="white-text templatemo-sort-by">Detain Years</a></td> -->
				  </thead>
			   </tr>

<!-- ... Your existing PHP/HTML code ... -->

<?php
if (isset($_SESSION['husername'])) {
    $husername = $_SESSION['husername'];
    $conn = mysqli_connect('localhost', 'root', '', 'details');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Define $start_from and $num_rec_per_page
    $num_rec_per_page = 15;
    $start_from = (isset($_GET["page"])) ? ($_GET["page"] - 1) * $num_rec_per_page : 0;

    $companyQuery = "SELECT company FROM hr WHERE username = '$husername'";
    $companyResult = $conn->query($companyQuery);

    if ($companyResult === false) {
        echo "Error fetching company information: " . $conn->error;
    } else {
        $row = $companyResult->fetch_assoc();

        if ($row && isset($row['company'])) {
            $company = $row['company'];

            // Update the SQL query to include LIMIT
            $sql = "SELECT s.*, a.* FROM students s
                    JOIN applications a ON s.prn = a.student_prn
                    WHERE a.pdrive_cname = '$company' AND s.placement_status = 'Placed'
                    LIMIT $start_from, $num_rec_per_page";

            $rs_result = $conn->query($sql);

            while ($row = $rs_result->fetch_assoc()) {
                print "<tr>";
                print "<td>" . $row['first_name'] . "</td>";
                print "<td>" . $row['last_name'] . "</td>";
                print "<td>" . $row['prn'] . "</td>";
                print "<td>" . $row['branch'] . "</td>";
                print "<td>" . $row['email'] . "</td>";
                print "<td>" . $row['cgpa'] . "</td>";
                print "<td>" . $row['placement_status'] . "</td>";
                print "</tr>";
            }
        } else {
            echo "Company information not found for HR username: $husername";
        }
    }

    $conn->close();
}
?>

<!-- ... Your existing PHP/HTML code ... -->





                </tbody>
              </table>
			  </div>
			  </div>
			  </div>
        <div id="messageBox" class="message-box"></div>
         <div> <footer class="text-right">
		 <br>

          </br>
		  </footer></div>
        </div>
      </div>
    </div>

    <!-- JS -->
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
    <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->
    <script>
      $(document).ready(function(){
        // Content widget with background image
        var imageUrl = $('img.content-bg-img').attr('src');
        $('.templatemo-content-img-bg').css('background-image', 'url(' + imageUrl + ')');
        $('img.content-bg-img').hide();
      });
    </script>
    

  </body>
</html>
