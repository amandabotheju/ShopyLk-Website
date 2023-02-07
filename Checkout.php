<?php include('dbconnection.php');?>
<?php include('Connection.php');
$sum = $_POST['sub_total'];
$uid= $_SESSION['uid'];?>
<?php if (isset($_SESSION['success'])): ?>
	<?php 
	    unset($_SESSION['success']);
	?>
<?php endif ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>ShopyLK - The largest Gift store | Checkout</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/logo.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">

    <!--Checkout CSS -->
    <link href="css/Checkout.css" rel="stylesheet">

    <?php      
        $nameErr  = $adrErr = $emailErr= $numErr= "";
        
        if (isset($_POST['proceed'])){

            //Declaring variables
            $name = $_POST["name"];
            $lname = $_POST["lname"];
            $email = $_POST["email"];
            $adr= $_POST["adr"];
            $num=$_POST["num"];
            $city = $_POST["city"];
            $prv = $_POST["province"];
            $zip=$_POST["zip"];
            $method=$_POST["method"];
            $total = $_POST['total'];

            $errors= 0;
            
            //Validate the name   
            if (empty($_POST["name"]  && $_POST["lname"])) {  
                $nameErr = "*Name is required";  
                $errors+=1;
            } 
            else {  
                $name = input_data($_POST["name"]); 
                $lname = input_data($_POST["lname"]);
                $pattern =  "/^[a-zA-Z ]*$/";  
                if (!preg_match($pattern,$name)) { 
                    if(!preg_match($pattern,$lname)){ 
                        $nameErr = "*Please enter a valid Name";  
                        $errors+=1;
                    }
                }  
            }  
            
            //Validate the Email
            if (empty($_POST["email"])){
                $emailErr = "*Email is required";  
                $errors+=1;
            }
            else {  
                $email = input_data($_POST["email"]);  
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                    $emailErr = "*Please enter a valid mail";  
                    $errors+=1 ;
                }
            }  

            //Validate the Address
            if (empty($_POST["adr"])){  
                $adrErr = "*Address is required";
                $errors+=1;
            }
            else   
                $adr = input_data($_POST["adr"]);  

            //Validate the mobile number
            if (empty($_POST["num"])){
                $numErr = "*Mobile Number is required";  
                $errors+=1;
            }
            else {  
                $num = input_data($_POST["num"]);  
                $pattern = "/^[0-9]{10}+$/";
                if (!preg_match($pattern,$num)) {  
                    $numErr = "*Please enter a valid Mobile Number";  
                    $errors+=1;
                }  
            }  


            //Insert data into the table
            if(empty($errors)){

                //Add payment details 
                $query1 = "INSERT INTO order_details(Userid,Mobile,Address_line_1,Address_line_2,City,Province,Total_Balance,Method) VALUES ('$uid','$num','$adr','$city','$city','$prv','$total','$method')";
                    
                $result = mysqli_query($db, $query1);
                    
                //check the query
                if (!$result) {
                    echo "error".mysqli_error($db);
                }
                else {
                    //Assign the id into session variable
                    $_SESSION['id'] = $db->insert_id;
                    $_SESSION['total'] = $total;
                    echo '<script> alert("Billing Address was Successfully add"); window.location.href="Payment.php";</script>';
                   
                    
  

                }

            }
        }


        function input_data($data) {  
            $data = trim($data);  
            $data = stripslashes($data);  
            $data = htmlspecialchars($data);  
            return $data;  
        }  

?>
</head>

<body>
        <!--*******************Side category menu*******************-->
        <div class="catagories-side-menu">
        <!-- Close Icon -->
        <div id="sideMenuClose">
            <i class="ti-close"></i>
        </div>
        <!--  Side Nav  -->
        <div class="nav-side-menu">
            <div class="menu-list">
                <h6 class="mb-0">Categories</h6>
                <ul id="menu-content2" class="menu-content collapse out">
                    <?php  
                                                $category = "SELECT * FROM product_category";  
                                                 
                                                $result = mysqli_query($connection, $category);

                                                while($item = mysqli_fetch_assoc($result)){

                                            ?>
                    <!-- Single Item -->
                    <li data-toggle="collapse" data-target="#women2">

                                                <a href="shop.php?item=<?php echo $item['Id']; ?>"> <?php  echo $item['Category_Name']; ?></a>
                                                
                                            </li> 

                                            <?php } ?> 
                </ul>
            </div>
        </div>
    </div>

    <div id="wrapper">

        <!--*****************Header Area Start*****************-->

        <header class="header_area background-overlay-white" style="background-image: url(img/bg-img/bg-6.jpg);">
            <!-- Top Header Area Start -->
            <div class="top_header_area">
                <div class="container h-100">
                    <div class="row h-100 align-items-center justify-content-end">

                        <div class="col-12 col-lg-7">
                            <div class="top_single_area d-flex align-items-center">
                                <!-- Logo Area -->
                                <div class="top_logo">
                                    <a href="#"><img src="img/core-img/logo.png" class="image" alt=""></a>
                                </div>
                                <!-- Cart & Menu Area -->
                                <div class="header-cart-menu d-flex align-items-center ml-auto">
                                    <!-- Cart Area -->
                                    <div class="cart">
                                        <a href="#" id="header-cart-btn" target="_blank"><span class="cart_quantity">c</span> <i class="ti-bag"></i> Your Bag</a>
                                        <!-- Cart List Area Start -->
                                        <ul class="cart-list">
                                        <?php
                                        //include('cartnew.php');
                                        if (isset($_SESSION['cart'])) {
                                            foreach ($_SESSION['cart'] as $key => $value) {
                                        ?>
                                            <li>
                                                <a href="#" class="image"><img src='<?php echo $value['image']?>' class="cart-thumb" alt=""></a>
                                                <div class="cart-item-desc">
                                                    <h6><a href="#"><?php echo $value['item_name']?></a></h6>
                                                    <p>1x - <span class="price"><?php echo $value['price']?></span></p>
                                                </div>
                                                <span class="dropdown-product-remove"><i class="icon-cross"></i></span>
                                            </li>
                                            <?php } 
                                    } ?>
                                        </ul>
                                    </div>
                                    <div class="header-right-side-menu ml-15">
                                        <a href="#" id="sideMenuBtn"><i class="ti-menu" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- *******************************Top Header Area End -->

            <div class="main_header_area">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-12 d-md-flex justify-content-between">
                            <!-- Header Social Area -->
                            <div class="header-social-area">
                                <a href="#"><span class="karl-level">Share</span> <i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>

                            <!-- Menu Area -->

                            <div class="main-menu-area">
                                <nav class="navbar navbar-expand-lg align-items-start">

                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#karl-navbar" aria-controls="karl-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i class="ti-menu"></i></span></button>

                                    <div class="collapse navbar-collapse align-items-start collapse" id="karl-navbar">
                                        <ul class="navbar-nav animated" id="nav">
                                            <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="karlDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                                                <div class="dropdown-menu" aria-labelledby="karlDropdown">
                                                    <a class="dropdown-item" href="index.php">Home</a>
                                                    <a class="dropdown-item" href="shop.php">Shop</a>
                                                    <?php if (isset($_SESSION['username'])): ?>
                                                        <a class="dropdown-item" href="cartnew.php">Cart</a>
                                                    <?php endif ?>
                                                </div>
                                            </li>
                                            <li class="nav-item"><a class="nav-link" href="shop.php?item=Ct01">Gifts</a></li>
                                            <li class="nav-item"><a class="nav-link" href="shop.php?item=Ct02"><span class="karl-level">hot</span>Chocolate Boxes</a></li>
                                            <li class="nav-item"><a class="nav-link" href="contact_us.php">Contact</a></li>
                                            <?php if (isset($_SESSION['username'])): ?>
                                                <li class="nav-link">Hi, <strong><?php echo $_SESSION['username']; ?> </strong>...</li>
                                                <li class="nav-item"><a href="login/login.php?logout='1'" class="nav-link" style="color: red; text-transform: uppercase;">Logout</a></li>
                                            <?php else: ?>
                                                <li class="nav-item"><a href="login/login.php" class="nav-link" style="color: #1aff1a; text-transform: uppercase;">Login</a></li>
                                                <li class="nav-item"><a href="login/register.php" class="nav-link" style="color: #3399ff; text-transform: uppercase;">Signup</a></li>
                                            <?php endif ?>
                                        </ul>
                                    </div> 
                                </nav>
                            </div>
                            <!-- Help Line -->
                            <div class="help-line">
                                <a href="tel:+346573556778"><i class="ti-headphone-alt"></i> +94 778 337 399</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ****** Header Area End ****** -->

        <!-- ****** Top Discount Area Start ****** -->
        <section class="top-discount-area d-md-flex align-items-center">
            <!-- Single Discount Area -->
            <div class="single-discount-area">

            </div>
            <!-- Single Discount Area -->
            <div class="single-discount-area">

            </div>
            <!-- Single Discount Area -->
            <div class="single-discount-area">

            </div>
        </section>
        <!-- ****** Top Discount Area End ****** -->


        <!-- ****** Checkout Area Start ****** -->
        <div class="checkout_area section_padding_100">
            <div class="container">
                <form action="" name="cusdetails" method="post" >
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="checkout_details_area mt-50 clearfix">
                            <div class="cart-page-heading">
                                <h5>Billing Address</h5>
                            </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="fname"><i class="fa fa-user"></i>First Name </label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="John"><span class="error"><?php echo $nameErr; ?></span>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="lname"><i class="fa fa-user"></i>Last Name </label>
                                        <input type="text" id="lname" name ="lname" class="form-control"  placeholder="Doe">
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="email"><i class="fa fa-envelope"></i>Email</label>
                                        <input type="text" id="email" name="email" placeholder="abc@gmail.com" class="form-control"><span class="error"><?php echo $emailErr; ?></span>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                                        <input type="text" id="adrs" name="adr" class="form-control"><span class="error"><?php echo $adrErr; ?></span>
                                    </div>

                                    <div class="col-12 mb-3">
                                       <label for="mob"><i class="fa fa-mobile-phone fa-2x"></i> Mobile Number</label>
                                       <input type="text" id="num" name="num" class="form-control"><span class="error"><?php echo $numErr; ?></span> 
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="city"><i class="fa fa-institution"></i> City</label>
                                        <input type="text" id="city" name="city" placeholder="Colombo" class="form-control">
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="province">Province</label>
                                        <select class="custom-select d-block w-100" id="province" name="province">
                                            <option value="western" selected>Western</option>
                                            <option value="northern">Northern</option>
                                            <option value="north western">North Western</option>
                                            <option value="north central">North Central</option>
                                            <option value="central">Central</option>
                                            <option value="sabaragamuwa">Sabaragamuwa</option>
                                            <option value="eastern">Eastern</option>
                                            <option value="uva">Uva</option>
                                            <option value="southern">Southern</option>
                                       </select>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="zip">Zip Code</label>
                                        <input type="text" id="zip" name="zip" class="form-control" placeholder="00130">
                                        <input type="text" name="total" value="<?php echo $sum; ?>" hidden>
                                    </div>

                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox d-block mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1"> 
                                            <label class="custom-control-label" for="customCheck1">Shipping address same as billing</label>
                                        </div>
                                    </div>                                    
                                </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                        <div class="order-details-confirmation">
                            <form >
                            <div class="cart-page-heading">
                                <h5>Your Order</h5>
                                <p>The Details</p>
                            </div>

                            <ul class="order-details-form mb-4">
                                <li><span>Total</span> <?php echo $sum; ?></li>
        
                            </ul>

                            <div>
                                <p><font color="gray">Select the Payment Method</font></p>
                            </div>
                            <div id="accordion" class="mb-4">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h6 class="mb-0">
                                            <a class="collapsed" ><input type="radio" id="cash" name="method" value="Cash">&nbsp;&nbsp;&nbsp;&nbsp;Cash on delivery</a>
                                        </h6>
                                    </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h6 class="mb-0">
                                            <a class="collapsed"><input type="radio" id="credit" name="method" value="Credit card">&nbsp;&nbsp;&nbsp;&nbsp;Credit Card</a>
                                        </h6>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" name="proceed" value="Submit" class="btn">
                        </div>
                    </div>

                </div>
            </form>
            </div>
        </div>
        <!-- ****** Checkout Area End ****** -->

        <!-- ****** Footer Area Start ****** -->
        <footer class="footer_area">
            <div class="container">
                <div class="row">
                    <!-- Single Footer Area Start -->
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="single_footer_area">
                            <div class="footer-logo">
                                <img src="img/core-img/logo.png" alt="">
                            </div>
                            <div class="copywrite_text d-flex align-items-center">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://www.facebook.com/Team ShopyLK" target="_blank">Team ShopLK</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Footer Area Start -->
                    <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                        <div class="single_footer_area">
                            <ul class="footer_widget_menu">
                                <li><a href="#">About</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Faq</a></li>
                                <li><a href="#">Returns</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Footer Area Start -->
                    <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                        <div class="single_footer_area">
                            <ul class="footer_widget_menu">
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Shipping</a></li>
                                <li><a href="#">Our Policies</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Footer Area Start -->
                    <div class="col-12 col-lg-5">
                        <div class="single_footer_area">
                            <div class="footer_heading mb-30">
                                <h6>Subscribe us and get notifications</h6>
                            </div>
                            <div class="subscribtion_form">
                                <form action="#" method="post">
                                    <input type="email" name="mail" class="mail" placeholder="Your email here">
                                    <button type="submit" class="submit">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line"></div>

                <!-- Footer Bottom Area Start -->
                <div class="footer_bottom_area">
                    <div class="row">
                        <div class="col-12">
                            <div class="footer_social_area text-center">
                                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                <a href="https://www.facebook.com/Team ShopyLK"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ****** Footer Area End ****** -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>

</html>