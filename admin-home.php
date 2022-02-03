<?php
session_start();

if (isset($_SESSION["in-admin"]) !== true) {
	# code...
	header("location: login.php");
}
require 'all.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page - Home</title>
	<link rel="stylesheet" type="text/css" href="style/dash-style.css">
</head>
<body>
	<!-- header -->
	<?php include 'include/header.php'; ?>

	<!-- content -->
	<div class="content">
		<div class="countUsers">
			<table border="0" width="100%">
				<tr>
					<td colspan="2" height="45px"><p>Active Account</p></td>
				</tr>
				<tr>
					<td width="45%"><img width="40px;" src="pics/icons.png"></td>
					<td width="55%"><?php echo countUsers(); ?></td>
				</tr>
			</table>
		</div>
		<div class="countItems">
			<table border="0" width="100%">
				<tr>
					<td colspan="2" height="45px"><p>Items Available</p></td>
				</tr>
				<tr>
					<td width="45%"><img width="40px;" src="pics/phone.png"></td>
					<td width="55%"><?php echo countItems(); ?></td>
				</tr>
			</table>
		</div>
		<div class="countTrans">
			<table border="0" width="100%">
				<tr>
					<td colspan="2" height="45px"><p>Transactions Added</p></td>
				</tr>
				<tr>
					<td width="45%"><img width="40px;" src="pics/shop.png"></td>
					<td width="55%"><?php echo countTrans(); ?></td>
				</tr>
			</table>
		</div>
	</div>

	<!-- footer -->
	<?php include 'include/footer.php'; ?>
</body>
</html>