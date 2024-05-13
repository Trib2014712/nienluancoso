<?php 

session_start();

if(!isset($_SESSION['customer_email'])){
    
    echo "<script>window.open('../checkout.php','_self')</script>";
    
}else{

include("includes/db.php");
include("functions/functions.php");
    
if(isset($_GET['order_id'])){
    
    $order_id = $_GET['order_id'];
    
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
    <link rel="stylesheet" href="styles/style.css">
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
                       
                       echo "Welcome: " . $_SESSION['customer_email'] . "";
                       
                   }
                   
                   ?>
               
               </a>
               <a href="checkout.php"> <?php items() ?> mặt hàng trong giỏ hàng của bạn | Tổng giá: <?php Total_price() ?> </a>
               
           </div>
           
           <div class="col-md-6">
               
               <ul class="menu">
                   
                    <li>
                        <a href="../customer_register.php">Đăng ký</a>
                    </li>
                    <li>
                        <a href="my_account.php">Tài khoản của tôi</a>
                    </li>
                    <li>
                        <a href="../cart.php">Vào giỏ hàng</a>
                    </li>
                   <li>
                       <a href="../checkout.php">
                       
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
               
               <a href="../index.php" class="navbar-brand home">
                   
               <img src="../images/Screenshot 2023-11-29 165938.png" class="hidden-xs">
                   <img src="../images/Screenshot 2023-11-29 165938.png"  class="visible-xs">
                   
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
                       
                       <li>
                           <a href="../index.php">Trang chủ</a>
                       </li>
                       <li>
                           <a href="../shop.php">Shop</a>
                       </li>
                       <li class="active">
                           <a href="my_account.php">Tài khoản của tôi</a>
                       </li>
                       <li>
                           <a href="../cart.php">Giỏ hàng</a>
                       </li>
                       <li>
                           <a href="../contact.php">Liên hệ chúng tôi</a>
                       </li>
                       
                   </ul>
                   
               </div>
               
               <a href="../cart.php" class="btn navbar-btn btn-primary right" style=" background:linear-gradient(90deg, #5170ff, #ff66c4);">
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span><?php items(); ?> sản phẩm trong giỏ hàng của bạn</span>
                   
               </a>
               
               <div class="navbar-collapse collapse right" >
                   
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search" style=" background:linear-gradient(90deg, #5170ff, #ff66c4);">
                       
                       <span class="sr-only">Chuyển đổi tìm kiếm</span>
                       
                       <i class="fa fa-search"></i>
                       
                   </button>
                   
               </div>
               
               <div class="collapse clearfix" id="search">
                   
                   <form method="get" action="results.php" class="navbar-form">
                       
                       <div class="input-group">
                           
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                           
                           <span class="input-group-btn">
                           
                           <button type="submit" name="search" value="Search" class="btn btn-primary"><!-- btn btn-primary Begin -->
                               
                               <i class="fa fa-search"></i>
                               
                           </button>
                           
                           </span>
                           
                       </div>
                       
                   </form>
                   
               </div>
               
           </div>
           
       </div>
       
   </div>
   
   <div id="content">
       <div class="container">
           <div class="col-md-12">
               
               <ul class="breadcrumb">
                   <li>
                       <a href="index.php">Trang chủ</a>
                   </li>
                   <li>
                   Tài khoản của tôi
                   </li>
               </ul>
               
           </div>
           
           <div class="col-md-3">
   
   <?php 
    
    include("includes/sidebar.php");
    
    ?>
               
           </div>
           
           <div class="col-md-9">
               
               <div class="box">
                   
                   <h1 align="center"> Vui lòng xác nhận thanh toán của bạn</h1>
                   
                   <form action="confirm.php?update_id=<?php echo $order_id;  ?>" method="post" enctype="multipart/form-data"><!-- form Begin -->
                       
                       <div class="form-group">
                           
                         <label> Mã hóa đơn : </label>
                          
                          <input type="text" class="form-control" name="invoice_no" required>
                           
                       </div>
                       
                       <div class="form-group">
                        
                         <label> Số tiền :</label>
                          
                          <input type="text" class="form-control" name="amount_sent" required>
                           
                       </div>
                       
                       <div class="form-group">
                           
                         <label>Chọn Chế độ thanh toán: </label>
                          
                          <select name="payment_mode" class="form-control"><!-- form-control Begin -->
                          
                               <option> Chọn Chế độ thanh toán </option>
                               <option> Sacombank</option>
                               <option> Momo</option>
                               <option> Vietcombank</option>
                              
                          </select>
                           
                       </div>
                       
                       <!-- <div class="form-group">
                           
                         <label> ID giao dịch: </label>
                          
                          <input type="text" class="form-control" name="ref_no" required>
                           
                       </div> -->
<!--                        
                       <div class="form-group">
                           
                         <label> Mã Vietcombank/Sacombank/Momo: </label>
                          
                          <input type="text" class="form-control" name="code" required>
                           
                       </div> -->
                       
                       <div class="form-group">
                           
                         <label> Ngày thanh toán: </label>
                          
                          <input type="text" class="form-control" name="date" required>
                           
                       </div>
                       
                       <div class="text-center">
                           
                           <button class="btn btn-primary btn-lg" name="confirm_payment" style=" background:linear-gradient(90deg, #5170ff, #ff66c4);">
                               
                               <i class="fa fa-user-md"></i> Xác nhận thanh toán
                               
                           </button>
                           
                       </div>
                       
                   </form>
                   
                   <?php 
                   
                    if(isset($_POST['confirm_payment'])){
                        
                        $update_id = $_GET['update_id'];
                        
                        $invoice_no = $_POST['invoice_no'];
                        
                        $amount = $_POST['amount_sent'];
                        
                        $payment_mode = $_POST['payment_mode'];
                        
                        $ref_no = $_POST['ref_no'];
                        
                        $code = $_POST['code'];
                        
                        $payment_date = $_POST['date'];
                        
                        $complete = "Hoàn thành";
                        
                        $insert_payment = "insert into payments (invoice_no,amount,payment_mode,ref_no,code,payment_date) values ('$invoice_no','$amount','$payment_mode','$ref_no','$code','$payment_date')";
                        
                        $run_payment = mysqli_query($con,$insert_payment);
                        
                        $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";
                        
                        $run_customer_order = mysqli_query($con,$update_customer_order);
                        
                        $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";
                        
                        $run_pending_order = mysqli_query($con,$update_pending_order);
                        
                        if($run_pending_order){
                            
                            echo "<script>alert('Cảm ơn bạn đã mua hàng, đơn hàng của bạn sẽ được hoàn thành trong vòng 24 giờ làm việc')</script>";
                            
                            echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                            
                        }
                        
                    }
                   
                   ?>
                   
               </div>
               
           </div>
           
       </div>
   </div>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>
<footer>
    <?php 
    
    include("includes/footer.php");
    
    ?>
</footer>
<?php } ?>