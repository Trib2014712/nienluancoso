<?php 
session_start();
include("includes/db.php");
include("functions/functions.php");

?>

<?php 

if(isset($_GET['pro_id'])){
    
    $product_id = $_GET['pro_id'];
    
    $get_product = "select * from products where product_id='$product_id'";
    
    $run_product = mysqli_query($con,$get_product);
    
    $row_product = mysqli_fetch_array($run_product);
    
    $p_cat_id = $row_product['p_cat_id'];
    
    $pro_title = $row_product['product_title'];
    
    $pro_price = $row_product['product_price'];
    
    $pro_desc = $row_product['product_desc'];
    
    $pro_img1 = $row_product['product_img1'];
    
    $pro_img2 = $row_product['product_img2'];
    
    $pro_img3 = $row_product['product_img3'];
    
    $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
    
    $run_p_cat = mysqli_query($con,$get_p_cat);
    
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    
    $p_cat_title = $row_p_cat['p_cat_title'];
    
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TQT-Shop</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
   
   <div id="top" style=" background:linear-gradient(90deg, #5170ff, #ff66c4);">
       
       <div class="container" >
           
           <div class="col-md-6 offer">
               
               <a href="#" class="btn btn-success btn-sm" style=" background:linear-gradient(90deg, #5170ff, #ff66c4);">
                  
               <?php 
                   
                   if(!isset($_SESSION['customer_email'])){
                       
                       echo "Xin chào: Bạn";
                       
                   }else{
                       
                       echo "Xin chào: " . $_SESSION['customer_email'] . "";
                       
                   }
                   
                   ?>
               </a>
               <a href="checkout.php"><?php items() ?> mặt hàng trong giỏ hàng của bạn | Tổng giá: <?php Total_price() ?> </a>
               
           </div>
           
           <div class="col-md-6">
               
               <ul class="menu">
                   
                   <li>
                       <a href="customer_register.php">Đăng ký</a>
                   </li>
                   <li>
                       <a href="checkout.php">Tài khoản của tôi</a>
                   </li>
                   <li>
                       <a href="cart.php">Đi đến giỏ hàng</a>
                   </li>
                   <li>
                       <a href="checkout.php">
                          
                       <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                       
                                echo "<a href='checkout.php'> Đăng nhập </a>";

                               }else{

                                echo " <a href='logout.php'> Đăng xuất </a> ";

                               }
                           
                           ?>
                       </a>
                   </li>
                   
               </ul>
               
           </div>
           
       </div>
       
   </div>
   
   <div id="navbar" class="navbar navbar-default">
       
       <div class="container">
           
           <div class="navbar-header">
               
               <a href="index.php" class="navbar-brand home">
                   
                   <img src="./images/Screenshot 2023-11-29 165938.png" class="hidden-xs">
                   <img src="./images/Screenshot 2023-11-29 165938.png"  class="visible-xs">
                   
               </a>
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
                   <span class="sr-only">Chuyển đổi điều hướng thành</span>
                   
                   <i class="fa fa-align-justify"></i>
                   
               </button>
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   
                   <span class="sr-only">Chuyển đổi tìm kiếm</span>
                   
                   <i class="fa fa-search"></i>
                   
               </button>
               
           </div>
           
           <div class="navbar-collapse collapse" id="navigation">
               
               <div class="padding-nav">
                   
                   <ul class="nav navbar-nav left">
                       
                       <li class="<?php if($active=='Home') echo"active"; ?>">
                           <a href="index.php">Trang chủ</a>
                       </li>
                       <li class="<?php if($active=='Shop') echo"active"; ?>">
                           <a href="shop.php">Shop</a>
                       </li>
                       <li class="<?php if($active=='Account') echo"active"; ?>">
                           
                           <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                               
                               echo"<a href='checkout.php'>Tài khoản của bạn</a>";
                               
                           }else{
                               
                              echo"<a href='customer/my_account.php?my_orders'>Tài khoản của bạn</a>"; 
                               
                           }
                           
                           ?>
                           
                       </li>
                       <li class="<?php if($active=='Cart') echo"active"; ?>">
                           <a href="cart.php">Giỏ hàng</a>
                       </li>
                       <li class="<?php if($active=='Contact') echo"active"; ?>">
                           <a href="contact.php">Liên hệ chúng tôi</a>
                       </li>
                       
                   </ul>
                   
               </div>
               
               <a href="cart.php" class="btn navbar-btn btn-primary right" style=" background:linear-gradient(90deg, #5170ff, #ff66c4);">
                   
                   <i class="fa fa-shopping-cart" ></i>
                   
                   <span> <?php items() ?> Các mặt hàng trong giỏ hàng của bạn</span>
                   
               </a>
               
               <div class="navbar-collapse collapse right" >
                   
                   <button class="btn btn-primary navbar-btn" style=" background:linear-gradient(90deg, #5170ff, #ff66c4);"type="button" data-toggle="collapse" data-target="#search">
                       
                       <span class="sr-only">Chuyển đổi thanh tìm kiếm</span>
                       
                       <i class="fa fa-search"></i>
                       
                   </button>
                   
               </div>
               
               <div class="collapse clearfix" id="search" >
                   
                   <form method="get" action="search.php" class="navbar-form">
                       
                       <div class="input-group">
                           
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                           
                           <span class="input-group-btn">
                           
                           <button type="submit" name="search" value="Search" class="btn btn-primary" style="background:linear-gradient(90deg, #5170ff, #ff66c4);">
                               
                               <i class="fa fa-search"></i>
                               
                           </button>
                           
                           </span>
                           
                       </div>
                       
                   </form>
                   
               </div>
               
           </div>
           
       </div>
       
   </div>
   
   