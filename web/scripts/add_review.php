<?php
error_reporting(-1);
ini_set('display_errors', 'On');
	include_once '../dbconnect.php';
?>

<html>
    <head>
	<title>Local Loop Add Product Review</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>	
		
		
    <style>
		#loading-img{
			display:none;
		}
		.response_msg{
			margin-top:10px;
			font-size:13px;
			background:#E5D669;
			color:#ffffff;
			width:250px;
			padding:3px;
			display:none;
		}
    </style>
    </head>
    <body>
    <div class="container">
		<div class="row">
			<div class="col-lg-12">
				<center><h2>Enter Product Review</h2></center>
			</div>		
		</div>
    	<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-8">
			<!--<h1><img src="Inquiry.png" width="80px">Easy review Form With Ajax MySQL</h1> -->
			<form name="review-form" action="" method="post" id="review-form">
				
			<div class="form-group">
			<label for="Product Name">Product Name</label>
				<!--<input type="text" class="form-control" name="product_name" placeholder="Product Name" required>-->
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
						<input type="number" class="form-control" name="upvote" max="45" placeholder="Upvote Count" required>
						</div>
					
					</div>
					<div class="col-md-6">
						<div class="form-group">
						<label for="Publisher">Publisher</label>
						<input type="text" class="form-control" name="publisher"  placeholder="Flipkart/Amazon/Wallmart/Snapdeal" required>
						</div>
					
					</div>
					
				</div>

			<button type="submit" class="btn btn-primary" name="submit" value="Submit" id="submit_form">Submit</button>
			<img src="img/loading.gif" id="loading-img">
			</form>
			<div class="response_msg"></div>
			</div>
    	</div>
    </div>
	
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
		
    $("#review-form").on("submit",function(e){
    e.preventDefault();
    $("#loading-img").css("display","block");
    var sendData = $( this ).serialize();
    $.ajax({
    type: "POST",
    url: "get_response.php",
    data: sendData,
    success: function(data){
    $("#loading-img").css("display","none");
    $(".response_msg").text(data);
    $(".response_msg").slideDown().fadeOut(5000);
    $("#review-form").find("input[type=text], input[type=email], textarea").val("");
    }
    });
    });
    $("#review-form input").blur(function(){
    var checkValue = $(this).val();
    if(checkValue != '')
    {
    $(this).css("border","1px solid #eeeeee");
    }
    });
		$('.js-example-basic-single').select2();
    });
    </script>
    </body>
    </html>