<?php

	$connection = mysqli_connect('localhost', 'root', '', 'shopylk');
	$update = 'false';
	$sellerupdate = 'false';

	//more details
	if (isset($_POST['more'])) {
		$_SESSION['Pid'] = $item['Pid'];
		header('location: product-details.php');
	}

	




	//----------------admin edit item--------------------------------------------------------------------
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = 'true';
		$sql = mysqli_query($connection,"SELECT * FROM product_detail WHERE Pid = '$id'");
			$row = $sql->fetch_array();
			$pid = $row['Pid'];
			$name = $row['Product_Name'];
			$price = $row['Price'];
			$path = $row['Image'];
			$sid = $row['Sid'];
			$cid = $row['CId'];
	}

	//--------------admin edit seller details-------------------------------------------------------------------
	if(isset($_GET['edit_seller'])){
		$id = $_GET['edit_seller'];
		$sellerupdate = 'true';
		$sql = mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM seller WHERE SId = '$id'"));
		$id=$sql['SId'];
		$name=$sql['Seller_Name'];
		$number=$sql['Number'];
		$address=$sql['Address'];
		$email=$sql['Email'];

	}

	//-------------------------------------------------------------------------------------------------------------------------------------

	
	session_start();
	$username = "";
	$email = "";
	$errors = array();

	//if button clicked
	if (isset($_POST['register'])) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		$number = $_POST['number'];
		$a_line1 = $_POST['a_line1'];
		$a_line2 = $_POST['a_line2'];
		$city = $_POST['city'];
		$district = $_POST['district'];
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];

		//fields are filed properlly
		if(validateEMAIL($email)!=true){
			array_push($errors, "Invalid Email!");
		}

		if ($password1 != $password2) {
			array_push($errors, "The two passwords do not match");
		}

		//no errors
		if (count($errors) == 0) {
			$password = md5($password1);
			$sql = "INSERT INTO user (UserName, Email, Number, Password, Address_Line_1, Address_Line_2, City, District) VALUES ('$username','$email','$number','$password','$a_line1','$a_line2','$city','$district')";
			if(mysqli_query($connection,$sql)){
				$_SESSION['username'] = $username;
				header('location: login.php');
			}else{
				array_push($errors, "Data isert Error!");
			}
		}

	}

	// ----------------------------------------------log user----------------------------------------------
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM user WHERE UserName = '$username' AND Password = '$password'";
			$result = mysqli_query($connection, $query);
			$user = mysqli_fetch_assoc($result);
			if (mysqli_num_rows($result) == 1) {
				if($username == 'admin'){
					$_SESSION['username'] = $username;
					header('location: ../admin.php');
				}else{
					$_SESSION['username'] = $username;
					$_SESSION['uid'] = $user['Id'];
					header('location: ../index.php');
				}
			}else{
				array_push($errors, "The username/password is invalid");
				header('location: login.php');
			}
		}
	}

	//logout
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header('location: login.php');
	}

	function validateEMAIL($EMAIL) {
    $v = "/[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/";

    return (true);
}
?>

