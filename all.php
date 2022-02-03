<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
//account
// 7nY3cA!e8S imstwn
// 2hG}jf@]G2 bud

//most used password
//G+kMgX.:v6

// db connection
$conn = mysqli_connect("localhost", "root", "", "project");

// function
function reg($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$email = $data["email"];
	$password = $data["password"];
	$password2 = $data["password2"];

	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);
	$specialChars = preg_match('@[^\w]@', $password);

	if (empty($username) || empty($email) || empty($password) || empty($password2)) {
		# code...
		echo "<script>alert('Text is Required')</script>";
		return false;
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		# code...
		echo "<script>alert('Wrong Email Format')</script>";
		return false;
	} elseif (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
		# code...
		echo "<script>alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.')</script>";
		return false;
	}

	$result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
	if (mysqli_fetch_assoc($result)) {
		# code...
		echo "<script>alert('Username Already Exists')</script>";
		return false;
	}

	if ($password !== $password2) {
		# code...
		echo "<script>alert('Password Unmatched')</script>";
		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO users VALUES ('', '$username', '$email', '$password')");

}

function login($data) {
	global $conn;

	$username = $data["username"];
	$password = $data["password"];

	$_SESSION["username"] = $username;

	if (empty($username) || empty($password)) {
		# code...
		echo "<script>alert('Text is Required')</script>";
	}
	$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
	$adm = mysqli_query($conn, "SELECT * FROM admin WHERE adm_name = '$username'");
	
	if (mysqli_num_rows($adm) === 1) {
		# code...
		$rowAd = mysqli_fetch_assoc($adm);
		if ($password == $rowAd["password"]) {
			# code...
			$_SESSION["in-admin"] = true;
	 		header("Location: admin-home.php");
	 		exit(0);
		}
	}

	if (mysqli_num_rows($result) === 1) {
		# code...
		$rowUs = mysqli_fetch_assoc($result);
		if (password_verify($password, $rowUs["password"])) {
	 		# code...
	 		$_SESSION["in-user"] = true;
	 		header("Location: home.php");
	 		exit(0);
	 	} else {
	 		# code...
	 		echo "<script>alert('Login Failed')</script>";
	 		return false;
	 	}
	}
}

function countUsers() {
	global $conn;

	$sql = "SELECT * FROM users";
	$result = mysqli_query($conn, $sql);
	$amount = mysqli_num_rows($result);
	return $amount;
}

function countItems() {
	global $conn;

	$sql = "SELECT * FROM item";
	$result = mysqli_query($conn, $sql);
	$amount = mysqli_num_rows($result);
	return $amount;
}

function countTrans() {
	global $conn;

	$sql = "SELECT * FROM transaction";
	$result = mysqli_query($conn, $sql);
	$amount = mysqli_num_rows($result);
	return $amount;
}

function deleteData($data) {
	$id = $data['id_user'];

	$query = "DELETE FROM users WHERE id_user = '$id'";
	$delete = mysqli_query($conn, $query);

	if (!$delete) {
		echo "echo <script>alert('Edit Data Failed')</script>;";
	}
	else{
		echo "<script>alert('Edit Successfull')</script>";
	}
}

?>