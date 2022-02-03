<?php
require 'all.php';
if (isset($_POST["login"])) {
	# code...
	login($_POST);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital@1&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main-div-login">
		<h2>Login</h2>
		<form action="" method="post">
			<div class="username">
				<input type="text" name="username" id="username" autocomplete="off" placeholder="Username">
			</div>
			<div class="password">
				<input type="password" name="password" id="password" placeholder="Password">
			</div>
			<div class="sign-in">
				<input type="submit" name="login" value="Login">
				<p><a href="#">Forgotten Password?</a> <span>or</span> <span><a href="register.php">New Here?</a></span></p>
			</div>
		</form>
	</div>
</body>
</html>