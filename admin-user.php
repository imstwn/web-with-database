<?php
session_start();

if (isset($_SESSION["in-admin"]) !== true) {
	# code...
	header("location: login.php");
}

require 'all.php';
if (isset($_POST["submit"])) {
	# code...
	if (reg($_POST) > 0) {
		# code...
		echo "<script>alert('Account Created');</script>";
	} else {
		# code...
		echo mysqli_error($conn);
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page - User</title>
	<link rel="stylesheet" type="text/css" href="style/dash-style.css">
	<link rel="stylesheet" type="text/css" href="style/admin-style.css">
</head>
<body>
	<!-- header -->
	<?php include 'include/header.php'; ?>

	<!-- content -->
	<div class="contentUser">
		<div class="contentAddUser">
			<p>Add User</p>
			<form action="" method="post">
				<table>
					<tr>
						<td><label for="username">Username</label></td>
						<td><input type="username" name="username" id="username"></td>
						<td><label for="email">Email</label></td>
						<td><input type="email" name="email" id="email"></td>
						<td colspan="2" rowspan="2" width="10%">
							<button type="submit" name="submit">Add User</button>
						</td>
					</tr>
					<tr>
						<td><label for="password">Password</label></td>
						<td><input type="password" name="password" id="password"></td>
						<td><label for="password2">Password</label></td>
						<td><input type="password" name="password2" id="password2"></td>
					</tr>
				</table>
			</form>
		</div>
		<table width="100%" border="1" class="UserTable">
			<tr>
				<th>ID USER</th>
				<th>USERNAME</th>
				<th>EMAIL</th>
				<th>PASSWORD</th>
				<th>Action</th>
			</tr>
			<?php
				$halaman = 10;
				$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
				$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

				$result = mysqli_query($conn, "SELECT * FROM users");
				$total = mysqli_num_rows($result);
				$pages = ceil($total/$halaman);
				$query = mysqli_query($conn, "SELECT * FROM users LIMIT $mulai, $halaman") or die(mysql_error);

				$no = $mulai+1;

				while ($data = mysqli_fetch_assoc($query))
			{ ?>
				<tr>
					<td class="id-user"><?php echo $data['id_user']; ?></td>
					<td><?php echo $data['username']; ?></td>
					<td><?php echo $data['email']; ?></td>
					<td><?php echo $data['password']; ?></td>
					<td class="action"><a href="delete.php?id_user=<?=$data['id_user'];?>">Delete</a>
		 			<a href="edit.php?id_user=<?=$data['id_user'];?>">Edit</a></td>
				</tr>	
				
				<?php } ?>
		</table>

		<div class="paging">
			<?php for ($i=1; $i <= $pages ; $i++) { ?>
			<a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
			<?php } ?>
		</div>
	</div>

	<!-- footer -->
	<?php include 'include/footer.php'; ?>
</body>
</html>