<?php
	error_reporting(-1);
	ini_set('display_errors', 'On');
	$msg = ''; $msg1 = '';
	$publisher = "Amazon";
    include_once '../dbconnect.php';

	if(isset($_POST['submitReview'])){
		if((isset($_POST['your_name'])&& $_POST['your_name'] !='') && (isset($_POST['product_name'])&& $_POST['product_name'] !=''))
		{
		 $yourName = $con->real_escape_string($_POST['your_name']);
		 $productName = $con->real_escape_string($_POST['product_name']);
		 $rating = $con->real_escape_string($_POST['rating']);
		 $reviewTitle = $con->real_escape_string($_POST['review_title']);
		 $reviewFull = $con->real_escape_string($_POST['review_full']);
		 $upvote = $con->real_escape_string($_POST['upvote']);
		 $publisher = $con->real_escape_string($_POST['publisher']);

	/*		
		 $sql="SELECT MAX(review_id) from local_review";
		 $review_id = $con->query($sql);
		 $review_id = $review_id + 1;
	*/
		 $tempQ = mysqli_query($con,"SELECT * FROM product_info WHERE product_name = '".$productName."' ");
		 if($tempQ->num_rows > 0) {
			 $rowQ = $tempQ->fetch_assoc();
			 $product_id = $rowQ['product_id'];


				$sql="INSERT INTO product_review (product_id,product_name,reviewer_name,rating,review_title,review_full,upvote_count,publisher) VALUES ('".$product_id."','".$productName."', '".$yourName."', '".$rating."', '".$reviewTitle."', '".$reviewFull."', '".$upvote."','".$publisher."')";
				if(!$result = mysqli_query($con,$sql)){
					die('There was an error running the query [' . $con->error . ']');
					$msg = 'There was an error running the query [' . $con->error . ']';
				} else {
					$msg = "Thank you! Data inserted";
				}
			} else {
				$msg = "Please fill Your Name and Product Name";
			}
		} else {
			//Redirect to Custom Product Add Page.
		}		
		
	}

	if(isset($_POST['submitProduct'])){
		$upc = mysqli_real_escape_string($con,$_POST['upc']);
		$product_name = mysqli_real_escape_string($con,$_POST['product_name']);
		$category = mysqli_real_escape_string($con,$_POST['category']);
		$price = mysqli_real_escape_string($con,$_POST['price']);
		$company = mysqli_real_escape_string($con,$_POST['company']);
		$product_details = mysqli_real_escape_string($con,$_POST['product_details']);
		
		$result = mysqli_query($con, "INSERT INTO product_info(upc,category,product_name,product_details,company,price) VALUES('".$upc."','".$category."','".$product_name."','".$product_details."','".$company."','".$price."') ");
		
		if($result){
			$msg1 = "Thank you! Data inserted";
		} else {
			$msg1 = "There was some error, Please try again later.";
		}
	}
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Reviews API - Local Loop</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
</head>

<body>
	<div class="container">
		
		<div class="row">
			<div class="col-lg-12">
				<center><h2>Enter Product Details</h2></center>
			</div>		
		</div>		
		<div class="row">
			<div class="col-lg-2">
			
			</div>
			
			<div class="col-lg-8">
				<form name="add-product" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="product-form">
					<div class="input-group">
						<input id="scanner_input" class="form-control" placeholder="Click the button to scan an EAN..." type="text" name="upc" required/> 
						<span class="input-group-btn"> 
							<button class="btn btn-default" type="button" data-toggle="modal" data-target="#livestream_scanner">
								<i class="fa fa-barcode"></i>
							</button> 
						</span>
					</div><br />
					<div class="form-group">
						<label for="product_name">Product Name : </label>
						<input class="form-control" name="product_name" placeholder="Enter Product Name" type="text" required/>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label for="category">Category : </label>
								<input class="form-control" name="category" placeholder="Books/Phones/Electronics" type="text" required/>								
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="price">Price : </label>
								<input class="form-control" name="price" placeholder="Enter as 100.25 (two decimals)" type="text" required/>								
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="company">Company : </label>
								<input class="form-control" name="company" placeholder="Publisher/Manufacturer/Company" type="text" required/>								
							</div>
						</div>				
					</div>
					
					<div class="form-group">
						<label for="details">Product Details : </label>
						<textarea name="product_details" class="form-control" rows="3" placeholder="Enter Product Description Here."></textarea>
					</div> 
					
					<br>
					<center><input type="submit" class="btn btn-lg btn-success" name="submitProduct" value="Add Product" id="submit_p_form" /></center>
				</form>
				<div class="response_msg">
					<?php if($msg1 != '') echo $msg1; ?>	
				</div>
			</div>
			
		</div>
		
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
		
		<br><hr><br>
		
		<div class="row">
			<div class="col-lg-12">
				<center><h2>Enter Product Review</h2></center>
			</div>		
		</div>
    	<div class="row">
			<div class="col-md-2">
			</div>
			
			<div class="col-md-8">
			
			<form name="add-review" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="review-form">
				
			<div class="form-group">
			<label for="Product Name">Product Name</label>
				
				<select class="js-example-basic-single form-control" name="product_name" required>
					<option disabled selected>Select Your Product</option>
					<?php 
						$result = mysqli_query($con, "SELECT * FROM product_info");
						while($row=$result->fetch_assoc()) {
							?>
							<option value="<?php echo $row['product_name']; ?>"><?php echo $row['product_name']; ?></option>
							<?php
						}
					?>
				</select>
			</div>
				
			<div class="form-group">
				<label for="Your Name">Your Name</label>
				<input type="text" class="form-control" name="your_name" placeholder="Your Name" required>
			</div>
			<div class="form-group">
				<label for="Rating">Your rating (out of 5)</label>
				<input type="text" class="form-control" name="rating" max="5" placeholder="Rating" required>
			</div>
			<div class="form-group">
			<label for="Review Title">Review Title</label>
			<input type="text" class="form-control" name="review_title" placeholder="Review Title" required>
			</div>
			<div class="form-group">
			<label for="Full Review">Full Review</label>
			<textarea name="review_full" class="form-control" rows="3" cols="28" rows="5" placeholder="Full Review"></textarea> 
			</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						<label for="Upvote Count">Upvotes</label>
						<input type="number" class="form-control" name="upvote" max="10000" placeholder="Upvote Count" required>
						</div>
					
					</div>
					<div class="col-md-6">
						<div class="form-group">
						<label for="Publisher">Publisher</label>
						<input type="text" class="form-control" name="publisher"  placeholder="Flipkart/Amazon/Wallmart/Snapdeal" required>
						</div>
					
					</div>
					
				</div>

				<center><input type="submit" class="btn btn-primary btn-lg" name="submitReview" value="Add Review" id="submit_form" /></center>
			
			</form>
			<div class="response_msg">
				<?php if($msg != '') echo $msg; ?>	
			</div>
			</div>
    	</div>
		<br /><hr>
		<center>&copy; 2019 | Confidential Rights | Local Loop</center>
    </div>
	
		<!------------ SCRIPT ------------->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
		<!---- QUAGGA --->
	<script type="text/javascript" src="../assets/js/libs/quagga.min.js"></script>
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
	<script>
		$(document).ready(function() {
			$(".js-example-basic-single").select2();
		});
	</script>
</body>
</html>