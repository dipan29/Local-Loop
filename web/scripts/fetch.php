<?php
include_once 'dbconnect.php';
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($con, $_POST["query"]);
	$query = "
	SELECT * FROM product_info 
	WHERE upc LIKE '%".$search."%'
	OR category LIKE '%".$search."%' 
	OR product_name LIKE '%".$search."%' 
	OR company LIKE '%".$search."%' 
	
	";
}
else
{
	$query = "
	SELECT * FROM product_info ORDER BY product_id";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
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
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>