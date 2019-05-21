    <html>
    <head>
	<title>Local Loop Add Product Review</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
			<input type="text" class="form-control" name="product_name" placeholder="Product Name" required>
			</div>
			<div class="form-group">
			<label for="Your Name">Your Name</label>
			<input type="text" class="form-control" name="your_name" placeholder="Your Name" required>
			</div>
			<div class="form-group">
			<label for="Rating">Your rating (out of 5)</label>
			<input type="text" class="form-control" name="rating" placeholder="Rating" required>
			</div>
			<div class="form-group">
			<label for="Review Title">Review Title</label>
			<input type="text" class="form-control" name="review_title" placeholder="Review Title" required>
			</div>
			<div class="form-group">
			<label for="Full Review">Full Review</label>
			<textarea name="review_full" class="form-control" rows="3" cols="28" rows="5" placeholder="Full Review"></textarea> 
			</div>
			<div class="form-group">
			<label for="Upvote Count">Upvotes</label>
			<input type="text" class="form-control" name="upvote" placeholder="Upvote Count" required>
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
    $(".response_msg").slideDown().fadeOut(3000);
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
    });
    </script>
    </body>
    </html>