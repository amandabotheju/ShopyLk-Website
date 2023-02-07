<?php include('dbconnection.php');?>
<?php include('Connection.php');
$uid= $_SESSION['uid'];
$total = $_SESSION['total'];?>
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

    <!-- title  -->
    <title>ShopyLK - The largest Gift store | Payment</title>

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
        $cardErr = $numErr = $cvvErr = "";       
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $cname = $_POST["cardname"];
            $num = $_POST["cardnum"];
            $cvvno= $_POST["cvv"];
            $oid = $_SESSION['id'];
            
            $errors= 0;

            //Validate the name is on the card  
            if (empty($_POST["cardname"])) {  
                $cardErr = "*Name on the card is required";  
                $errors+=1;
            } 
            else {  
                $cname = input_data($_POST["cardname"]); 
                $pattern =  "/^[a-zA-Z ]*$/";  
                if (!preg_match($pattern,$cname)) {  
                    $cardErr = "*Please enter a valid Name on the Card";  
                    $errors+=1;
                }  
            }  

            //Validate the card number
            if (empty($_POST["cardnum"])){
                $numErr = "*Card Number is required";  
                $errors+=1;
            }
            else {  
                $num = input_data($_POST["cardnum"]); 
                $cardno = "/^4[0-9]{12}(?:[0-9]{3})?$/"; 
                if (!preg_match($cardno, $num)) {  
                    $numErr = "*Please enter a valid card Number";  
                    $errors+=1 ;
                }
            }  

            //Validate the cvv number
            if (empty($_POST["cvv"])){  
                $cvvErr = "CVV number is required";
                $errors+=1;
            }
            else {  
                $cvvno = input_data($_POST["cvv"]); 
                $cvv = "/^[0-9]{3,4}$/";; 
                if (!preg_match($cvv, $cvvno)) {  
                    $cvvErr = "*Please enter a valid CVV Number";  
                    $errors+=1 ;
                }
            } 

            //Insert data into the table
            if(empty($errors)){
                //Add payment details 
                $order_id= $_SESSION['id'];
                $query ="INSERT INTO payment(`orderid`,Status) VALUES ('$order_id','Yes')";
                $result = mysqli_query($db,$query);
                if (!$result){ 
                    echo "error2".mysqli_error($db);
                }
                else{
                   echo '<script> alert("Successfully done by the Payment"); window.location.href="index.php";</script>';
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

    <!-- ****** Payment Area Start ****** -->
        <div class="checkout_area section_padding_100">
            <div class="container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name="cusdetails" method="post" >
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="checkout_details_area mt-50 clearfix">
                            <div class="cart-page-heading">
                                <h5>Payment</h5>
                            </div>

                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="fname">Accepted Cards</label><br>
                                    <i class="fa fa-cc-visa fa-2x" style="color:navy;"></i>
                                    <i class="fa fa-cc-amex fa-2x" style="color:blue;"></i>
                                    <i class="fa fa-cc-mastercard fa-2x" style="color:red;"></i>
                                    <i class="fa fa-cc-discover fa-2x" style="color:orange;"></i>
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="cname">Total </label>
                                    <input type="text" id="total" name="total" value="<?php echo $total;?>"  class="form-control" readonly>
                                    
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="cname">Name on Card</label>
                                    <input type="text" id="cname" name="cardname" placeholder="John More Doe" class="form-control"><span class="error"><?php echo $cardErr; ?></span>
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="ccnum">Credit card number</label>
                                    <input type="text" id="ccnum" name="cardnum" placeholder="1111-2222-3333-4444" class="form-control" ><span class="error"><?php echo $numErr; ?></span>
                                </div>
                        
                                <div class="col-md-6 mb-3">
                                    <label for="expmonth">Exp Month</label>
                                    <select id="month" name="month" class="custom-select d-block w-100">
                                        <option value="month"selected>Month</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="expyear">Exp Year</label>
                                    <select id="month" name="month" class="custom-select d-block w-100">        
                                        <option value="year" selected>Year</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                        <option value="2031">2031</option>
                                        <option value="2032">2032</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="cvv">CVV</label>
                                    <input type="password" id="cvv" name="cvv" class="form-control" placeholder ="***"><span class="error"><?php echo $cvvErr; ?></span>
                                </div>
                            </div>
                                
                            <div class="row">     
                                <div class="col-md-6 mb-3">
                                    <input type="submit" value="Submit" class="btn">
                                </div>
                                        
                                <div class="col-md-6 mb-3">
                                    <input type="cancel" value="Cancel" class="btn" >
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    <!-- ****** Payment Area End ****** -->

    
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
    </div>
    <!-- /.wrapper end -->

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