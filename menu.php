<?php
session_start();
require('./php/dbconfig.php');

if (isset($_POST["atc"])) {
	if (isset($_SESSION["cart"])) {
		if (isset($_SESSION["cart"][$_POST["id"]])) {
			$_SESSION["cart"][$_POST["id"]]["quantity"]++;
			
		} else {
			$_SESSION["cart"][$_POST["id"]] = array("name" => $_POST["pname"], "price" => $_POST["price"], "quantity" => 1, "image" => $_POST["image"], "id" => $_POST["id"]);
			
		}
	} else {
		$_SESSION["cart"] = array($_POST["id"] => array("name" => $_POST["pname"], "price" => $_POST["price"], "quantity" => 1, "image" => $_POST["image"], "id" => $_POST["id"]));
		
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Bake n' Take</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

	<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/aos.css">

	<link rel="stylesheet" href="css/ionicons.min.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">


	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.html">Bake N' Take</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>
			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
					<li class="nav-item active"><a href="menu.html" class="nav-link">Menu</a></li>
					<li class="nav-item"><a href="about.html" class="nav-link">About Us</a></li>
					<li class="nav-item dropdown">
					</li>
					<li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
					<li class="nav-item cart class=" icon icon-person"><a href="account.html" class="nav-link"><span class="icon icon-person"></span><span class=" d-flex justify-content-center align-items-center">

					<li class="nav-item cart"><a href="cart.php" class="nav-link"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center">
								<small><?php
										if (isset($_SESSION["cart"])) {
											echo count($_SESSION["cart"]);
										} else {
											echo "0";
										}
										?></small>
							</span></a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->

	<section class="home-slider owl-carousel">

		<div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center">

					<div class="col-md-7 col-sm-12 text-center ftco-animate">
						<h1 class="mb-3 mt-5 bread">Our Menu</h1>
						<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Menu</span></p>
					</div>

				</div>
			</div>
		</div>
	</section>

	<section class="ftco-intro">
		<div class="container-wrap">
			<div class="wrap d-md-flex align-items-xl-end">
				<div class="info">
					<div class="row no-gutters">
						<div class="col-md-4 d-flex ftco-animate">
							<div class="icon"><span class="icon-phone"></span></div>
							<div class="text">
								<h3>(+91)8200771779</h3>
								<p>Contact us on our helpline number for any help.</p>
							</div>
						</div>
						<div class="col-md-4 d-flex ftco-animate">
							<div class="icon"><span class="icon-my_location"></span></div>
							<div class="text">
								<h3>A-25 sarthi Avenue</h3>
								<p> Ramdevnager Cross Road,Sattalite,
									Ahemdabad,Gujrat</p>
							</div>
						</div>
						<div class="col-md-4 d-flex ftco-animate">
							<div class="icon"><span class="icon-clock-o"></span></div>
							<div class="text">
								<h3>Open Monday-Sunday</h3>
								<p>8:00am - 9:00pm</p>
							</div>
						</div>
					</div>
				</div>
				<div class="book p-4">
					<h3>Schedule a Meeting</h3>
					<form action="#" class="appointment-form">
						<div class="d-md-flex">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="First Name">
							</div>
							<div class="form-group ml-md-4">
								<input type="text" class="form-control" placeholder="Last Name">
							</div>
						</div>
						<div class="d-md-flex">
							<div class="form-group">
								<div class="input-wrap">
									<div class="icon"><span class="ion-md-calendar"></span></div>
									<input type="text" class="form-control appointment_date" placeholder="Date">
								</div>
							</div>
							<div class="form-group ml-md-4">
								<div class="input-wrap">
									<div class="icon"><span class="ion-ios-clock"></span></div>
									<input type="text" class="form-control appointment_time" placeholder="Time">
								</div>
							</div>
							<div class="form-group ml-md-4">
								<input type="text" class="form-control" placeholder="Phone">
							</div>
						</div>
						<div class="d-md-flex">
							<div class="form-group">
								<textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
							</div>
							<div class="form-group ml-md-4">
								<input type="submit" value="Send" class="btn btn-white py-3 px-4">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-menu mb-5 pb-5">
		<div class="container">
			<div class="row justify-content-center mb-5">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<span class="subheading">Discover</span>
					<h2 class="mb-4">Our Products</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
				</div>
			</div>
			<div class="row d-md-flex">
				<div class="col-lg-12 ftco-animate p-md-5">
					<div class="row">
						<div class="col-md-12 nav-link-wrap mb-5">
							<div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
								<a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">CAKES</a>

								<a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">PASTRY</a>
							</div>
						</div>
						<div class="col-md-12 d-flex align-items-center">

							<div class="tab-content ftco-animate" id="v-pills-tabContent">

								<div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
									<div class="row">
										<?php

										$sql = "SELECT * FROM Products WHERE id <=13";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while ($row = $result->fetch_assoc()) {
										?>

												<div class="col-md-4 text-center">
													<form class="menu-wrap" method="post">
														<a href="#" class="menu-img img mb-4" style="background-image: url(images/<?php echo $row["Image"] ?>);"></a>
														<div class="text">
															<input type="hidden" value="<?php echo $row["Id"]; ?>" name="id">
															<input type="hidden" value="<?php echo $row["ProductName"]; ?>" name="pname">
															<input type="hidden" value="<?php echo $row["Price"]; ?>" name="price">
															<input type="hidden" value="<?php echo $row["Image"]; ?>" name="image">
															<h3><a href="#"><?php echo $row["ProductName"]; ?></a></h3>
															<p><?php echo $row["Description"]; ?></p>
															<p class="price"><span>₹<?php echo $row["Price"]; ?></span></p>
															<p><input type="submit" class="btn btn-primary btn-outline-primary" name="atc" value="Add To Cart"></p>
														</div>
													</form>
												</div>
										<?php
											}
										}
										?>
										<!----------------------------------------- aa experiment mate no end che --------------------------------->
									</div>
								</div>


								<!--------------------------------- AA pastery mate no section che   -------------------------------------->

								<div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
									<div class="row">

										<?php

										$sql = "SELECT * FROM Products WHERE id >=13";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while ($row = $result->fetch_assoc()) {
										?>
												<div class="col-md-4 text-center">
													<form class="menu-wrap" method="post">
														<a href="#" class="menu-img img mb-4" style="background-image: url(images/<?php echo $row["Image"] ?>);"></a>
														<div class="text">
															<input type="hidden" value="<?php echo $row["Id"]; ?>" name="id">
															<input type="hidden" value="<?php echo $row["ProductName"]; ?>" name="pname">
															<input type="hidden" value="<?php echo $row["Price"]; ?>" name="price">
															<input type="hidden" value="<?php echo $row["Image"]; ?>" name="image">
															<h3><a href="#"><?php echo $row["ProductName"]; ?></a></h3>
															<p><?php echo $row["Description"]; ?></p>
															<p class="price"><span>₹<?php echo $row["Price"]; ?></span></p>
															<p><input type="submit" class="btn btn-primary btn-outline-primary" name="atc" value="Add To Cart"></p>
														</div>
													</form>
												</div>
										       <?php
											    }
										        }
										       ?>
										
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<footer class="ftco-footer ftco-section img">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-3 col-md-9 mb-9 mb-md-5">
            <div class="ftco-footer-widget mb-8">
              <h2 class="ftco-heading-2">About Us</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          
          <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
             <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="index.html" class="py-2 d-block">Home</a></li>
                <li><a href="about.html" class="py-2 d-block">About Us</a></li>
                <li><a href="contact.html" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">A-205 Akshat Avenue Ramdevnagar Cross Road Ahemdabad</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+91 82007 71779</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@bakentake.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This website is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="#">Divyrajsinh</a>
          </div>
        </div>
      </div>
    </footer>



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
		</svg></div>


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/jquery.timepicker.min.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>

</body>

</html>