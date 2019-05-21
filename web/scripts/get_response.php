<?php
	error_reporting(-1);
	ini_set('display_errors', 'On');

	$publisher = "Amazon";
    include_once '../dbconnect.php';

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
			} else {
				echo "Thank you! Data inserted";
			}
    	} else {
			echo "Please fill Your Name and Product Name";
		}
	} else {
		//Redirect to Custom Product Add Page.
	}
    ?>
