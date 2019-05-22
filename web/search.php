<?php
session_start();
include_once 'dbconnect.php';
$output = '';
if(isset($_GET['search_text'])) {
	
	$search = $_GET['search_text'];
	$query = "
	SELECT * FROM product_info 
	WHERE upc LIKE '%".$search."%'
	OR category LIKE '%".$search."%' 
	OR product_name LIKE '%".$search."%' 
	OR company LIKE '%".$search."%' 
	";
} else {
	$query = "
	SELECT * FROM product_info ORDER BY product_id";
}

$result = mysqli_query($con, $query);

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

</head>

<body class="">
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
                <h5 class="card-title">Get Product Details</h5>
                <p class="card-category">Search Product | <strong>Click on Result to Select UPC/EAN</strong></p>
              </div>
              <div class="card-body ">
				<form method="get" name="searchForm" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<div class="row">
					
						<div class="col-lg-10">
							<div class="input-group" style="padding: 1px">
								<input class="form-control" id="search_text" name="search_text" type="text" placeholder="Enter Product Name Here..." />
							</div>
						</div>
						<div class="col-lg-2">
							<div class="input-group">
								<center><input type="submit" name="search" value="Search" class="btn btn-warning" /></center>
							</div>
						</div>
					</div>
							
														
				  </form>
				<br />
				<div id="result"  style="overflow-x: auto; overflow-y: auto">
				  <?php 
					if(mysqli_num_rows($result) > 0)
						{
							$output .= '<center><h3>Results</h3></center>
										<div class="table-responsive" style="overflow-x: auto; overflow-y: auto">
											<table id="products" class="table table bordered">
												<tr>
													<th>UPC/EAN</th>
													<th>Product Name</th>
													<th>Category</th>
													<th>Company</th>
												</tr>';
							while($row = mysqli_fetch_array($result))
							{
								$output .= '
									<tr>
										<td>'.$row["upc"].'</td>
										<td>'.$row["product_name"].'</td>
										<td>'.$row["category"].'</td>
										<td>'.$row["company"].'</td>
									</tr>
								';
							}
							echo $output."</table></div>";
						}
						else
						{
							echo '<center><h3>Results</h3> <br />No Products Found</center>';
						}
					?>
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
	
	<script>
		function addRowHandlers() {
		  var table = document.getElementById("products");
		  var rows = table.getElementsByTagName("tr");
		  for (i = 0; i < rows.length; i++) {
			var currentRow = table.rows[i];
			var createClickHandler = function(row) {
			  return function() {
				var cell = row.getElementsByTagName("td")[0];
				var id = cell.innerHTML;
				var url = "home?ean="+id;
				window.location.href = url;
			  };
			};
			currentRow.onclick = createClickHandler(currentRow);
		  }
		}				  
	  
		function searchD() {
		  var inputTest = localStorage.getItem('searchPass');
		  document.getElementById("search_text").value = inputTest;

		  localStorage.removeItem( 'searchPass' ); // Clear the localStorage
		}
		
		function loadSet() {
			addRowHandlers();
			searchD();
		}
		
		window.onload = loadSet();
	</script>	

	
	
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