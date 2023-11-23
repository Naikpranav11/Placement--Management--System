<?php
  session_start();
  if($_SESSION["username"]){
    echo "Welcome, ".$_SESSION['username']."!";
  }
   else {
	   header("location: index.php");
   die("You must be Log in to view this page <a href='index.php'>Click here</a>");}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placement Drives</title>
    <!-- Add your CSS stylesheets and other meta tags here -->
    <link rel="shortcut icon" href="favicon.ico" type="image/icon">
		<link rel="icon" href="favicon.ico" type="image/icon">
		<title>DBCE| Campus Drives</title>
		<meta name="viewport"
		content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
		<meta name="keywords" content="Tillage Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<script type="application/x-javascript">
			addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
		</script>
		<!-- bootstarp-css -->
		<!-- <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /> -->
		<!--// bootstarp-css -->
		<!-- css -->
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
		<!--// css -->
		<!-- <script src="js/jquery-1.11.1.min.js"></script> -->
		<!--fonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,800,700,600'
		rel='stylesheet' type='text/css'>
		<!--/fonts-->
		<!-- <link href="css/animate.css" rel="stylesheet" type="text/css" media="all"> -->
		<script src="js/wow.min.js"></script>
  <!-- Add these lines in the head section of your HTML -->


		<script>
			new WOW().init();
		</script>
		<!-- pop-up -->
		<link rel="stylesheet" href="css/touchTouch.css" type="text/css" media="all" />
		<script type="text/javascript" src="js/jquery.fancybox.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				/*
				 *  Simple image gallery. Uses default settings
				 */

				$('.fancybox').fancybox();

			});
		</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var seeMoreButtons = document.querySelectorAll('.see-button');

        seeMoreButtons.forEach(function (button) {
            button.addEventListener('click', function (event) {
                event.preventDefault();

                // Get the drive ID from the data attribute
                var driveId = button.getAttribute('data-drive-id');
                console.log('Drive ID:', driveId);

                // Make an AJAX request to get drive details
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '../SProfile/get_drive_details.php?drive_id=' + driveId, true);

                xhr.onload = function () {
                    if (xhr.status >= 200 && xhr.status < 400) {
                        // Display the drive details using Bootstrap modal
                        console.log('Response:', xhr.responseText);
                        var details = xhr.responseText;
                        showDriveDetailsModal(details);
                    } else {
                        console.error('Request failed with status', xhr.status);
                    }
                };

                xhr.send();
            });
        });

        function showDriveDetailsModal(details) {
    // Create a hidden modal element
    var modal = document.createElement('div');
    modal.className = 'modal fade';
    modal.innerHTML = `
        <div class="modal-dialog modal-dialog-centered modal-1g">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- Details will be dynamically inserted here -->
                </div>
            </div>
        </div>
    `;

    // Append the modal to the body
    document.body.appendChild(modal);

    // Get the modal content element
    var modalContent = modal.querySelector('.modal-body');

    // Insert the details into the modal content
    modalContent.innerHTML = details;
    modalContent.style.fontWeight = 'bold';


    // Show the modal
    $(modal).modal('show');

    // Remove the modal from the DOM after it's hidden
    $(modal).on('hidden.bs.modal', function () {
        document.body.removeChild(modal);
    });
}

    });
</script>




</head>

<body>

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
              <a href="#"><i class="fa fa-bar-chart fa-fw"></i>Placement Drives</a>
            </li>
            <li>
              <a href="preferences.php" ><i class="fa fa-sliders fa-fw"></i>Preferences</a>
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
                  <a href="../../Homepage/index.php" >Home DBCE</a>
                </li>
                <li>
                  <a href="">Drives Homepage</a>
                </li>
                <li>
                  <a href="#" class="active">Notifications</a>
                </li>
                <li>
                  <a href="Changed Password.php">Change Password</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <div class="products-top">
			<!-- container -->
			<div class="container">
				<h3 class="wow fadeInRight animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">On Going and Upcomming Drives</h3>
				<h5 class="wow fadeInRight animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<span></span>
				</h5>
				<div class="products-top-grids wow fadeInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<div class="col-md-4 products-grid">
						<div class="products-number">
							<p>1.</p>
						</div>
						<div class="products-text">
							<h4>Tata Consultancy Services</h4>
							<p>Details about it...</p>
							<div class="see-button">
								<a class="btn btn-primary btn-lg see-button hvr-shutter-out-horizontal" href="1.php" role="button">See More</a>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-4 products-grid">
						<div class="products-number">
							<p>2.</p>
						</div>
						<div class="products-text">
							<h4>Infosys</h4>
							<p>Details</p>
							<div class="see-button">
								<a class="btn btn-primary btn-lg see-button hvr-shutter-out-horizontal" href="2.php" role="button">See More</a>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-4 products-grid">
						<div class="products-number">
							<p>3.</p>
						</div>
						<div class="products-text">
							<h4>Google</h4>
							<p></p>
							<a class="btn btn-primary btn-lg see-button hvr-shutter-out-horizontal" href="3.php" role="button">See More</a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="products-top-grids wow fadeInRight animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<div class="col-md-4 products-grid">
						<div class="products-number">
							<p>4.</p>
						</div>
						<div class="products-text">
							<h4>Microsoft</h4>
							<p></p>
							<a class="btn btn-primary btn-lg see-button hvr-shutter-out-horizontal" data-drive-id="microsoft"  href="" role="button">See More</a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-4 products-grid">
						<div class="products-number">
							<p>5.</p>
						</div>
						<div class="products-text">
							<h4>Directi </h4>
							<p></p>
							<a class="btn btn-primary btn-lg see-button hvr-shutter-out-horizontal" href="5.php" role="button">See More</a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-4 products-grid">
						<div class="products-number">
							<p>6.</p>
						</div>
						<div class="products-text">
							<h4>Intel</h4>
							<p></p>
							<a class="btn btn-primary btn-lg see-button hvr-shutter-out-horizontal" href="6.php" role="button">See More</a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- container -->
		</div>
      </div>
    </div>

    <div id="drive-details-container">
    <!-- Drive details will be displayed here dynamically -->
</div>

<!-- Add your additional HTML, scripts, or closing tags here -->

</body>

</html>
