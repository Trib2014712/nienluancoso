<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Điều khiển / Xem đơn đặt hàng
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">
               
                   <i class="fa fa-tags"></i> Xem đơn đặt hàng
                
               </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        
                        <thead>
                            <tr>
                                <th> No: </th>
                                <th> Email khách hàng: </th>
                                <th> Số hóa đơn: </th>
                                <th> Tên sản phẩm: </th>
                                <th> Số lượng sản phẩm: </th>
                                <th> Kích thước sản phẩm: </th>
                                <th> Ngày đặt hàng: </th>
                                <th> Tổng cộng: </th>
                                <th> Trạng thái: </th>
                                <th> Xóa: </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                            <?php 
          
                                $i=0;
                            
                                $get_orders = "select * from pending_orders";
                                
                                $run_orders = mysqli_query($con,$get_orders);
          
                                while($row_order=mysqli_fetch_array($run_orders)){
                                    
                                    $order_id = $row_order['order_id'];
                                    
                                    $c_id = $row_order['customer_id'];
                                    
                                    $invoice_no = $row_order['invoice_no'];
                                    
                                    $product_id = $row_order['product_id'];
                                    
                                    $qty = $row_order['qty'];
                                    
                                    $size = $row_order['size'];
                                    
                                    $order_status = $row_order['order_status'];
                                    
                                    $get_products = "select * from products where product_id='$product_id'";
                                    
                                    $run_products = mysqli_query($con,$get_products);
                                    
                                    $row_products = mysqli_fetch_array($run_products);

                                    if($row_products) {
                                        $product_title = $row_products['product_title'];
                                    
                                        $get_customer = "select * from customers where customer_id='$c_id'";
                                        
                                        $run_customer = mysqli_query($con,$get_customer);
                                        
                                        $row_customer = mysqli_fetch_array($run_customer);
                                        
                                        $customer_email = $row_customer['customer_email'];
                                        
                                        $get_c_order = "select * from customer_orders where order_id='$order_id'";
                                        
                                        $run_c_order = mysqli_query($con,$get_c_order);
                                        
                                        $row_c_order = mysqli_fetch_array($run_c_order);
                                        
                                        $order_date = $row_c_order['order_date'];
                                        
                                        $order_amount = $row_c_order['due_amount'];
                                        
                                        $i++;
                                    }
                                    
                            
                            ?>
                            
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $customer_email; ?> </td>
                                <td> <?php echo $invoice_no; ?></td>
                                <td> <?php echo $product_title;?> </td>
                                <td> <?php echo $qty; ?></td>
                                <td> <?php echo $size; ?> </td>
                                <td> <?php echo $order_date; ?> </td>
                                <td> <?php echo $order_amount; ?> </td>
                                <td>
                                    
                                    <?php 
                                    
                                        if($order_status=='chưa giải quyết'){
                                            
                                            echo $order_status='Chưa giải quyết';
                                            
                                        }else{
                                            
                                            echo $order_status='Hoàn thành';
                                            
                                        }
                                    
                                    ?>
                                    
                                </td>
                                <td> 
                                     
                                     <a href="index.php?delete_order=<?php echo $order_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Xóa
                                    
                                     </a> 
                                     
                                </td>
                            </tr>
                            
                            <?php } ?>
                            
                        </tbody>
                        
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php } ?>