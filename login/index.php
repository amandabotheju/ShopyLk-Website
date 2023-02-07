<?php 
	session_start();
	$username = "";
	$email = "";
	$errors = array();
	//connect to database
	$db = mysqli_connect('localhost','root','','register');

	//if button clicked
	if (isset($_POST['confirm'])) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];

		//fields are filed properlly
		if (empty($username)) {
			array_push($errors, "username is required");
		}
		if (empty($email)) {
			array_push($errors, "email is required");
		}
		if (empty($password1)) {
			array_push($errors, "password is required");
		}
		if ($password1 != $password2) {
			array_push($errors, "The two passwords do not match");
		}

		//no errors
		if (count($errors) == 0) {
			$password = md5($password1);
			$sql = "INSERT INTO users (username, email, password) VALUES ('$username','$email','$password')";
			mysqli_query($db,$sql);
			$_SESSION['username'] = $username;
			header('location: ../index.php');
		}

	}

	// log user
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		//fields are filed properlly
		if (empty($username)) {
			array_push($errors, "username is required");
		}
		if (empty($password)) {
			array_push($errors, "password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM user WHERE UserName = '$username' AND Password = '$password'";
			$result = mysqli_query($db, $query);
			$user = mysqli_fetch_assoc($result);
			$id=$user['Id'];
			if (mysqli_num_rows($result) == 1) {
				if($username == 'admin'){
					$_SESSION['username'] = $username;
					header('location: ../admin.php');
				}else{
					
					$_SESSION['uid'] = $id;
					header('location: ../index.php');
				}
			}else{
				array_push($errors, "The username/password is invalid");
			}
		}
	}

	//logout
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header('location: login.php');
	}
 ?>