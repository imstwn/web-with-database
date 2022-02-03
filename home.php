<?php
session_start();
if (!isset($_SESSION["in-user"])) {
	# code...
	header("location: login.php");
}

require 'all.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style/dash-style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
</head>
<body>
	<?php include 'include/header-user.php'; ?>
	<div class="layout">
		<div class="titles">Our Products</div>
		<div>
			<img width="100%" src="pics/smartphones.jpg">
		</div>
		<div class="titles">Introducing Samsung Galaxy S21 Ultra</div>
		<div class="outter">
			<div class="intro">
				<img width="100%" src="pics/s21b.jpg">
			</div>
			<div class="desc">
				In mid-January 2021, Samsung will release the Galaxy S21 series, with the S21 Ultra (SM-G998) as the new top model. This smartphone will offer improved specs, including an updated camera system that will be completely redesigned, both in terms of design and functionality. For the first time Samsung will make an S-series smartphone compatible with the S Pen (EJ-PG998). This stylus pen has been the main feature of the Galaxy Note series for years and will now also be made available as an optional accessory for the Samsung Galaxy S21 Ultra.
				Based on the latest information, LetsGoDigital, together with the talented Italian graphic designer Giuseppe Spinelli has created a new set of product renders of the Samsung S21 Ultra with S Pen.
			</div>
		</div>
		<div class="titlesA">Specs of the Galaxy S21 Ultra 5G</div>
		<div class="outterA">
			<div class="descA">The Samsung S21 Ultra is equipped with a 6.8-inch QHD+ curved OLED display with an adaptive 120 Hertz refresh rate. A hole is made in the display for the selfie camera, the hole-punch camera most likely offers a resolution of 40 megapixels – comparable to the S20 Ultra. The camera system at the rear is completely redesigned. It contains a renewed 108 megapixel main camera, a 12 megapixel ultra-wide angle camera, a 10 megapixel telephoto camera with 10x zoom and finally a 10 megapixel telephoto camera with 3x zoom. In addition a laser AF sensor will be integrated, comparable to the one used in the Note 20 series. The European's will be powered by Samsung’s Exynos 2100.</div>
			<div class="introA"><img width="100%" src="pics/s21p.jpg"></div>
		</div>
		
		<div class="titles">Phantom Brown and Phantom Blue</div>
			<div class="lay">
				<div class="introB"><img src="pics/s21bl.jpg"></div>
			</div>
		</div>
	</div>
	<?php include 'include/footer.php'; ?>
</body>
</html>