<?php
session_start();
require('./php/dbconfig.php');

if (isset($_POST["add"]) && isset($_SESSION["cart"])) {
	
	$_SESSION["cart"][$_POST["id"]]["quantity"]++;
	
} elseif (isset($_POST["remove"]) && isset($_SESSION["cart"])) {
	echo "Remove";
	if ($_SESSION["cart"][$_POST["id"]]["quantity"] <= 1) {
	} else {
		$_SESSION["cart"][$_POST["id"]]["quantity"]--;
	}
	
} elseif (isset($_POST["close"])) {
	unset($_SESSION["cart"][$_POST["id"]]);
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Bake N' Take'</title>
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
	          <li class="nav-item"><a href="menu.php" class="nav-link">Menu</a></li>
	          <li class="nav-item"><a href="about.html" class="nav-link">About Us</a></li>
	          <li class="nav-item dropdown">
            </li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
			  <li class="nav-item cart class="icon icon-person"><a href="account.html" class="nav-link"><span class="icon icon-person"></span><span class=" d-flex justify-content-center align-items-center">

	          <li class="nav-item cart"><a href="cart.php" class="nav-link"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small>0</small></span></a></li>
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
						<h1 class="mb-3 mt-5 bread">Cart</h1>
						<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
					</div>

				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-cart">
		<div class="container">
			<div class="row">
				<div class="col-md-12 ftco-animate">
					<div class="cart-list">
						<table class="table">
							<thead class="thead-primary">
								<tr class="text-center">
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>Product</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>

								<form method="post">
									<?php
									if (isset($_SESSION["cart"])) {
										foreach ($_SESSION["cart"] as $item) {
									?>
											<tr class="text-center">
												<td class="product-remove">
													<button type="submit" name="close">
														<i class="icon-close"></i>
													</button>
												</td>

												<td class="image-prod">
													<div class="img" style="background-image:url(images/<?php echo $item["image"]; ?>);"></div>
												</td>

												<td class="product-name">
													<h3><?php echo $item["name"]; ?></h3>
												</td>

												<td class="price">₹<?php echo $item["price"]; ?></td>

												<td class="quantity">
													<div class="input-group mb-3">
														<span class="input-group-btn mr-2">

															<!-- <input type="submit" class="quantity-right-plus btn icon-minus" name="remove"> -->
															<button type="submit" class="quantity-left-minus btn" name="remove" data-type="minus" data-field="">
																<i class="icon-minus"></i>
															</button>
														</span>
														<input type="hidden" name="id" value="<?php echo $item["id"]; ?>">
														<input type="text" id="quantity" name="quantity" class="form-control input-number" value="<?php echo $item["quantity"] ?>" min="1" max="100">
														<span class="input-group-btn ml-2">
															<!-- <input type="submit" class="quantity-right-plus btn icon-plus" name="add"> -->
															<button type="submit" class="quantity-right-plus btn" name="add" data-type="plus" data-field="">
																<i class="icon-plus"></i>
															</button>
														</span>
														<!-- <input type="text" name="quantity" class="quantity form-control input-number" value="<?php //echo $item["quantity"] 
																																					?>" min="1" max="100"> -->
													</div>
												</td>
												<td class="total"><?php echo $item["price"] * $item["quantity"] ?></td>
										<?php
										}
									}
										?>
											

								</form>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row justify-content-end">
				<div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
				<form method="post" action="./php/order.php">
					<div class="cart-total mb-3">
						<h3>Cart Totals</h3>
						<p class="d-flex">
							<span>Subtotal</span>
							<span>₹
								<?php if (isset($_SESSION["cart"])) {
									$total = 0;
									foreach ($_SESSION["cart"] as $item) {
										$total += $item["price"] * $item["quantity"];
									}
									$_SESSION["total"] = $total;
									echo $total;
								}
								?>
							</span>
						</p>
							<p class="d-flex">
								<span>Delivery</span>
								<span>₹10.00</span>
							</p>
							<hr>
							<p class="d-flex total-price">
								<span>Total</span>
								<span><?php
										$_SESSION["total"] += 10;
										echo $_SESSION["total"]; ?></span>
							</p>
					</div>
					<p class="text-center"><input type="submit" class="btn btn-primary py-3 px-4" value="Checkout"></p>
				</form>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 heading-section ftco-animate text-center">
					<span class="subheading">Discover</span>
					<h2 class="mb-4">Related products</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="menu-entry">
						<a href="#" class="img" style="background-image: url(images/menu-1.jpg);"></a>
						<div class="text text-center pt-4">
							<h3><a href="#">Coffee Capuccino</a></h3>
							<p>A small river named Duden flows by their place and supplies</p>
							<p class="price"><span>$5.90</span></p>
							<p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="menu-entry">
						<a href="#" class="img" style="background-image: url(images/menu-2.jpg);"></a>
						<div class="text text-center pt-4">
							<h3><a href="#">Coffee Capuccino</a></h3>
							<p>A small river named Duden flows by their place and supplies</p>
							<p class="price"><span>$5.90</span></p>
							<p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="menu-entry">
						<a href="#" class="img" style="background-image: url(images/menu-3.jpg);"></a>
						<div class="text text-center pt-4">
							<h3><a href="#">Coffee Capuccino</a></h3>
							<p>A small river named Duden flows by their place and supplies</p>
							<p class="price"><span>$5.90</span></p>
							<p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="menu-entry">
						<a href="#" class="img" style="background-image: url(images/menu-4.jpg);"></a>
						<div class="text text-center pt-4">
							<h3><a href="#">Coffee Capuccino</a></h3>
							<p>A small river named Duden flows by their place and supplies</p>
							<p class="price"><span>$5.90</span></p>
							<p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
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
                <li><a href="menu.php" class="py-2 d-block">Menu</a></li>
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