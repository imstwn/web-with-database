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
	<title>Products</title>
	<link rel="stylesheet" type="text/css" href="style/dash-style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
</head>
<body>
	<?php include 'include/header-user.php'; ?>
	<div class="layoutProduct">
		<div class="inside">
			<p>For Sale</p>
			<?php
				$halaman = 5;
				$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
				$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

				$result = mysqli_query($conn, "SELECT * FROM item");
				$total = mysqli_num_rows($result);
				$pages = ceil($total/$halaman);
				$query = mysqli_query($conn, "SELECT * FROM item LIMIT $mulai, $halaman") or die(mysql_error);
				$no = $mulai+1;
				$i = 1;
				?>
				<form action="" method="post">
				<table width="100%">
				<?php while ($data = mysqli_fetch_assoc($query))
			{ ?>
				<tr>
					<td rowspan="4" width="20%" class="centerimg"><?php echo '<img width="150px" src="data:image/jpeg;base64,'.base64_encode( $data['img_item'] ).'"/>'; ?></td>
					<td class="nameitem"><?= $data["name_item"]; ?></td>
				</tr>
				<tr>
					<td class="tabShowPrice"><?= $data["price_item"]; ?><p><?= $data["code_item"]; ?></p></td>
				</tr>
				<tr>
					<td height="100px" class="A"><?= $data["desc_item"]; ?></td>
				<tr>
					<td class="tabShow"><button type="submit" name="buy"><a href="buy.php?id_item=<?=$data['id_item'];?>">Buy Now</a></button></td>
				</tr>
			
				<?php } ?>
			</table>
			</form>
			<div class="paging">
			<?php for ($i=1; $i <= $pages ; $i++) { ?>
			<a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
			<?php } ?>
			</div>
		</div>
</div>
	<?php include 'include/footer.php'; ?>
</body>
</html>