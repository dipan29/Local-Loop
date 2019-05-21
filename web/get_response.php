    <?php 
    require_once("dbconnect.php");
    if((isset($_POST['your_name'])&& $_POST['your_name'] !='') && (isset($_POST['product_name'])&& $_POST['product_name'] !=''))
    {
     $yourName = $con->real_escape_string($_POST['your_name']);
     $productName = $con->real_escape_string($_POST['product_name']);
     $rating = $con->real_escape_string($_POST['rating']);
     $reviewTitle = $con->real_escape_string($_POST['review_title']);
     $reviewFull = $con->real_escape_string($_POST['review_full']);
     $upvote = $con->real_escape_string($_POST['upvote']);

     $sql="SELECT MAX(review_id) from local_review";
     $review_id = $con->query($sql);
     $review_id = $review_id + 1;


    $sql="INSERT INTO product_review (product_name,reviewer_name,rating,review_title,review_full,upvote_count) VALUES ('".$productName."', '".$yourName."', '".$rating."', '".$reviewTitle."', '".$reviewFull."', '".$upvote."')";
    if(!$result = $con->query($sql)){
    die('There was an error running the query [' . $con->error . ']');
    }
    else
    {
    echo "Thank you! Data inserted";
    }
    }
    else
    {
    echo "Please fill Your Name and Product Name";
    }
    ?>
