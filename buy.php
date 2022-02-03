<?php
session_start();
if (!isset($_SESSION["in-user"])) {
	# code...
	header("location: login.php");
}

require 'all.php';
if (isset($_POST["continue"])) {
	# code...
	if (isset($_POST['amount'])) {
		# code...
		$id = $_GET['id_item'];
		$amount = $_POST['amount'];
		$address = $_POST['address'];
		$username = $_SESSION["username"];
		$usersql = "SELECT * FROM users WHERE username = '$username'";
		$itemsql = "SELECT * FROM item WHERE id_item = '$id'";

		$us = mysqli_query($conn, $usersql);
		$pr = mysqli_query($conn, $itemsql);

		$rowow = $us->fetch_assoc();
		$t = $rowow['id_user'];

		$row2 = mysqli_fetch_row($pr);
		$base_pay = $row2[4];

		$total = $base_pay * $amount;

		$transql = "INSERT INTO `transaction` (`id_tr`, `id_user`, `id_item`, `amount`, `address`, `total`) VALUES (NULL,'$t','$id','$amount','$address','$total')";

		$end = mysqli_query($conn, $transql);
		if (!$end) {
			# code...
			echo "<script>alert('Pembelian Gagal')</script>";
		} else {
			echo "<script>alert('Pembelian Berhasil')</script>";
		}
		// echo "$t<br>";
		// echo "$id<br>";
		// echo "$amount<br>";
		// echo "$address<br>";
		// echo "$total<br>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Purchasement</title>
	<link rel="stylesheet" type="text/css" href="style/dash-style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
</head>
<body>
	<?php include 'include/header-user.php'; ?>
	<div class="layoutBuy">
		<div class="inside">
			<p>For Sale</p>
			<?php
				$id = $_GET["id_item"];
				$result = mysqli_query($conn, "SELECT * FROM item WHERE id_item = $id");
				 $row = $result->fetch_row();
			?>
				
				<table width="100%">
				<tr>
					<td rowspan="5" width="20%" class="centerimg"><?php echo '<img width="150px" src="data:image/jpeg;base64,'.base64_encode( $row[3] ).'"/>'; ?></td>
					<td class="nameitem"><?= $row[2]; ?></td>
				</tr>
				<tr>
					<td class="tabShowPrice"><?= $row[4]; ?><p><?= $row[1]; ?></p></td>
				</tr>
				<tr>
					<td height="100px" class="A"><?= $row[5]; ?></td>
				
			</table>
			<form action="" method="post">
			<table class="inbuy" width="200px;">
				<tr>
					<td class="tabShow">Amount :<input type="number" name="amount"></td>
				</tr>
				</tr>
					<td class="inputaddress">Address :<input type="text" name="address"></td>
				</tr>
				<tr>
					<td class="tabShow"><button type="submit" name="continue">Buy Now!!</button></td>
				</tr>
			</table>
			</form>
		</div>
</div>
	<?php include 'include/footer.php'; ?>
</body>
</html>