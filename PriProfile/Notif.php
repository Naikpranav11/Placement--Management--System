<?php
  session_start();
 if (isset($_SESSION['priusername'])){
    echo "Welcome, ".$_SESSION['priusername']."!";
  }
   else
	   header("location: index.php");

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
    <title>HOD - Preferences</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <!--
    Visual Admin Template
    http://www.templatemo.com/preview/templatemo_455_visual_admin
    -->
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
          echo "<h1>" . $Welcome . "<br>". $_SESSION['priusername']. "</h1>";
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
          <li><a href="login.php" ><i class="fa fa-home fa-fw" class="active"></i>Dashboard</a></li>
          <li><a href="Students Eligibility.php" class="active"><i class="fa fa-bar-chart fa-fw"></i> Add users</a></li>
            <!-- <li><a href="queries.php"><i class="fa fa-database fa-fw"></i>Queries</a></li> -->
            <li><a href="manage-users.php" ><i class="fa fa-users fa-fw"></i>Student Details</a></li>
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
                   <li>
                  <a href="../../Homepage/index.php">Home </a>
                </li>
                <li>
                  <a href="dhome1.php">Drives Homepage</a>
                </li>
                <li>
                  <a href="Notif.php">Notification</a>
                </li>
                <li>
                  <a href="Change Password.php">Change Password</a>
                  </li>
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
							<a class="btn btn-primary btn-lg see-button hvr-shutter-out-horizontal" data-drive-id="microsoft" href="" role="button">See More</a>
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
              <div class="templatemo-content-widget Bluegrey1-bg">
                <i class="fa fa-times"></i>
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object img-circle" src="images/sunset2.jpg" alt="Sunset">
                    </a>
                  </div>
                  <div class="media-body">
                    <a href="WNotif.php"><h2 class="media-heading text-uppercase">Post Notifications</h2></a>
                    <p>Send Messages to Students</p>
                  </div>
                </div>
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
