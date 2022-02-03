<?php
session_start();

if (isset($_SESSION["in-admin"]) !== true) {
	# code...
	header("location: login.php");
}
require 'all.php';

if(isset($_POST['submit'])) {
    if (!empty($_POST['nama']) || !empty($_POST['email'])) {
    	# code...
    	$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
    	$code = $_POST["code"];
   		$name = $_POST["nama"];
    	$price = $_POST["price"];
    	$desc = $_POST["desc"];
    	$merk = $_POST["merk"];

    	$query = "INSERT INTO `item`(`code_item`, `name_item`, `img_item`, `price_item`, `desc_item`, `merk_item`) VALUES ('$code','$name','$image','$price','$desc','$merk')";
    	$res = mysqli_query($conn, $query);

    	if (!$res) { // Error handling
    	echo "Something went wrong! :(";
    	} else {
	    	# code...
	    	echo "<script>alert('Successfully Added');</script>";
	    }
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page - Item</title>
	<link rel="stylesheet" type="text/css" href="style/dash-style.css">
	<link rel="stylesheet" type="text/css" href="style/admin-style.css">
</head>
<body>
	<!-- header -->
	<?php include 'include/header.php'; ?>

	<!-- content -->
	<div class="contentItem">
		<div class="contentAddItem">
			<p>Add Item</p>
			<form method="post" action="" enctype="multipart/form-data">
		        <table width="100%">
		        	<tr>
		                <td>Kode Item</td>
		                <td><input type="text" name="code"></td>
		            </tr>
		            <tr>
		                <td>Nama Item</td>
		                <td><input type="text" name="nama"></td>
		            </tr>
		            <tr>
		                <td>Harga Item</td>
		                <td><input type="number" name="price"></td>
		            </tr>
		            <tr>
		                <td>Description</td>
		                <td><input type="text" name="desc"></td>
		            </tr>
		            <tr>
		                <td>Merk Item</td>
		                <td><input type="text" name="merk"></td>
		            </tr>
		            <tr>
		                <td>Gambar</td>
		                <td><input type="file" name="image"/></td>
		            </tr>
		            
		            <tr>
		                <td></td>
		                <td><button type="submit" name="submit">Submit</button></td>
		            </tr>
		        </table>
	        </form>
		</div>
			<div class="showItems">
				<table border="1">
					<tr>
						<th>ID</th>
						<th>Pics</th>
						<th>Code</th>
						<th>Name</th>
						<th>Price</th>
						<th>Desc</th>
						<th>Merk</th>
						<th>Action</th>
					</tr>
			       	<?php
					$halaman = 3;
					$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
					$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

					$result = mysqli_query($conn, "SELECT * FROM item");
					$total = mysqli_num_rows($result);
					$pages = ceil($total/$halaman);
					$query = mysqli_query($conn, "SELECT * FROM item LIMIT $mulai, $halaman") or die(mysql_error);

					$no = $mulai+1;
					$i = 1;
					while ($data = mysqli_fetch_assoc($query))
					{ ?>
					<tr>
						<td><?= $data["id_item"]; ?></td>
						<td><?php echo '<img width="45px" src="data:image/jpeg;base64,'.base64_encode( $data['img_item'] ).'"/>'; ?></td>
						<td><?= $data["code_item"]; ?></td>
						<td><?= $data["name_item"]; ?></td>
						<td><?= $data["price_item"]; ?></td>
						<td width="50%"><?= $data["desc_item"]; ?></td>
						<td><?= $data["merk_item"]; ?></td>
						<td class="action"><a href="delete-item.php?id_item=<?=$data['id_item'];?>">Delete</a></td>
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

	<!-- footer -->
	<?php include 'include/footer.php'; ?>
</body>
</html>