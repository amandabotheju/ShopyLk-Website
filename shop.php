<?php include('Connection.php');?>
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
    <title>ShopyLK - The largest Gift store | Shop</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/logo.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">

    <script
              src="https://code.jquery.com/jquery-3.6.0.min.js"
              integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
              crossorigin="anonymous">
                  
    </script>

    <script type="text/javascript">
        function clickButton(){
            //if (confirm("click ok to continue")) 
                //window.location = "shopnew.php";
                alert('Item added to the cart');
        }
    </script>


</head>

<body>
        <!-- ****** Header Area Start ****** -->
        <div class="catagories-side-menu">
        <!-- Close Icon -->
        <div id="sideMenuClose">
            <i class="ti-close"></i>
        </div>
        <!--  Side Nav  -->
       <div class="nav-side-menu">
                <div class="menu-list">
                    <h6 class="mb-0">Catagories</h6>
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

        <!--******Header Area Start******-->
    
         <header class="header_area  background-overlay-white" style="background-image: url(img/bg-img/bg-x.jpg);">
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
            <!-- ***********Top Header Area End -->

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
        <!-- ** Header Area End ** -->

        <!-- ** Top Discount Area Start ** -->
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

             


        <section class="shop_grid_area section_padding_100">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="shop_sidebar_area">
                           
                            <div class="widget catagory mb-50">

                                <!--  Side Nav  -->
                                <div class="nav-side-menu">
                                    <h6 class="mb-0">Catagories</h6>
                                    <div class="menu-list">
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

                           


                            <div class="widget recommended">
                                <h6 class="widget-title mb-30">Recommended</h6>

                                <div class="widget-desc">
                                    <!-- Single Recommended Product -->
                                    <div class="single-recommended-product d-flex mb-30">
                                        <div class="single-recommended-thumb mr-3">
                                            <img src="img/product_Category/Soft_toys/romantic-teddies-on-boat-valentine_1.webp" alt="">
                                        </div>
                                        <div class="single-recommended-desc">
                                            <h6>Romantic teddies on boat valentine</h6>
                                            <p>Rs. 3000</p>
                                        </div>
                                    </div>
                                    <!-- Single Recommended Product -->
                                    <div class="single-recommended-product d-flex mb-30">
                                        <div class="single-recommended-thumb mr-3">
                                            <img src="img/product_Category/chocolate/2-pcs-cadbury-dairy-milk-silk-chocolates-hand-delivery_1.webp" alt="">
                                        </div>
                                        <div class="single-recommended-desc">
                                            <h6>2 pcs cadbury dairy milk silk chocolates and delivery</h6>
                                            <p>Rs. 2000</p>
                                        </div>
                                    </div>
                                    <!-- Single Recommended Product -->
                                    <div class="single-recommended-product d-flex mb-30">
                                        <div class="single-recommended-thumb mr-3">
                                            <img src="img/product_Category/Flowers/romantic-bunch-of-mixed-roses_1.webp" alt="">
                                        </div>
                                        <div class="single-recommended-desc">
                                            <h6>Romantic bunchnof mixedroses</h6>
                                            <p>Rs. 3000</p>
                                        </div> 
                                    </div>
                                    <!-- Single Recommended Product -->
                                    <div class="single-recommended-product d-flex">
                                        <div class="single-recommended-thumb mr-3">
                                            <img src="img/product_Category/Lover/complete-love-hamper_1.webp" alt="">
                                        </div>
                                        <div class="single-recommended-desc">
                                            <h6>Complete love hamper</h6>
                                            <p>Rs. 4500</p>
                                        </div>
                                    </div>
                                    <br>
                                     <!-- Single Recommended Product -->
                                    <div class="single-recommended-product d-flex mb-30">
                                        <div class="single-recommended-thumb mr-3">
                                            <img src="img/product_Category/teddies/i-love-you-balloon-teddy-bear_1.webp" alt="">
                                        </div>
                                        <div class="single-recommended-desc">
                                            <h6>I love you balloon teddy bear</h6>
                                            <p>Rs. 2500</p>
                                        </div>
                                    </div>
                                    <!-- Single Recommended Product -->
                                    <div class="single-recommended-product d-flex mb-30">
                                        <div class="single-recommended-thumb mr-3">
                                            <img src="img/product_Category/Birthday_gifts/best-wishes-personalised-calendar_1.webp" alt="">
                                        </div>
                                        <div class="single-recommended-desc">
                                            <h6>Best wishes personalised calendar</h6>
                                            <p>Rs 2000</p>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-8 col-lg-9">
                        <div class="shop_grid_product_area">
                            <div class="row">

                                <!-- Single gallery Item -->
                                <?php
                                    if(isset($_GET['item'])){

                                        $product = "SELECT * FROM product_detail WHERE CId='{$_GET['item']}' ";
                                    }
                                    else{
                                        $product = "SELECT * FROM product_detail WHERE CId='Ct01' ";
                                    }

                                    $result = mysqli_query($connection, $product);

                                    while($item = mysqli_fetch_assoc($result)){

                                ?>

                                <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.2s">

                                    <!-- Product Image -->
                                    <div class="product-img">
                                        
                                        <img src = "img/<?php echo $item['Image'];?> ">
                                        
                                    </div>
                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <h4 class="product-price">Rs. <?php echo $item['Price'];  ?></h4>
                                        <p><?php echo $item['Product_Name'];?></p>
                                        <a href="product-details.php?selected_item=<?php echo $item['Pid'];?>" class="btn btn-info">More Details</a>
                                        <!-- Add to Cart -->
                                        <?php if (isset($_SESSION['username'])): ?>
                                            <form id="formcart" action="manage_cart.php" method="POST" style="padding-top: 10px;">
                                            <button type="submit" name="AddToCart" class="btn btn-danger">Add to Cart</button>
                                                <input type="hidden" name="item_name" value="<?php echo $item['Product_Name'];?>">
                                                <input type="hidden" name="price" value="<?php echo $item['Price'];?>">
                                                <input type="hidden" name="image" value="img/<?php echo $item['Image'];?>">
                                            </form>
                                        <?php else:?>
                                            <h6 style="color: red;">Please Login to Purchase Products</h6>
                                        <?php endif; ?>
                                    </div>
                                </div>

                           <?php } ?>
                               
                            </div>
                        </div>

                       

                    </div>
                </div>
            </div>
        </section>

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