<?php


include('Connection.php');
    if(isset($_GET['selected_item'])){
    
    $product_id = $_GET['selected_item'];
    
    $get_product = "select * from product_detail where Pid='$product_id'";
    
    $run_product = mysqli_query($connection,$get_product);
    
    $row_product = mysqli_fetch_array($run_product);
    
    
    
    $pro_title = $row_product['Product_Name'];
    
    $pro_price = $row_product['Price'];
    
    $pro_desc = $row_product['Product_Name'];
    
    $pro_img = $row_product['Image'];

    $category_Id = $row_product['CId'];
	 
    
	
    $get_p_cat = "select * from product_category where Id='$category_Id'";
    
    $run_p_cat = mysqli_query($connection,$get_p_cat);
    
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    
    $p_cat_title = $row_p_cat['Category_Name'];
	
	
	 
        
        /*$sql = "SELECT * FROM `stock` WHERE id= '$product_id' ";

        $resultSizes = mysqli_query($conn, $sql);
        
        $sql = "SELECT SUM(`available`) AS 'count' FROM `stock` WHERE `id`= '$product_id'";

        $result = mysqli_query($connection, $sql);

        $rowStockCount = mysqli_fetch_assoc($result);*/
    
    }	
		
?>
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
    <title>ShoppyLk | Product Details</title>

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
                                        <a href="#" id="header-cart-btn" target="_blank"><span class="cart_quantity">C</span> <i class="ti-bag"></i> Your Bag</a>
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
                                                        <a class="dropdown-item" href="cart.html">Cart</a>
                                                    <?php endif ?>
                                                </div>
                                            </li>
                                            <li class="nav-item"><a class="nav-link" href="shop.php?item=Ct01">Gifts</a></li>
                                            <li class="nav-item"><a class="nav-link" href="shop.php?item=Ct02"><span class="karl-level">hot</span>Chocolate Boxes</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
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

        <!-- <<<<<<<<<<<<<<<<<<<< Breadcumb Area Start <<<<<<<<<<<<<<<<<<<< -->
        <div class="breadcumb_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <ol class="breadcrumb d-flex align-items-center">
                            <li class="breadcrumb-item"><a href="index.php">Home / </a></li>
                            
                            <li>
                            <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>
                   </li>
                   <li> / <?php echo $pro_title; ?> </li>
                        </ol>
                        <!-- btn -->
                        <a href="shop.php" class="backToHome d-block"><i class="fa fa-angle-double-left"></i> Back to Category</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- <<<<<<<<<<<<<<<<<<<< Breadcumb Area End <<<<<<<<<<<<<<<<<<<< -->

       <!-- <<<<<<<<<<<<<<<<<<<< Single Product Details Area Start >>>>>>>>>>>>>>>>>>>>>>>>> -->
        <section class="single_product_details_area section_padding_0_100">
            <div class="container">
                <div class="row">

                    <div class="col-12 col-md-6">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">

                                

                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                       
                                        <img class="d-block w-100" src="img/<?php echo $pro_img; ?>">
                                    </a>
                                    </div>
                                   
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="single_product_desc">

                            <h4 class="title"><?php echo $pro_title; ?></h4>

                            <h4 class="price">Rs.<?php echo $pro_price; ?></h4>

                            <?php //echo $rowStockCount['count']; ?>  <p class="available">Available: <span class="text-muted">In Stock</span></p>
                            <div class="single_product_ratings mb-15">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>

                            

                            <!-- Add to Cart Form -->
                            <form class="cart clearfix mb-50 d-flex" id="formcart" action="manage_cart.php" method="POST">
                                <div class="quantity">
                                    <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                    <input type="number" class="qty-text" id="qty" step="1" min="1" max="12" name="quantity" value="1">
                                    <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                </div>
                                <?php if (isset($_SESSION['username'])): ?>
                                    <button type="submit" name="AddToCart" class="btn cart-submit d-block">Add to cart</button>
                                    <input type="hidden" name="item_name" value="<?php echo $pro_title;?>">
                                    <input type="hidden" name="price" value="<?php echo $pro_price;?>">
                                    <input type="hidden" name="image" value="img/<?php echo $pro_img;?>">
                                <?php else:?>
                                    <h6 style="color: red;">Please Login to Purchase Products</h6>
                                <?php endif; ?>
                            </form>

                            <div id="accordion" role="tablist">
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingOne">
                                        <h6 class="mb-0">
                                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Information</a>
                                        </h6>
                                    </div>

                                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <p><?php echo $pro_desc; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingTwo">
                                        <h6 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Cart Details</a>
                                        </h6>
                                    </div>
                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>The products available in this web site is unique. also buying those items you can get more discounts also. and after you adding items to your cart you can use any paymeny methods for paying. </p>
                                            <p>so come and get our latest products.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingThree">
                                        <h6 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">shipping &amp; Returns</a>
                                        </h6>
                                    </div>
                                    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>After you buy our products we shipping items to your home and we will get shipping amount apart from the item price.</p>
                                            <p>If you want to return our items it is possible for you. you have to return items within 7 days.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- <<<<<<<<<<<<<<<<<<<< Single Product Details Area End >>>>>>>>>>>>>>>>>>>>>>>>> -->
		
           
                            
        <section class="you_may_like_area clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_heading text-center">
                            <h2>related Products</h2>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="you_make_like_slider owl-carousel">
                            <?php
		
                                    $get_products = "select * from product_detail";
                                
                                    $run_products = mysqli_query($connection,$get_products);
                                    
                                    $row_products=mysqli_fetch_array($run_products);
                                
                                    while($row_products=mysqli_fetch_array($run_products)):
                                    
                                        $pro_id = $row_products['Pid'];
                                    
                                        $pro_title = $row_products['Product_Name'];
                                    
                                        $pro_img = $row_products['Image'];
                                    
                                        $pro_price = $row_products['Price'];

                            ?>
                            <!-- Single gallery Item -->
                            <div class="single_gallery_item">
                                <!-- Product Image -->
                                <div class="product-img">
								
                                    <img src="img/<?php echo $pro_img; ?>" alt="">
									<div class="product-quicview">
									
                                        <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                                    </div>
                                    
                                </div>
                                <!-- Product Description -->
                                <div class="product-description">
                                    <h4 class="product-price">Rs.<?php echo $pro_price;?></h4>
                                    <p><?php echo $pro_title;?></p>
									<?php if (isset($_SESSION['username'])): ?>
                                        <!-- Add to Cart -->
                                        <form id="formcart" action="manage_cart.php" method="POST">
                                        <button type="submit" name="AddToCart" class="btn cart-submit d-block">Add to Cart</button>
                                            <input type="hidden" name="item_name" value="<?php echo $pro_title;?>">
                                            <input type="hidden" name="price" value="<?php echo $pro_price;?>">
                                            <input type="hidden" name="image" value="img/<?php echo $pro_img;?>">
                                        </form>
                                    <?php else: ?>
                                        <hr>
                                        <h6 style="color: red;">Please Login to Purchase Products</h6>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endwhile;?>
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