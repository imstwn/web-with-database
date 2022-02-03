<?php

require 'all.php';
if (isset($_POST["login"])) {
	# code...
	login($_POST);
}

$id =$_GET['id_user'];

$query = "DELETE FROM users WHERE id_user = '$id'";

$delete = mysqli_query($conn,$query);
if (!$delete) {
	echo "<script>alert('Delete Data Failed')</script>";
}
else{
	echo "<script>alert('Delete Data Successfull')</script>";
	header("location: admin-user.php");
}

?>