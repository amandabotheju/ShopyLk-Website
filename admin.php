<?php include("Connection.php")?>
<?php if (isset($_SESSION['success'])): ?>
	<?php 
	    unset($_SESSION['success']);
	?>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">

<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/cartstyle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <!-- Title  -->
        <title>ShopyLK | Admin</title>

        <!-- Favicon  -->
        <link rel="icon" href="img/core-img/logo.ico">

        <!-- Core Style CSS -->
        <link rel="stylesheet" href="css/core-style.css">
        <link rel="stylesheet" href="style.css">

        <!-- Responsive CSS -->
        <link href="css/responsive.css" rel="stylesheet">

        <style>
            body {
            font-family: Arial;
            }

            * {
            box-sizing: border-box;
            }

            form.example input[type=text] {
            padding: 10px;
            font-size: 17px;
            border: 1px solid grey;
            float: left;
            width: 80%;
            background: #f1f1f1;
            }

            form.example button {
            float: left;
            width: 20%;
            padding: 10px;
            background: #2196F3;
            color: white;
            font-size: 17px;
            border: 1px solid grey;
            border-left: none;
            cursor: pointer;
            }

            form.example button:hover {
            background: #0b7dda;
            }

            form.example::after {
            content: "";
            clear: both;
            display: table;
            }
        </style>

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

                            <!-- Menu Area -->

                            <div class="main-menu-area">
                                <nav class="navbar navbar-expand-lg align-items-start">

                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#karl-navbar" aria-controls="karl-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i class="ti-menu"></i></span></button>

                                    <div class="collapse navbar-collapse align-items-start collapse" id="karl-navbar">
                                        <ul class="navbar-nav animated" id="nav">
                                            <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#">Shop</a></li>                                            
                                            <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                                            <li class="nav-link">Hi, <strong><?php echo $_SESSION['username'];?> </strong>...</li>
                                                <li class="nav-item"><a href="login/login.php?logout='1'" class="nav-link" style="color: red; text-transform: uppercase;">Logout</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <!-- Help Line -->
                            <div class="help-line">
                                <a href="tel:+94778337399"><i class="ti-headphone-alt"></i> +94 778 337 399</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ** Header Area End ** -->

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
        <hr>

        <section class="you_may_like_area clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_heading text-center">
                            <h2>Product Details :</h2>
                            <!-- The form -->
                            <form class="example" method="post">
                                <input type="text" placeholder="Search.." name="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>

                            <!-----------Search item---------------------->              
                            <div class="row">
                            <?php
                            if(isset($_POST['search'])){
                                $id = $_POST['search'];
                                $item = mysqli_query($connection,"SELECT * FROM product_detail WHERE Pid ='$id';");
                                if($item_display = mysqli_fetch_assoc($item)){
                            ?>
                                <div class="card center" style="width: 18rem;">
                                    <img class="card-img-top" src="img/<?php echo $item_display['Image']?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h6 class="card-title"><?php echo $item_display['Pid']?></h6>
                                        <h5 class="card-title"><?php echo $item_display['Product_Name']?></h5>
                                        <p class="card-price">Rs.<?php echo $item_display['Price']?></p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Image path :</strong> <?php echo $item_display['Image']?></li>
                                        <li class="list-group-item"><strong>Seller Id :</strong> <?php echo $item_display['Sid']?></li>
                                        <li class="list-group-item"><strong>Category Id :</strong> <?php echo $item_display['CId']?></li>
                                    </ul>
                                    <div class="card-body">
                                        <a href="admin.php?edit=<?php echo $item_display['Pid'];?>" class="card-link"><button class="btn btn-info">Update</button></a>
                                        <a href="admin.php?delete=<?php echo $item_display['Pid']; ?>" name="delete" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            <?php
                                }else{?>
                            <div class="alert alert-danger">
                                    <?php
                                        echo " You enter wrong id or that product is been already deleted"; 
                                    ?>
                            </div>
                            <?php
                                }
                            }
                            //-----------Search item end---------------------------------------

                            //-------------delete item query and alert--------------------------
                            if (isset($_GET['delete'])) {
                                    $id = $_GET['delete'];
                                    $sql = "DELETE FROM product_detail WHERE PId='$id'";
                                    mysqli_query($connection,$sql);
                            ?>
                            <div class="alert alert-info">
                                    <?php
                                        echo " Item has been deleted"; 
                                    ?>
                            </div>
                            <?php
                                }
                            //-------------delete item query alert end--------------------------
                            ?>
                            </div><!--row-->
                        </div>
                    </div>
                    <?php
                    if (isset($_SESSION['message'])): ?>
                        <!--<div class="alert alert-->
                        <div class="alert alert-info">
                            <?php
                                echo $_SESSION['message'];
                                unset($_SESSION['message']); 
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
                <hr>
                <?php
                    //-----------------admin add new item---------------------------------------------------------------------------
                    if (isset($_POST['add'])) {
                        $pid = $_POST['proid'];
                        $name = $_POST['proname'];
                        $price = $_POST['price'];
                        $path = $_POST['path'];
                        $seller = $_POST['seller'];
                        $category = $_POST['category'];
                        

                        $sql = "INSERT INTO product_detail VALUES ('$pid','$name','$path','$price','$seller','$category')";
                        $result=mysqli_query($connection,$sql);

                        if($result){?>
                            <div class="alert alert-success">
                                    <?php
                                        echo " Item has been added"; 
                                    ?>
                            </div>
                            <?php
                        }
                    }
                ?>

                <?php
                    //----------------admin update item--------------------------------------------------------------------
                    if (isset($_POST['update'])) {
                        $id = $_POST['proid'];
                        $name = $_POST['proname'];
                        $price = $_POST['price'];
                        $path = $_POST['path'];
                        $seller = $_POST['seller'];
                        $category = $_POST['category'];

                        $edit=mysqli_query($connection,"UPDATE product_detail SET Product_Name='$name', Image='$path', Price='$price', Sid='$seller', CId='$category' WHERE Pid='$id'");

                        if($edit){?>
                            <div class="alert alert-info">
                                    <?php
                                        echo "Product details has been updated!"; 
                                    ?>
                            </div>
                            <?php
                        }
                    }
                ?>
                <!-------------------------------Add and edit product details form------------------------------------------------------>
                                <form method="POST">
                                    <div class="form-group">
                                        <label>Product Id:</label>
                                        <?php //--------get last product id-----------------
                                                $lastid = mysqli_fetch_array(mysqli_query($connection,"SELECT Pid FROM product_detail ORDER BY Pid DESC LIMIT 1;"));
                                            ?>
                                        <p>Last Product id: <b><?php echo $lastid['Pid']; ?></b></p>

                                        <?php if ($update == 'true'): ?>
                                            <input type="text" name="proid" class="form-control" value="<?php echo $pid?>">
                                        <?php else: ?>
                                            <input type="text" name="proid" class="form-control">
                                        <?php endif;?>
                                    </div><!--form-group-->
                                    <div class="form-group">
                                        <label>Product Name:</label>
                                        <?php if ($update == 'true'): ?>
                                            <input type="text" name="proname" class="form-control" value="<?php echo $name?>">
                                        <?php else: ?>
                                            <input type="text" name="proname" class="form-control">
                                        <?php endif;?>
                                    </div><!--form-group-->
                                    <div class="form-group">
                                        <label>Product Price: <b>Rs.</b></label>
                                        <?php if ($update == 'true'): ?>
                                            <input type="text" name="price" class="form-control" value="<?php echo $price?>">
                                        <?php else: ?>
                                            <input type="text" name="price" class="form-control">
                                        <?php endif;?>
                                    </div><!--form-group-->
                                    <div class="form-group">
                                        <label>Product Image Path: <b>img/</b> </label>
                                        <?php if ($update == 'true'): ?>
                                            <input type="text" name="path" class="form-control" value="<?php echo $path?>">
                                        <?php else: ?>
                                            <input type="text" name="path" class="form-control">
                                        <?php endif;?>
                                    </div><!--form-group-->
                                    <div class="form-group">
                                        <label>Seller:</label>
                                        <select name="seller" class="form-control">
                                            <?php if ($update == 'true'): ?>
                                                <?php 
                                                    $sql=mysqli_fetch_assoc(mysqli_query($connection,"SELECT Seller_Name FROM seller WHERE SId='$sid'"));
                                                ?>
                                                <option value="<?php echo $sid?>" selected><?php echo $sql['Seller_Name']?></option>
                                            <?php else:?>
                                                <option value="" disabled selected>Choose seller</option>
                                            <?php endif;?>
                                            <?php
                                                $s = mysqli_query($connection,"SELECT * FROM seller");
                                                while($sid=mysqli_fetch_array($s)):
                                            ?>
                                            <option value="<?php echo $sid['SId']?>"><?php echo $sid['Seller_Name']?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div><!--form-group-->
                                    <div class="form-group">
                                        <label>Category:</label>
                                        <select name="category" class="form-control">
                                            <?php if ($update == 'true'): ?>
                                                <?php $sql=mysqli_fetch_assoc(mysqli_query($connection,"SELECT Category_Name FROM product_category WHERE Id='$cid'")); ?>
                                                <option value="<?php echo $cid?>" selected><?php echo $sql['Category_Name']?></option>
                                            <?php else:?>
                                                <option value="" disabled selected>Choose category</option>
                                            <?php endif;?>
                                            <?php
                                                $s = mysqli_query($connection,"SELECT * FROM product_category");
                                                while($sid=mysqli_fetch_array($s)):
                                            ?>
                                            <option value="<?php echo $sid['Id']?>"><?php echo $sid['Category_Name']?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div><!--form-group-->
                                    <div class="form-group">
                                        <?php if ($update == 'true'): ?>
                                            <button type="submit" class="btn btn-info" name="update">Update</button>
                                        <?php else: ?>
                                            <button type="submit" class="btn btn-success" name="add">Add New Product</button>
                                        <?php endif; ?>
                                    </div><!--form-group-->
                                </form>
                <!-------------------------------Add and edit product details form end------------------------------------------------------>

                <hr>
                
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
                                <h6><?php echo $row_products['Pid'];?></h6>
                                <!-- Product Description -->
                                <div class="product-description">
                                    <p><strong>Image path : </strong><?php echo $row_products['Image'];?></p>
                                    <hr>
                                    <h4 class="product-price">Rs.<?php echo $pro_price;?></h4>
                                    <p><?php echo $pro_title;?></p>
                                    <hr>
                                    <p><strong>Seller id : </strong><?php echo $row_products['Sid'];?></p>
                                    <hr>
                                    <p><strong>Category id :</strong> <?php echo $row_products['CId'];?></p>
									<hr>
                                    <!--Buttons-->
                                    <a href="admin.php?edit=<?php echo $row_products['Pid'];?>" name="edit" class="btn btn-info">Update</a>
                                    <a href="admin.php?delete=<?php echo $row_products['Pid']; ?>" name="delete" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                            <?php endwhile;?>
                            <!-- Single gallery Item end-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <!-------------------------------Category details area------------------------------------------------------>

        <?php
            $product_table = mysqli_query($connection,'SELECT * FROM product_category;');
            $seller_table = mysqli_query($connection,'SELECT * FROM seller;');
        ?>
        <div class="row align-items-center">
                    <div class="col-12">
                        <div class="section_heading text-center">
                            <h2>Product Categories :</h2>
                        </div>
                    </div>
        </div> 
        <?php
                    //-----------------admin add new category---------------------------------------------------------------------------
                    if (isset($_POST['add_category'])) {
                        $cid = $_POST['category_id'];
                        $name = $_POST['category_name'];
                        

                        $sql = "INSERT INTO product_category VALUES ('$cid','$name')";
                        $result=mysqli_query($connection,$sql);

                        if($result){?>
                            <div class="alert alert-success">
                                    <?php
                                        echo " product gategory has been added"; 
                                    ?>
                            </div>
                            <?php
                        }
                    }
                ?>    
        <div class="container">
            <!-------------------------------Add category details form------------------------------------------------------>
        <form method="POST">
            <div class="form-group">
                <label>Category Id:</label>
                    <?php //--------get last category id-----------------
                        $lastid = mysqli_fetch_array(mysqli_query($connection,"SELECT Id FROM product_category ORDER BY Id DESC LIMIT 1;"));
                    ?>
                    <p>Last Category id: <b><?php echo $lastid['Id']; ?></b></p>
                <input type="text" name="category_id" class="form-control">
            <div class="form-group">
                <label>Category Name:</label>
                <input type="text" name="category_name" class="form-control">
            </div><!--form-group-->
            <div class="form-group">
                <button type="submit" class="btn btn-success" name="add_category">Add New Category</button>
            </div><!--form-group-->
        </form>
        <!-------------------------------Add category details form end------------------------------------------------------>
        
        <!-------------------------------category details display area------------------------------------------------------>

            <div class="row justify-content-left">
                <table class="table">
                    <tr>
                        <th>Category Id</th>
                        <th>Category Name</th>
                    </tr>
                    <?php while($result=mysqli_fetch_assoc($product_table)): ?>
                    <tr>
                        <td><?php echo $result['Id']?></td>
                        <td><?php echo $result['Category_Name'];?></td>
                    </tr>
                    <?php endwhile;?>
                </table>
            </div>
        </div>

        <hr>
        
        <!-------------------------------sellers details area------------------------------------------------------>
        <div class="row align-items-center">
                <div class="col-12">
                    <div class="section_heading text-center">
                        <h2>Sellers : </h2>
                    </div>
                </div>
        </div>    
        <div class="container">
        <?php
                    //----------------admin update seller details--------------------------------------------------------------------
                    if (isset($_POST['update_seller'])) {
                        $id = $_POST['seller_id'];
                        $name = $_POST['seller_name'];
                        $number = $_POST['seller_number'];
                        $address = $_POST['seller_address'];
                        $email = $_POST['seller_email'];

                        $edit=mysqli_query($connection,"UPDATE seller SET Seller_Name='$name', Number='$number', Address='$address', Email='$email' WHERE SId='$id'");

                        if($edit){?>
                            <div class="alert alert-info">
                                    <?php
                                        echo "Seller details has been updated!"; 
                                    ?>
                            </div>
                            <?php
                        }
                    }
                ?>
            <!-------------------------------Add and update seller details form------------------------------------------------------>
        <form method="POST">
            <div class="form-group">
                <label>Seller Id:</label>
                    <?php //--------get last seller id-----------------
                        $lastid = mysqli_fetch_array(mysqli_query($connection,"SELECT SId FROM seller ORDER BY SId DESC LIMIT 1;"));
                    ?>
                        <p>Last seller id: <b><?php echo $lastid['SId']; ?></b></p>
                <?php if ($sellerupdate == 'true'): ?>
                    <input type="text" name="seller_id" class="form-control" value="<?php echo $id?>">
                <?php else: ?>
                    <input type="text" name="seller_id" class="form-control">
                <?php endif; ?>
            </div><!--form-group-->
            <div class="form-group">
                <label>Seller Name:</label>
                <?php if ($sellerupdate == 'true'): ?>
                    <input type="text" name="seller_name" class="form-control" value="<?php echo $name?>">
                <?php else: ?>
                    <input type="text" name="seller_name" class="form-control">
                <?php endif; ?>
            </div><!--form-group-->
            <div class="form-group">
                <label>Seller Number:</label>
                <?php if ($sellerupdate == 'true'): ?>
                    <input type="text" name="seller_number" class="form-control" value="<?php echo $number?>">
                <?php else: ?>
                    <input type="text" name="seller_number" class="form-control">
                <?php endif; ?>
            </div><!--form-group-->
            <div class="form-group">
                <label>Seller Address:</label>
                <?php if ($sellerupdate == 'true'): ?>
                    <input type="text" name="seller_address" class="form-control" value="<?php echo $address?>">
                <?php else: ?>
                    <input type="text" name="seller_address" class="form-control">
                <?php endif; ?>
            </div><!--form-group-->
            <div class="form-group">
                <label>Seller Email:</label>
                <?php if ($sellerupdate == 'true'): ?>
                    <input type="text" name="seller_email" class="form-control" value="<?php echo $email?>">
                <?php else: ?>
                    <input type="text" name="seller_email" class="form-control">
                <?php endif; ?>   
            </div><!--form-group-->
            <div class="form-group">
                <?php if ($sellerupdate == 'true'): ?>
                    <button type="submit" class="btn btn-info" name="update_seller">Update</button>
                <?php else: ?>
                    <button type="submit" class="btn btn-success" name="add_seller">Add New seller</button>
                <?php endif; ?>
                
            </div><!--form-group-->
        </form>
        <!-------------------------------Add and update seller form end------------------------------------------------------>
            <div class="row justify-content-left">             
                <table class="table">
                    <tr>
                        <th>Seller Id</th>
                        <th>Seller Name</th>
                        <th>Number</th>
                        <th>Address</th>
                        <th>Email</th>
                    </tr>
                    <?php while($seller=mysqli_fetch_assoc($seller_table)): ?>
                    <tr>
                        <td><?php echo $seller['SId']?></td>
                        <td><?php echo $seller['Seller_Name'];?></td>
                        <td><?php echo $seller['Number'];?></td>
                        <td><?php echo $seller['Address'];?></td>
                        <td><?php echo $seller['Email'];?></td>
                        <td>
                            <a href="admin.php?edit_seller=<?php echo $seller['SId'];?>" name="edit_seller" class="btn btn-info">Update</a>
                        </td>
                    </tr>
                    <?php endwhile;?>
                </table>
            </div>

            <!-------------------------------user details------------------------------------------------------>
            
            
        </div>

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