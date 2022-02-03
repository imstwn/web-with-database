<?php

require 'all.php';
if (isset($_POST["signup"])) {
	# code...
	reg($_POST);
		# code...
	echo "<script>alert('You Have an Account Now, Please Login');</script>";
	header("Location: login.php");
	exit(0);

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital@1&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main-div-register">
		<h2>Register an Account</h2>
		<form action="" method="post">
			<div class="usernameReg">
				<input type="text" name="username" id="username" autocomplete="off" placeholder="Username">
			</div>
			<div class="email">
				<input type="text" name="email" id="email" autocomplete="off" placeholder="Email">
			</div>
			<div class="passwordReg-a">
				<input type="password" name="password" id="password" placeholder="Password">
			</div>
			<div class="passwordReg-b">
				<input type="password" name="password2" id="password2" placeholder="Confirm Password">
			</div>
			<div class="sign-up">
				<input type="submit" name="signup" value="Create Account">
				<p>Already has an account? <span><a href="login.php">Login Here?</a></span></p>
			</div>
		</form>
	</div>
</body>
</html>