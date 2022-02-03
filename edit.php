<?php
session_start();

if (isset($_SESSION["in-admin"]) !== true) {
	# code...
	header("location: login.php");
}

require 'all.php';

$id = $_GET['id_user'];
$query = "SELECT * FROM users WHERE id_user='$id'"; 

$tampil = mysqli_query($conn, $query);
$a = "";
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password = password_hash($password, PASSWORD_DEFAULT);
	//Query edit data
	$query2 = "UPDATE `users` SET `username`='$username',`email`='$email',`password`='$password' WHERE `id_user`='$id'";

	$ubah = mysqli_query($conn,$query2);
	 
	if (!$ubah) {
		echo "<script>alert('Edit Data Failed,')</script>";
	}
	else{
		echo "<script>alert('Edit Success')</script>";
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style/dash-style.css">
	<link rel="stylesheet" type="text/css" href="style/admin-style.css">
</head>
<body>
	<!-- header -->
	<?php include 'include/header.php'; ?>

	<!-- content -->
	<div class="contentB">
		<?php while ($show = mysqli_fetch_array($tampil)) { ?>
			<div class="editUser">
				<p>Edit User</p>
				<form action="" method="post">
					<table width="100%">
						<tr>
							<td height="50px"><label for="username">Username</label></td>
							<td><input type="username" name="username" id="username" value="<?=$show['username']?>"></td>
							<td><label for="email">Email</label></td>
							<td><input type="email" name="email" id="email" value="<?=$show['email']?>"></td>
							<td colspan="2" rowspan="2" width="10%" align="center">
								<button type="submit" name="submit">Edit User</button>
							</td>
						</tr>
						<tr>
							<td height="50px"><label for="password">Password</label></td>
							<td colspan="3"><input type="password" name="password" id="password" value="<?=$show['password']?>"></td>
						</tr>
					</table>
				</form>
			</div>
			<button name="" class="adddata" onclick="window.location.href='admin-user.php'">Back</button>
	<p><?php echo $a ?></p>
	<?php } ?>
	</div>
	
	<!-- footer -->
	<?php include 'include/footer.php'; ?>
</body>
</html>