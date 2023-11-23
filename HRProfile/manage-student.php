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
    <![endif]--> <style>
        /* Add your custom styles here */
        .message-box {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #dff0d8; /* Green background */
            color: #3c763d; /* White text */
        }
    </style>

    <script>
   // JavaScript function to show the message box and update button text
   function showMessageBox(prn, buttonId) {
        // var messageBox = document.getElementById('messageBox');
        // messageBox.innerHTML = "Student with has been selected.";
        // messageBox.style.display = 'block';

        // Update the button text to "Selected"
        var selectButton = document.getElementById(buttonId);
        selectButton.value = 'Selected';

        // Automatically hide the message after 3 seconds (3000 milliseconds)
        setTimeout(function () {
            messageBox.style.display = 'none';
        }, 300);
    }

    // JavaScript function to handle form submission via AJAX
    function submitForm(prn, buttonId) {
        var xhr = new XMLHttpRequest();
        var formData = new FormData();
        formData.append('prn', prn);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Handle the response if needed
                    console.log(xhr.responseText);
                    // Show the message box and update the button text
                    showMessageBox(prn, buttonId);
                } else {
                    // Handle the error if needed
                    console.error(xhr.statusText);
                }
            }
        };

        xhr.open('POST', 'update_placement_status.php', true);
        xhr.send(formData);

        // Prevent the default form submission
        return false;
    }
    </script>

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
            <li><a href="#" class="active"><i class="fa fa-users fa-fw"></i>Applications</a></li>
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
   <td><a class="white-text templatemo-sort-by">update</a></td>
   <!-- <td><a  class="white-text templatemo-sort-by">Branch</a></td>
   <td><a  class="white-text templatemo-sort-by">SSLC Percentage </a></td>
   <td><a class="white-text templatemo-sort-by">PU Percentage</a></td>
			      <td><a  class="white-text templatemo-sort-by">BE Aggregate</a></td>
			      <td><a  class="white-text templatemo-sort-by">Current Backlogs </a></td>
				     <td><a  class="white-text templatemo-sort-by">History of Backlogs </a></td>
				     <td><a  class="white-text templatemo-sort-by">Detain Years</a></td> -->
				  </thead>
			   </tr>

         <?php
// session_start();

// Check if 'husername' key is set in the session
if (isset($_SESSION['husername'])) {
    // Get the HR username from the session
    $husername = $_SESSION['husername'];

    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'details');

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

// Fetch the company associated with the HR username
$companyQuery = "SELECT company FROM hr WHERE username = '$husername'";
$companyResult = $conn->query($companyQuery);

// Check if the query was successful
if ($companyResult === false) {
    echo "Error fetching company information: " . $conn->error;
} else {
    $row = $companyResult->fetch_assoc();

    // Check if the company information is found
    if ($row && isset($row['company'])) {
        $company = $row['company'];

        // Now, you can use $company to fetch the students who applied for this company
        $num_rec_per_page = 15;
        $start_from = (isset($_GET["page"])) ? ($_GET["page"] - 1) * $num_rec_per_page : 0;

        $sql = "SELECT s.*, a.* FROM students s
                JOIN applications a ON s.prn = a.student_prn
                WHERE a.pdrive_cname = '$company'
                LIMIT $start_from, $num_rec_per_page";

        $rs_result = $conn->query($sql);

        // Display the student details
        while ($row = $rs_result->fetch_assoc()) {
            print "<tr>";
            print "<td>" . $row['first_name'] . "</td>";
            print "<td>" . $row['last_name'] . "</td>";
            print "<td>" . $row['prn'] . "</td>";
            print "<td>" . $row['branch'] . "</td>";
            print "<td>" . $row['email'] . "</td>";
            print "<td>" . $row['cgpa'] . "</td>";
            // Add other student details as needed
            print "<td>" . $row['placement_status'] . "</td>";
            // Add other application details as needed
    // Add a button to update placement_status to "Placed"
    print "<td><form onsubmit=\"return submitForm('" . $row['prn'] . "', 'selectButton_" . $row['prn'] . "')\">";
    print "<input type='hidden' name='prn' value='" . $row['prn'] . "'>";
    $buttonId = 'selectButton_' . $row['prn']; // Unique button id for each student
    print "<input type='submit' id='$buttonId' name='placeButton' value='Select'>";
    print "</form></td>";
            print "</tr>";

        }
    } else {
        echo "Company information not found for HR username: $husername";
    }
}
    // // Check if the query was successful
    // else{
    //     echo "Error fetching company information: " . $conn->error;
    // }

    // Close the database connection
    $conn->close();
  }
//   else{
//     // Handle the case where 'husername' key is not set in the session
//     echo "HR username not found in the session.";
// }
?>




                </tbody>
              </table>
			  </div>
			  </div>
			  </div>
        <div id="messageBox" class="message-box"></div>

<script>
    // Example of how to call the showMessageBox function
    // Replace 'PRN_VALUE' with the actual PRN value when calling this function
    showMessageBox('PRN_VALUE');
</script>
 <!-- <div class="pagination-wrap">
<a href="approve2.php" class="templatemo-edit-btn">Approve</a>
</div>
  <div class="pagination-wrap">
  <ul class="pagination">



// $num_rec_per_page=15;
// $conn = mysqli_connect('localhost','root','','details');
// // mysql_select_db('details');
// $sql = "SELECT * FROM basicdetails where Approve=0 and Branch='$p'";
// $rs_result = $conn->query($sql); //run the query
// $total_records = $rs_result->num_rows;  //count number of records
// $totalpage = ceil($total_records / $num_rec_per_page);


// $currentpage = (isset($_GET['page']) ? $_GET['page'] : 1);
// 	 if($currentpage == 0)
// 	{

// 	}
// 	else if( $currentpage >= 1  &&  $currentpage <= $totalpage  )
// 	{

// 		if( $currentpage > 1 && $currentpage <= $totalpage)
// 			{

// 				$prev = $currentpage-1;
// 				echo "<li><a  href='manage-student.php?page=".$prev."'><</a></li>";

// 			}

// 	if($totalpage > 1){
// $prev = $currentpage-1;
// 	for ($i=$prev+1; $i<=$currentpage+2; $i++){
// 		echo "<li><a href='manage-student.php?page=".$i."'>".$i."</a></li>";
//   }
//   }


// 	if($totalpage > $currentpage  )
// 	{
// 		$nxt = $currentpage+1;
// 		echo "<li><a  href='manage-student.php?page=".$nxt."' >></a></li>";
// 	}

// 	 echo "<li><a>Total Pages:".$totalpage."</a></li>";
// }
//  ?>
</ul>
</div> -->
<!-- 
<br><br><center><label class="control-label" for="inputNote"><center><h2>OR</h2></center> <br/> <br/>To View All Sudent Click Link below:</label><br/>
			   <br/>
			   <a href="manage-users1.php" class="templatemo-blue-button">View All</a></center>
            </form>


          <div class="templatemo-flex-row flex-content-row">
            <div class="col-1">

          </div> -->
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
