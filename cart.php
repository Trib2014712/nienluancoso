<?php 

    $active='Cart';
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
                       Giỏ hàng
                   </li>
               </ul>
               
           </div>
           
           <div id="cart" class="col-md-9">
               
               <div class="box">
                   
                   <form action="cart.php" method="post" enctype="multipart/form-data">
                       
                       <h1> Giỏ hàng </h1>
                       <?php 
                        $ip_add = getRealIpUser();
                       
                        $select_cart = "select * from cart where ip_add='$ip_add'";
                        
                        $run_cart = mysqli_query($con,$select_cart);
                        
                        $count = mysqli_num_rows($run_cart);
                       ?>
                       <p class="text-muted">Bạn hiện có <?php echo $count; ?> mặt hàng trong giỏ hàng của bạn</p>
                       
                       <div class="table-responsive">
                           
                           <table class="table">
                               
                               <thead>
                                   
                                   <tr>
                                       
                                       <th colspan="2">Sản phẩm</th>
                                       <th>Số lượng</th>
                                       <th>Đơn giá</th>
                                       <th>Size</th>
                                       <th colspan="1">Xóa</th>
                                       <th colspan="2">Tổng</th>
                                       
                                   </tr>
                                   
                               </thead>
                               
                               <tbody>
                               <?php 
                               $total = 0;
                               while($row_cart = mysqli_fetch_array($run_cart)){
                                       
                                $pro_id = $row_cart['p_id'];
                                  
                                $pro_size = $row_cart['size'];
                                  
                                $pro_qty = $row_cart['qty'];
                                  
                                  $get_products = "select * from products where product_id='$pro_id'";
                                  
                                  $run_products = mysqli_query($con,$get_products);
                                  
                                  while($row_products = mysqli_fetch_array($run_products)){
                                      
                                      $product_title = $row_products['product_title'];
                                      
                                      $product_img1 = $row_products['product_img1'];
                                      
                                      $only_price = $row_products['product_price'];
                                      
                                      $sub_total = $row_products['product_price']*$pro_qty;
                                      
                                      $total += $sub_total;
                                  
                                        ?>
                                   
                                   <tr>
                                       
                                       <td>
                                           
                                           <img class="img-responsive" src="admin_area/product_images/<?php echo $product_img1; ?>" alt="Product 3a" style="width: 50px;">
                                           
                                       </td>
                                       
                                       <td>
                                           
                                       <a href="details.php?pro_id=<?php echo $pro_id; ?>"> <?php echo $product_title; ?> </a>
                                           
                                       </td>
                                       
                                       <td>
                                          
                                       <?php echo $pro_qty; ?>
                                           
                                       </td>
                                       
                                       <td>
                                           
                                       <?php echo $only_price; ?>
                                           
                                       </td>
                                       
                                       <td>
                                           
                                       <?php echo $pro_size; ?>
                                           
                                       </td>
                                       
                                       <td>
                                           
                                           <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">
                                           
                                       </td>
                                       
                                       <td>
                                           
                                            
                                       $<?php echo $sub_total; ?>
                                           
                                       </td>
                                       
                                   </tr>
                                   <?php } } ?>
                                   
                               </tbody>
                               
                               <tfoot>
                                   
                                   <tr>
                                       
                                       <th colspan="5">Tổng cộng</th>
                                       <th colspan="2">$<?php echo $total; ?></th>
                                       
                                   </tr>
                                   
                               </tfoot>
                               
                           </table>
                           
                       </div>
                       
                       <div class="box-footer">
                           
                           <div class="pull-left">
                               
                               <a href="index.php" class="btn btn-primary" style=" background:linear-gradient(90deg, #5170ff, #ff66c4);">
                                   
                                   <i class="fa fa-chevron-left" ></i> Tiếp tục shopping
                                   
                               </a>
                               
                           </div>
                           
                           <div class="pull-right">
                               
                               <button type="submit" name="update" value="Update Cart" class="btn btn-default">
                                   
                                   <i class="fa fa-refresh"></i> Cập nhập giỏ hàng
                                   
                               </button>
                               
                               <a href="checkout.php" class="btn btn-primary" style=" background:linear-gradient(90deg, #5170ff, #ff66c4);">
                                   
                               Tiến hành thanh toán <i class="fa fa-chevron-right"></i>
                                   
                               </a>
                               
                           </div>
                           
                       </div>
                       
                   </form>
                   
               </div>
               <?php 
               
                function update_cart(){
                    
                    global $con;
                    
                    if(isset($_POST['update'])){
                        
                        foreach($_POST['remove'] as $remove_id){
                            //chạy dòng lặp để duyệt
                            $delete_product = "delete from cart where p_id='$remove_id'";
                            
                            $run_delete = mysqli_query($con,$delete_product);
                            
                            if($run_delete){
                                
                                echo "<script>window.open('cart.php','_self')</script>";
                                
                            }
                            
                        }
                        
                    }
                    
                }
               
               echo @$up_cart = update_cart();
               
               ?>
               
               <div id="row same-heigh-row">
                   <div class="col-md-3 col-sm-6">
                       <div class="box same-height headline">
                           <h3 class="text-center">Sản phẩm bạn có thể thích</h3>
                       </div>
                   </div>
                   <?php 
                   
                   $get_products = "select * from products order by rand() LIMIT 0,3";
                   
                   $run_products = mysqli_query($con,$get_products);
                   
                   while($row_products=mysqli_fetch_array($run_products)){
                       
                       $pro_id = $row_products['product_id'];
                       
                       $pro_title = $row_products['product_title'];
                       
                       $pro_price = $row_products['product_price'];
                       
                       $pro_img1 = $row_products['product_img1'];
                       
                       echo "
                       
                    <div class='col-md-3 col-sm-6 center-responsive'><!-- col-md-3 col-sm-6 center-responsive Begin -->
                       <div class='product same-height'><!-- product same-height Begin -->
                           <a href='details.php?pro_id=$pro_id'>
                               <img class='img-responsive' src='admin_area/product_images/$pro_img1' alt='Product 6'>
                            </a>
                            
                            <div class='text'><!-- text Begin -->
                                <h3><a href='details.php?pro_id=$pro_id'> $pro_title </a></h3>
                                
                                <p class='price'>$$pro_price</p>
                                
                            </div><!-- text Finish -->
                            
                        </div><!-- product same-height Finish -->
                   </div><!-- col-md-3 col-sm-6 center-responsive Finish -->
                   
                       ";
                       
                   }
                   
                   ?>
                   
               </div>
               
           </div>
           
           <div class="col-md-3">
               
               <div id="order-summary" class="box">
                   
                   <div class="box-header">
                       
                       <h3>Tóm tắt theo thứ tự</h3>
                       
                   </div>
                   
                   <p class="text-muted">
                       
                   Chi phí vận chuyển và bổ sung được tính dựa trên giá trị bạn đã nhập
                       
                   </p>
                   
                   <div class="table-responsive">
                       
                       <table class="table">
                           
                           <tbody>
                               
                               <tr>
                                   
                                   <td> Tổng số đơn đặt hàng</td>
                                   <th>$<?php echo $total; ?></th>
                                   
                               </tr>
                               
                               <tr>
                                   
                                   <td> Vận chuyển và Xử lý </td>
                                   <td> $0 </td>
                                   
                               </tr>
                               
                               <tr>
                                   
                                   <td>Thuế</td>
                                   <th> $0 </th>
                                   
                               </tr>
                               
                               <tr class="total">
                                   
                                   <td> Tổng cộng</td>
                                   <th>$<?php echo $total; ?></th>
                                   
                               </tr>
                               
                           </tbody>
                           
                       </table>
                       
                   </div>
                   
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