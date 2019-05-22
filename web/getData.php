<?php

$review_len_lim = 100;

session_start();
include_once 'dbconnect.php';

if(isset($_POST['scanSubmit'])) {
	$upc = mysqli_real_escape_string($con, $_POST['product_code']);
	if(isset($_POST['product_name']))
		$name = mysqli_real_escape_string($con, $_POST['product_name']);
	
	if($upc){
		$query = mysqli_query($con, "SELECT * FROM product_info WHERE upc = '".$upc."' ");
		
		if ($query->num_rows == 0) {
			$show = "<script>
			alert('The Provided UPC Number is either Invalid or isn\'t in our database yet. We will fetch it, PLEASE RESCAN IT.');
			window.location.href='home';
			</script>";
		} else {
			//$show = 1;
		}
		
		if($query->num_rows == 1){
			$row = $query->fetch_assoc();			
			$product_id = $row['product_id'];
			
		} 
	}
}

?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="favicon.png">
  <link rel="icon" type="image/png" href="favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Local Loop - Your Offline Shopping Reviewed!
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
	
  <?php //include_once "scripts/special_readmore_css.php" ?>
  <style>	
  <?php 
	$resultT = mysqli_query($con, "SELECT * FROM product_review WHERE product_id = '".$product_id."'");
	while($rowT = $resultT->fetch_assoc()) {
		echo "#more_".$rowT['review_id']." {display: none;} ";
	}
  ?>
  <?php 
	$resultTA = mysqli_query($con, "SELECT * FROM local_review WHERE product_id = '".$product_id."'");
	while($rowTA = $resultTA->fetch_assoc()) {
		echo "#more2_".$rowTA['review_id']." {display: none;} ";
	}
  ?>	  
  </style>
	
</head>

<body class="">
	<?php if(isset($show)) echo $show; ?>
	
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://localloop.ml" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="favicon.png">
          </div>
        </a>
        <a href="https://localloop.ml" class="simple-text logo-normal">
          Welcome
          <!-- <div class="logo-image-big">
            <img src="assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="home">
              <i class="fa fa-barcode"></i>
              <p>Scan Code</p>
            </a>
          </li>
          <li>
            <a href="account">
              <i class="fa fa-user-circle-o"></i>
              <p>My Account</p>
            </a>
          </li>
          <li>
            <a href="about">
              <i class="nc-icon nc-diamond"></i>
              <p>About Us</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#top"><img src="logo.png"></a>
          </div>

          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
			<!--
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="#pablo">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
			
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
				
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="#pablo">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
				-->
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-lg">
  
  		<canvas id="bigDashboardChart"></canvas>
  
  
		</div> -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Product Details</h5>
                <p class="card-category">Your Scanned Code Is <?php if(isset($upc)) echo $upc ;?></p>
              </div>
              <div class="card-body ">
				  <div class="row">
				  	  <div class="col-lg-12">
					  	<h5><strong>Product Name : </strong><?php echo $row['product_name']; ?></h5>
						  <?php
						  	$buffer = nl2br($row['product_details']);
						  	$details = str_replace(array("\n", "\r"), '', $buffer);
						  ?>
						  <span><?php echo $details ; ?></span><br />
						<p><strong>Category : </strong><?php echo $row['category']; ?></p>
						<p><strong>Company : </strong><?php echo $row['company']; ?> &nbsp;&nbsp;&nbsp;<br /><strong>Price : </strong>Rs. <?php echo $row['price']; ?> /-</p>
						  
						  <?php 
						  	$q1 = mysqli_query($con, "SELECT avg(rating) AS rating FROM product_review WHERE product_id = '".$product_id."'");
						  	$row1 = $q1->fetch_assoc();
						  	$r1 = $row1['rating'];
						  	if($r1 == 0) $r1 = 5;
						  	$q2 = mysqli_query($con, "SELECT avg(rating) AS rating FROM local_review WHERE product_id = '".$product_id."'");
						  	$row2 = $q2->fetch_assoc();
						  	$r2 = $row2['rating'];
						  	if($r2 == 0) $r2 = 5;
						  
						  	$lstar = (5*$r1 + 2*$r2)/7;
						  ?>
						  <div class="row">
						  	
							<div class="col-lg-4">
								<p><strong>Online <i class="fa fa-star text-danger"> </i> Rating</strong> : <?php echo number_format($r1,1); ?> / 5</p>
							</div>  
							<div class="col-lg-4">
								<p><strong>Local <i class="fa fa-star text-danger"> </i> Rating</strong> : <?php echo number_format($r2,1); ?> / 5</p>
							
							</div>
							<div class="col-lg-4">
								<p><strong>Our <i class="fa fa-star text-danger"> </i> Recomendation</strong> : <?php echo number_format($lstar,1); ?> / 5</p>
							</div>
							
						  </div>
						  
						  <br />
						  <center><a href="home" class="btn btn-lg btn-info">Scan another Code</a></center>
					  </div>
					  
				  </div>

              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-server"></i> MinD Webs Systems
                </div>
              </div>
            </div>
          </div>
        </div>	
		  

        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="card ">
				  <div class="card-header ">
					<h5 class="card-title"><i class="nc-icon nc-globe text-warning"></i> Online Reviews</h5>
					<p class="card-category"><?php if(isset($upc)) echo $row['product_name'] ;?></p>
				  </div>
				  <div class="card-body ">
					  <div class="row" style="max-height: 360px; overflow-y: auto; overflow-x: hidden">
						  <div class="col-lg-12" style="margin-left: 5px;">
							  <?php 
							  	$queryReview = mysqli_query($con, "SELECT * FROM product_review WHERE product_id = '".$product_id."'");
								if($queryReview->num_rows > 0){
									while($review = $queryReview->fetch_assoc()) {
										?>
							  			<div class="row">
							  				<div class="col-lg-12">
												<p style="font-size: 18px;"><?php echo $review['review_title']; ?>&nbsp;&nbsp;<span style="font-size: 12px"><i class="fa fa-user"> </i> <?php echo $review['reviewer_name'] ; ?>  |  <i><?php echo substr($review['review_date'],0,10); ?></i></span>
												<span style="float: right"><a href="scripts/change_upvote"><i class="fa fa-thumbs-up text-success"> </i></a> <strong><?php echo $review['upvote_count']; ?></strong></span>
												</p>
												
												
												<span><i><?php echo nl2br(substr($review['review_full'],0,$review_len_lim)) ;?><span id="dots_<?php echo $review['review_id']; ?>"> ......</span><span id="more_<?php echo $review['review_id']; ?>"><?php echo nl2br(substr($review['review_full'],$review_len_lim,strlen($review['review_full'])+1)) ;?></span></i></span>
												
												<?php if(strlen($review['review_full']) > $review_len_lim) { ?>
												<br /><button class="btn btn-sm btn-secondary" onclick="myFunction_<?php echo $review['review_id']; ?>()" id="myBtn_<?php echo $review['review_id']; ?>">Read More!</button>
												<?php } ?>
												
												<br />
												<span style="padding-top : 5px">
												<?php for($i=0; $i<$review['rating']; $i++) { ?>
													<i class="fa fa-star"> </i> 
												<?php } ?>
													
													<span style="float: right">Publisher : <strong><?php echo $review['publisher']; ?></strong></span>
												</span>
											</div>
							  			</div>
							  			<hr>
							  <?php
									}
								}
							  ?>
							  
							  <br/><center><i>End of Results</i></center>
						  </div>

					  </div>

				  </div>
				  <div class="card-footer ">
					<hr>
					<div class="stats">
					  <i class="fa fa-info"></i> Online Reviews
					</div>
				  </div>
				</div>

          </div>

          <div class="col-lg-6 col-md-6 col-sm-6">
				<div class="card ">
				  <div class="card-header ">
					<h5 class="card-title"><i class="nc-icon nc-favourite-28 text-info"></i> Local Loop Reviews</h5>
					<p class="card-category"><?php if(isset($upc)) echo $row['product_name'] ;?></p>
				  </div>
				  <div class="card-body ">
					  <div class="row" style="max-height: 360px; overflow-y: auto; overflow-x: hidden">
						  <div class="col-lg-12" style="margin-left: 5px;">
							  <?php 
							  	$queryReview = mysqli_query($con, "SELECT * FROM local_review WHERE product_id = '".$product_id."'");
								if($queryReview->num_rows > 0){
									while($review = $queryReview->fetch_assoc()) {
										?>
							  			<div class="row">
							  				<div class="col-lg-12">
												<p style="font-size: 18px;"><?php echo $review['review_title']; ?>&nbsp;&nbsp;<span style="font-size: 12px"><i class="fa fa-user"> </i> <?php echo $review['reviewer_name'] ; ?>  |  <i><?php echo substr($review['review_date'],0,10); ?></i></span>
												<span style="float: right"><a href="scripts/change_upvote"><i class="fa fa-thumbs-up text-success"> </i></a> <strong><?php echo $review['upvote_count']; ?></strong></span>
												</p>
																								
												<span><i><?php echo nl2br(substr($review['review_full'],0,$review_len_lim)) ;?><span id="dots2_<?php echo $review['review_id']; ?>"> ......</span><span id="more2_<?php echo $review['review_id']; ?>"><?php echo nl2br(substr($review['review_full'],$review_len_lim,strlen($review['review_full'])+1)) ;?></span></i></span>
												
												<?php if(strlen($review['review_full']) > $review_len_lim) { ?>
												<br /><button class="btn btn-sm btn-secondary" onclick="myFunction2_<?php echo $review['review_id']; ?>()" id="myBtn2_<?php echo $review['review_id']; ?>">Read More!</button>
												<?php } ?>
												
												<br />
												<span style="padding-top : 5px">
												<?php for($i=0; $i<$review['rating']; $i++) { ?>
													<i class="fa fa-star"> </i> 
												<?php } ?>
													<span style="float: right">Publisher : <strong>Local Loop</strong></span>
												</span>
											</div>
							  			</div>
							  			<hr>
							  <?php
									}
								}
							  ?>
							  
							  <br/><center><i>End of Results</i></center>
						  </div>

					  </div>

				  </div>
				  <div class="card-footer ">
					<hr>
					<div class="stats">
					  <i class="fa fa-leaf"></i> &copy; Local Loop
					</div>
				  </div>
				</div>
          </div>
        </div>


      </div>
		
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li>
                  <a href="https://mindwebs.org" target="_blank">MinD Webs</a>
                </li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Dipan Roy
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  
  <!-- Read More Script -->
	<script>
		<?php 
			$resultT2 = mysqli_query($con, "SELECT * FROM product_review WHERE product_id = '".$product_id."'");
			while($rowT2 = $resultT2->fetch_assoc()) {
		?>
			function myFunction_<?php echo $rowT2['review_id'] ; ?>() {
			  var dots = document.getElementById("dots_<?php echo $rowT2['review_id'] ; ?>");
			  var moreText = document.getElementById("more_<?php echo $rowT2['review_id'] ; ?>");
			  var btnText = document.getElementById("myBtn_<?php echo $rowT2['review_id'] ; ?>");

			  if (dots.style.display === "none") {
				dots.style.display = "inline";
				btnText.innerHTML = "Read more"; 
				moreText.style.display = "none";
			  } else {
				dots.style.display = "none";
				btnText.innerHTML = "Read less"; 
				moreText.style.display = "inline";
			  }
			}
		<?php
				}
	    ?>
		
		<?php 
			$resultTA2 = mysqli_query($con, "SELECT * FROM local_review WHERE product_id = '".$product_id."'");
			while($rowTA2 = $resultTA2->fetch_assoc()) {
		?>
			function myFunction2_<?php echo $rowTA2['review_id'] ; ?>() {
			  var dots = document.getElementById("dots2_<?php echo $rowTA2['review_id'] ; ?>");
			  var moreText = document.getElementById("more2_<?php echo $rowTA2['review_id'] ; ?>");
			  var btnText = document.getElementById("myBtn2_<?php echo $rowTA2['review_id'] ; ?>");

			  if (dots.style.display === "none") {
				dots.style.display = "inline";
				btnText.innerHTML = "Read more"; 
				moreText.style.display = "none";
			  } else {
				dots.style.display = "none";
				btnText.innerHTML = "Read less"; 
				moreText.style.display = "inline";
			  }
			}
		<?php
				}
	    ?>
		
	</script>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>
</html>