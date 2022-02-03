<?php
session_start();

if (isset($_SESSION["in-admin"]) !== true) {
	# code...
	header("location: login.php");
}
require 'all.php';
if (isset($_POST["submit"])) {
	# code...
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page - Transaction</title>
	<link rel="stylesheet" type="text/css" href="style/dash-style.css">
	<link rel="stylesheet" type="text/css" href="style/admin-style.css">
</head>
<body>
	<!-- header -->
	<?php include 'include/header.php'; ?>

	<!-- content -->
	<div class="content">
		<div class="contentTransaction">
			<p align="center">Transactions have been made, DO NOT DELETE any transactions</p>
			<div>	
				<table width="100%" border="1"  class="TransTable">
					<tr>
						<th>ID Trans</th>
						<th>ID User</th>
						<th>ID Item</th>
						<th>Amount</th>
						<th>Address</th>
						<th>Total</th>
						<th>Action</th>
					</tr>
					<?php
						$halaman = 4;
						$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
						$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

						$result = mysqli_query($conn, "SELECT * FROM transaction");
						$total = mysqli_num_rows($result);
						$pages = ceil($total/$halaman);
						$query = mysqli_query($conn, "SELECT * FROM transaction LIMIT $mulai, $halaman") or die(mysql_error);

						$no = $mulai+1;

						while ($data = mysqli_fetch_assoc($query))
					{ ?>
						<tr>
							<td><?php echo $data['id_tr']; ?></td>
							<td><?php echo $data['id_user']; ?></td>
							<td><?php echo $data['id_item']; ?></td>
							<td><?php echo $data['amount']; ?></td>
							<td><?php echo $data['address']; ?></td>
							<td><?php echo $data['total']; ?></td>
							<td class="action"><a href="delete-trans.php?id_tr=<?=$data['id_tr'];?>">Delete</a>
				 			</td>
						</tr>	
						
						<?php } ?>
				</table>

				<div class="paging">
					<?php for ($i=1; $i <= $pages ; $i++) { ?>
					<a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

	<!-- footer -->
	<?php include 'include/footer.php'; ?>
</body>
</html>