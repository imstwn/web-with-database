<?php
require 'all.php';
if (isset($_POST["login"])) {
	# code...
	login($_POST);
}
$id =$_GET['id_tr'];
$query = "DELETE FROM transaction WHERE id_tr = $id";
$delete = mysqli_query($conn,$query);
if (!$delete) {
	echo "<script>alert('Delete Data Failed')</script>";
}
else{
	echo "<script>alert('Delete Data Successfull')</script>";
	header("location: admin-transaction.php");
}
?>