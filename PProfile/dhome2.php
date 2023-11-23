<?php
  session_start();
  if(isset($_SESSION["pusername"])){
    
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
    <title>Placement - Notifications</title>
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
    <script>
    document.addEventListener('DOMContentLoaded', function (){
    var seeMoreButtons = document.querySelectorAll('.see-button');

    seeMoreButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();

            // Get the drive ID from the data attribute
            var driveId = button.getAttribute('data-drive-id');

            // Make an AJAX request to get drive details
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '../SProfile/get_drive_details.php?drive_id=' + driveId, true);

            xhr.onload = function () {
                if (xhr.status >= 200 && xhr.status < 400) {
                    // Create a container for the details
                    var detailsContainer = document.createElement('div');
                    detailsContainer.innerHTML = xhr.responseText;
                    // Apply styles to the details container
                    detailsContainer.style.border = '1px solid #ccc';
                    detailsContainer.style.padding = '10px';
                    detailsContainer.style.marginTop = '10px';
                    detailsContainer.style.fontWeight = 'bold';

                    // Append the details container below the button
                    button.parentNode.insertBefore(detailsContainer, button.nextSibling);
                } else {
                    console.error('Request failed with status', xhr.status);
                }
            };

            xhr.send();
        });
    });

});

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
          echo "<h1>" . $Welcome . "<br>". $_SESSION['pusername']. "</h1>";
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
            <li><a href="login.php" class="active"><i class="fa fa-home fa-fw"></i>Dashboard</a></li> 
            <li><a href="Placement Drives.php"><i class="fa fa-home fa-fw"></i>Placement Drives</a></li>           
            <li><a href="manage-users.php"><i class="fa fa-users fa-fw"></i>View Students</a></li>
            <li><a href="queries.php"><i class="fa fa-users fa-fw"></i>Queries</a></li>
            <li><a href="Students Eligibility.php"><i class="fa fa-sliders fa-fw"></i>Students Eligibility Status</a></li>
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
                <li><a href="dhome2.php">Drives Home</a></li>
                <!-- <li><a href="Notif.php">Notifications</a></li> -->
                <li><a href="Change Password.php">Change Password</a></li>
              </ul>  
            </nav>
          </div>
        </div>
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
           <div class="templatemo-flex-row flex-content-row">
            <div class="col-1">              
            <div class="templatemo-content-widget Bluegrey-bg">
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
								<a class="btn btn-primary btn-lg see-button hvr-shutter-out-horizontal" data-drive-id="tcs" href="" role="button">See More</a>
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
								<a class="btn btn-primary btn-lg see-button hvr-shutter-out-horizontal" href="infosys" role="button">See More</a>
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
							<a class="btn btn-primary btn-lg see-button hvr-shutter-out-horizontal" href="google" role="button">See More</a>
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
							<a class="btn btn-primary btn-lg see-button hvr-shutter-out-horizontal" data-drive-id="microsoft" href="" role="button">See More</a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-4 products-grid">
						<div class="products-number">
							<p>5.</p>
						</div>
						<div class="products-text">
							<h4>facebook</h4>
							<p></p>
							<a class="btn btn-primary btn-lg see-button hvr-shutter-out-horizontal" href="facebook" role="button">See More</a>
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
							<a class="btn btn-primary btn-lg see-button hvr-shutter-out-horizontal" href="intel" role="button">See More</a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
    </div>
                <!-- <i class="fa fa-times"></i>
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object img-circle" src="images/sunset1.png" alt="Sunset">
                    </a>
                  </div>
                  <div class="media-body">
                    <a href="RNotif.php"><h2 class="media-heading text-uppercase">Read Messages</h2></a>
                    <p>Messages from Placement Department and Principal</p>
                  </div>
                </div> -->
              </div>            
           
            </div>
          </div>
          <footer class="text-right">

          </footer>
        </div>
      </div>
    </div>

    <!-- JS -->
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>        <!-- jQuery -->
    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"></script>  <!-- http://markusslima.github.io/bootstrap-filestyle/ -->
    <script type="text/javascript" src="js/templatemo-script.js"></script>        <!-- Templatemo Script -->
  </body>
</html>
