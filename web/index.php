<!DOCTYPE html>
<html lang="en">
<head>
	<title>Local Loop</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="assetsV1/images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assetsV1/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assetsV1/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assetsV1/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assetsV1/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assetsV1/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assetsV1/css/util.css">
	<link rel="stylesheet" type="text/css" href="assetsV1/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<!--  -->
	<div class="simpleslide100">
		<div class="simpleslide100-item bg-img1" style="background-image: url('assetsV1/images/bg01.jpg');"></div>
		<div class="simpleslide100-item bg-img1" style="background-image: url('assetsV1/images/bg02.jpg');"></div>
		<div class="simpleslide100-item bg-img1" style="background-image: url('assetsV1/images/bg03.jpg');"></div>
		<div class="simpleslide100-item bg-img1" style="background-image: url('assetsV1/images/bg04.jpg');"></div>
		<div class="simpleslide100-item bg-img1" style="background-image: url('assetsV1/images/bg06.jpg');"></div>
		<div class="simpleslide100-item bg-img1" style="background-image: url('assetsV1/images/bg05.jpg');"></div>
		<div class="simpleslide100-item bg-img1" style="background-image: url('assetsV1/images/bg07.jpg');"></div>
		<div class="simpleslide100-item bg-img1" style="background-image: url('assetsV1/images/bg08.jpg');"></div>
	</div>

	<div class="flex-col-c-sb size1 overlay1 p-l-75 p-r-75 p-t-20 p-b-40 p-lr-15-sm">
		<!--  -->
		<div class="w-full flex-w flex-sb-m">
			<div class="wrappic1 m-r-30 m-t-10 m-b-10">
				<a href="#"><img src="assetsV1/images/icons/logo.png" alt="LOGO"></a>
			</div>

			<div class="flex-w cd100 p-t-15 p-b-15 p-r-36">
				<div class="flex-w flex-b m-r-22 m-t-8 m-b-8">
					<span class="l1-txt1 wsize1 days">35</span>
					<span class="m1-txt1 p-b-2">Days</span>
				</div>

				<div class="flex-w flex-b m-r-22 m-t-8 m-b-8">
					<span class="l1-txt1 wsize1 hours">17</span>
					<span class="m1-txt1 p-b-2">Hr</span>
				</div>

				<div class="flex-w flex-b m-r-22 m-t-8 m-b-8">
					<span class="l1-txt1 wsize1 minutes">50</span>
					<span class="m1-txt1 p-b-2">Min</span>
				</div>

				<div class="flex-w flex-b m-r-22 m-t-8 m-b-8">
					<span class="l1-txt1 wsize1 seconds">39</span>
					<span class="m1-txt1 p-b-2">Sec</span>
				</div>
			</div>

			<div class="m-t-10 m-b-10">
				<a data-toggle="modal" href="#myModal" class="size2 s1-txt1 flex-c-m how-btn1 trans-04">
					About
				</a>
			</div>
		</div>
	    		

		<!--  -->
		<div class="flex-col-c-m p-l-15 p-r-15 p-t-80 p-b-90">
			<h3 class="l1-txt2 txt-center p-b-55 respon1">
				Coming Soon
			</h3>

			<div>
				<button data-toggle="modal" data-target="#exampleModalCenter" class="how-btn-play1 flex-c-m">
					<i class="zmdi zmdi-play"></i>
				</button>
			</div>
		</div>
		
		<div class="flex-sb-m flex-w w-full">
			<!--  -->
			<div class="flex-w flex-c-m m-t-10 m-b-10">
				<a href="https://mindwebs.org" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-3 m-t-3">
					<i class="fa fa-globe"></i>
				</a>
				
				<a href="https://www.facebook.com/mindwebs" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-3 m-t-3">
					<i class="fa fa-facebook"></i>
				</a>

				<a href="#" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-3 m-t-3">
					<i class="fa fa-twitter"></i>
				</a>

				<a href="#" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-3 m-t-3">
					<i class="fa fa-youtube-play"></i>
				</a>
			</div>

			<form class="contact100-form validate-form m-t-10 m-b-10" method="post">
				<div class="wrap-input100 validate-input m-lr-auto-lg" data-validate = "Email is required: ex@abc.xyz">
					<input class="s2-txt1 placeholder0 input100 trans-04" type="text" name="email" placeholder="Email Address">

					<button class="flex-c-m ab-t-r size4 s1-txt1 hov1">
						<i class="zmdi zmdi-long-arrow-right fs-16 cl1 trans-04"></i>
					</button>
				</div>		
			</form>
		</div>
	</div>
	
	
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" style="z-index:5000">
  <div class="modal-dialog modal-dialog-scrollable">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title">About <strong>Local Loop</strong></h4>
      </div>
      <div class="modal-body">
		<br />  
        <p>Finding Product Online is very easy nowadays, but when we shop offline, getting the same product at the same price bracket is tough as Online Requires Less Handling And Hand Transfer Costs than offline. But this is not the only problem faced by Customers Shopping offline, there are certain other dilemmas and insisted confusion created by the sellers or the shopkeepers so as to make the customer blindly purchase the product.</p>
		<br />
		<p>Even if the quality and product standard are judged by the hands and eyes of the customer, it’s not easy to know how better the product performs in the long run. Or what are the experiences of the other customer in using that product. So for the Same, We are up with an APP That solves all these certain Problems, by providing reviews, data from online sites and the product and shop experience by other customers instantly, as the user points the camera at the product stand in any shop or mall.
		</p>
		<br />
		<p>
		  So, We four Engineers from <strong>Kalyani Government Engineering College</strong>, came up with Local Loop, an innovative way to see product reviews when bought offline even. <br />
			<ol>
		  		<li>1. Dipan Roy</li>
				<li>2. Abhinav Ghosh</li>
				<li>3. Sayantan Saha</li>
				<li>4. Ayan Bag</li>
		  	</ol>
		</p>
		<br />
		<p>
			Our WEB-APP will go live on 9th June, 2019. Please bear with us till then, and keep checking this place for updates. <br /><br />- Local Loop Team &hearts; 
		</p>
		  
      </div>
      <div class="modal-footer">
	  	<button type="button" class="btn btn-warning" data-dismiss="modal">Thank You!</button>
	  </div>
    </div>

  </div>
</div>	  
<!-- Designer Modal -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">

  <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
  <div class="modal-dialog modal-dialog-centered" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Get Started</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>We are launching on <strong>9th June, 2019</strong>. Stay Tuned!</p>
		<br />
		<p>- Local Loop Team &hearts;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">OKAY</button>
      </div>
    </div>
  </div>
</div>	

	

<!--===============================================================================================-->	
	<script src="assetsV1/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assetsV1/vendor/bootstrap/js/popper.js"></script>
	<script src="assetsV1/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assetsV1/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assetsV1/vendor/countdowntime/moment.min.js"></script>
	<script src="assetsV1/vendor/countdowntime/moment-timezone.min.js"></script>
	<script src="assetsV1/vendor/countdowntime/moment-timezone-with-data.min.js"></script>
	<script src="assetsV1/vendor/countdowntime/countdowntime.js"></script>
	<script>
		$('.cd100').countdown100({
			/*Set Endtime here*/
			/*Endtime must be > current time*/
			endtimeYear: 0,
			endtimeMonth: 0,
			endtimeDate: 35,
			endtimeHours: 19,
			endtimeMinutes: 0,
			endtimeSeconds: 0,
			timeZone: "" 
			// ex:  timeZone: "America/New_York"
			//go to " http://momentjs.com/timezone/ " to get timezone
		});
	</script>
<!--===============================================================================================-->
	<script src="assetsV1/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="assetsV1/js/main.js"></script>

</body>
</html>