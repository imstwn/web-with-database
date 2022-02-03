<?php
require 'all.php';
if (isset($_POST["login"])) {
	# code...
	login($_POST);
}
$id =$_GET['id_item'];
$query = "DELETE FROM item WHERE id_item = $id";
$delete = mysqli_query($conn,$query);
if (!$delete) {
	echo "<script>alert('Delete Data Failed')</script>";
}
else{
	echo "<script>alert('Delete Data Successfull')</script>";
	header("location: admin-item.php");
}
?>