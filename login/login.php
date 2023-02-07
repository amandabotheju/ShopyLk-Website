<?php include('../Connection.php'); ?>
<!DOCTYPE html>
<html>
<head >
	<title>ShopyLK | Login </title>
	<link rel="icon" href="../img/core-img/logo.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Lobster&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Lobster&family=Sansita+Swashed&family=Ubuntu:wght@500;700&display=swap" rel="stylesheet">
	<script src="http://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body style="
  background-image: url('../img/bg-img/bg-7.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;">
	<div class="container">
		<div class="img">
			<img src="">
		</div>
		<div class="login-container">
			<form action="login.php" method="POST" >
				<img class="avatar" src="../img/core-img/logo.ico">
				<h2 style="color: black;">Login</h2>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div>
						<h5 style="color: black;">Username</h5>
						<input style="color: black;" type="text" class="input" name="username">
					</div>
				</div>
				<div class="input-div two">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div>
						<h5 style="color: black;">Password</h5>
						<input style="color: black;" type="Password" class="input" name="password">
					</div>
				</div>
				<a href="#" style="color: black;">Forgot Password ?</a>
				<a class="reg" href="register.php" style="color: black;">Register Now !</a>

				<!--display errors-->
				<?php include('errors.php') ?>
				
				<button class="btn" name="login">Login</button>
			</form>
		</div>
	</div>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>

