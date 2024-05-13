<?php 

    $active='Account';
    include("includes/header.php");

?>
   
   <div id="content">
       <div class="container">
           <div class="col-md-12">
               
               <ul class="breadcrumb">
                   <li>
                       <a href="index.php">Trang chủ</a>
                   </li>
                   <li>
                       Đăng ký
                   </li>
               </ul>
               
           </div>
           
           <div class="col-md-3">
               
           </div>
           
           <div class="col-md-12">
           
           <?php 
           
           if(!isset($_SESSION['customer_email'])){
               
               include("customer/customer_login.php");
               
           }else{
               
               include("payment_options.php");
               
           }
           
           ?>
           
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