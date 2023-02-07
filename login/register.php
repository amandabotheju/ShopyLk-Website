<?php include("../Connection.php")?>
<!DOCTYPE html>
<html>
<head>
	<title>ShopyLK | Registration form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../img/core-img/logo.ico">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Lobster&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Lobster&family=Sansita+Swashed&family=Ubuntu:wght@500;700&display=swap" rel="stylesheet">
	<script src="http://kit.fontawesome.com/a81368914c.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="
  background-image: url('../img/bg-img/bg-3.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;">
	<div class="container">
		<div class="img">
			<img src="">
		</div>
		<div class="login-container">
			<form action="register.php" method="POST">
				<img class="avatar" src="../img/core-img/logo.ico">
				<h2 style="color: white;">WELCOME</h2>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div>
						<h5 style="color: white;">Username</h5>
						<input style="color: white;" type="text" class="input" name="username" required>
					</div>
				</div>
				<div class="input-div two">
					<div class="i">
						<i class="fas fa-envelope"></i>
					</div>
					<div>
						<h5 style="color: white;">Email</h5>
						<input  style="color: white;" type="text" class="input" name="email" required>
					</div>
				</div>
				<div class="input-div two">
					<div class="i">
						<i class="fas fa-phone"></i>
					</div>
					<div>
						<h5 style="color: white;">Number</h5>
						<input  style="color: white;" type="text" class="input" name="number" required>
					</div>
				</div>
				<div class="input-div two">
					<div class="i">
						<i class="fas fa-home"></i>
					</div>
					<div>
						<h5 style="color: white;">Address Line 1 (Only number)</h5>
						<input  style="color: white;" type="text" class="input" name="a_line1" required>
					</div>
				</div>
				<div class="input-div two">
					<div class="i">
						<i class="fas fa-home"></i>
					</div>
					<div>
						<h5 style="color: white;">Address Line 2</h5>
						<input  style="color: white;" type="text" class="input" name="a_line2">
					</div>
				</div>
				<div class="input-div two">
					<div class="i">
						<i class="fas fa-building"></i>
					</div>
					<div>
						<h5 style="color: white;">City</h5>
						<input  style="color: white;" type="text" class="input" name="city" required>
					</div>
				</div>
				<div class="input-div two">
					<div class="i">
						<i class="fas fa-map-marker"></i>
					</div>
					<div>
						<select name="district" class="form-control" style="color:black;" required>
                            <option value="" disabled selected>Choose District</option>
							<?php 
								$sql = mysqli_query($connection,"SELECT district_id,district_name FROM districs ORDER BY district_name ASC");
								while($name=mysqli_fetch_assoc($sql)):
							?>
							<option value="<?php echo $name['district_id'];?>"> <?php echo $name['district_name'] ?> </option>
							<?php endwhile;?>
                        </select>
					</div>
				</div>
				<div class="input-div two">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div>
						<h5 style="color: white;">Password</h5>
						<input style="color: white;" type="password" class="input" name="password1" required>
					</div>
				</div>
				<div class="input-div two">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div>
						<h5 style="color: white;">Confirm Password</h5>
						<input style="color: white;" type="password" class="input" name="password2" required>
					</div>
				</div>
				<a class="reg" href="login.php" style="color: white;">Alredy have a account !</a>
				<!--display errors-->
				<?php include('errors.php') ?>
				<button class="btn" name="register">Confirm</button>
			</form>
		</div>
	</div>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>

