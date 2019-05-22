<?php
session_start();
include_once 'dbconnect.php';

if(isset($_GET['ean']))
{
	$ean = $_GET['ean'];
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
                <p class="card-category">Scan Universal Product Code</p>
              </div>
              <div class="card-body ">
				<form name="scanForm" method="post" action="getData">
					<div class="input-group">
						<input id="scanner_input" name="product_code" class="form-control" placeholder="Click the button to scan an EAN..." type="text" <?php if(isset($ean)) echo 'value="'.$ean.'"' ; ?>/> 
						<span class="input-group-btn"> 
							<button class="btn btn-default" type="button" data-toggle="modal" data-target="#livestream_scanner">
								<i class="fa fa-barcode"></i>
							</button> 
						</span>
					</div>	
					<?php if(0) { ?>
					<div class="input-group" style="padding: 1px">						
						<input class="form-control" id="product_name" name="product_name" type="text" placeholder="Or Enter Product Name Here..." onChange="storeMethod()" />
						<span class="input-group-btn"> 
							<a href="search">
							<button class="btn btn-warning" type="button">
								<i class="fa fa-search"></i>
							</button> 
							</a>
						</span>
					</div>
					
					<script>
					function storeMethod() {
						var inputTest = document.getElementById('product_name').value;
						localStorage.setItem( 'searchPass', inputTest );
					}
					</script>
					<?php } ?>
					
					<div class="row">
						<?php if(!isset($ean)) { ?>
						<div class="col-lg-4 col-sm-12">
							<center><a href="search">
								<button class="btn btn-warning" type="button">
									<i class="fa fa-search"></i> Search Product
								</button> 
							</a></center>
						</div>
						<?php } ?>
						<div class="col-lg-4 col-sm-6">
							<center><input type="submit" class="btn btn-success" value="Submit" name="scanSubmit" /></center>
						</div>
							
						<div class="col-lg-4 col-sm-6">							
							<center>	
							<input type="reset" class="btn btn-danger" value="Reset" name="resetSubmit" /></center>
						</div>	
							
						
					
					</div>
					
				</form>

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
		  <!-- MODAL DIALOG --->
			<div class="modal" id="livestream_scanner">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title">Barcode Scanner</h4>
						</div>
						<div class="modal-body" style="position: static">
							<div id="interactive" class="viewport"></div>
							<div class="error"></div>
						</div>
						<div class="modal-footer">
							<label class="btn btn-default pull-left">
								<i class="fa fa-camera"></i> Use camera app
								<input type="file" accept="image/*;capture=camera" capture="camera" class="hidden" />
							</label>
							<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
		  
		<!---- SECOND DATA ROW -------
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-globe text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Capacity</p>
                      <p class="card-title">150GB
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i> Update Now
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-money-coins text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Revenue</p>
                      <p class="card-title">$ 1,345
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-calendar-o"></i> Last day
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-vector text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Errors</p>
                      <p class="card-title">23
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-clock-o"></i> In the last hour
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-favourite-28 text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Followers</p>
                      <p class="card-title">+45K
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i> Update now
                </div>
              </div>
            </div>
          </div>
        </div>
		------------------------------>

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
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  	<!---- QUAGGA --->
	<script type="text/javascript" src="assets/js/libs/quagga.min.js"></script>
	<style>
		#interactive.viewport {position: relative; width: 100%; height: auto; overflow: hidden; text-align: center;}
		#interactive.viewport > canvas, #interactive.viewport > video {max-width: 100%;width: 100%;}
		canvas.drawing, canvas.drawingBuffer {position: absolute; left: 0; top: 0;}
	</style>
	<script type="text/javascript">
		$(function() {
			// Create the QuaggaJS config object for the live stream
			var liveStreamConfig = {
					inputStream: {
						type : "LiveStream",
						constraints: {
							width: {min: 640},
							height: {min: 480},
							aspectRatio: {min: 1, max: 100},
							facingMode: "environment" // or "user" for the front camera
						}
					},
					locator: {
						patchSize: "medium",
						halfSample: true
					},
					numOfWorkers: (navigator.hardwareConcurrency ? navigator.hardwareConcurrency : 4),
					decoder: {
						"readers":[
							{"format":"ean_reader","config":{}}
						]
					},
					locate: true
				};
			// The fallback to the file API requires a different inputStream option. 
			// The rest is the same 
			var fileConfig = $.extend(
					{}, 
					liveStreamConfig,
					{
						inputStream: {
							size: 800
						}
					}
				);
			// Start the live stream scanner when the modal opens
			$('#livestream_scanner').on('shown.bs.modal', function (e) {
				Quagga.init(
					liveStreamConfig, 
					function(err) {
						if (err) {
							$('#livestream_scanner .modal-body .error').html('<div class="alert alert-danger"><strong><i class="fa fa-exclamation-triangle"></i> '+err.name+'</strong>: '+err.message+'</div>');
							Quagga.stop();
							return;
						}
						Quagga.start();
					}
				);
			});

			// Make sure, QuaggaJS draws frames an lines around possible 
			// barcodes on the live stream
			Quagga.onProcessed(function(result) {
				var drawingCtx = Quagga.canvas.ctx.overlay,
					drawingCanvas = Quagga.canvas.dom.overlay;

				if (result) {
					if (result.boxes) {
						drawingCtx.clearRect(0, 0, parseInt(drawingCanvas.getAttribute("width")), parseInt(drawingCanvas.getAttribute("height")));
						result.boxes.filter(function (box) {
							return box !== result.box;
						}).forEach(function (box) {
							Quagga.ImageDebug.drawPath(box, {x: 0, y: 1}, drawingCtx, {color: "green", lineWidth: 2});
						});
					}

					if (result.box) {
						Quagga.ImageDebug.drawPath(result.box, {x: 0, y: 1}, drawingCtx, {color: "#00F", lineWidth: 2});
					}

					if (result.codeResult && result.codeResult.code) {
						Quagga.ImageDebug.drawPath(result.line, {x: 'x', y: 'y'}, drawingCtx, {color: 'red', lineWidth: 3});
					}
				}
			});

			// Once a barcode had been read successfully, stop quagga and 
			// close the modal after a second to let the user notice where 
			// the barcode had actually been found.
			Quagga.onDetected(function(result) {    		
				if (result.codeResult.code){
					$('#scanner_input').val(result.codeResult.code);
					Quagga.stop();	
					setTimeout(function(){ $('#livestream_scanner').modal('hide'); }, 1000);			
				}
			});

			// Stop quagga in any case, when the modal is closed
			$('#livestream_scanner').on('hide.bs.modal', function(){
				if (Quagga){
					Quagga.stop();	
				}
			});

			// Call Quagga.decodeSingle() for every file selected in the 
			// file input
			$("#livestream_scanner input:file").on("change", function(e) {
				if (e.target.files && e.target.files.length) {
					Quagga.decodeSingle($.extend({}, fileConfig, {src: URL.createObjectURL(e.target.files[0])}), function(result) {alert(result.codeResult.code);});
				}
			});
		});
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