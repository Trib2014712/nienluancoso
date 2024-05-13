<center>
    
    <h1> Đơn hàng của tôi </h1>
    
    <!-- <p class="lead"> Đơn đặt hàng của bạn ở một nơi</p> -->
    
    <p class="text-muted">
        
    Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ <a href="../contact.php">Liên hệ chúng tôi</a>.Công việc Dịch vụ khách hàng của chúng tôi <strong>24/7</strong>
        
    </p>
    
</center>


<hr>


<div class="table-responsive">
    
    <table class="table table-bordered table-hover">
        
        <thead>
            
            <tr>
                
                 <th> Stt: </th>
                 <th> Số tiền: </th>
                 <th> Mã hóa đơn: </th>
                 <th> Số lượng: </th>
                 <th> Kích thước: </th>
                 <th> Ngày đặt hàng:</th>
                 <th> Đã thanh toán / Chưa thanh toán: </th>
                 <th> Trạng thái: </th>
                
            </tr>
            
        </thead>
        
        <tbody>
            
        <?php 
            
            $customer_session = $_SESSION['customer_email'];
            
            $get_customer = "select * from customers where customer_email='$customer_session'";
            
            $run_customer = mysqli_query($con,$get_customer);
            
            $row_customer = mysqli_fetch_array($run_customer);
            
            $customer_id = $row_customer['customer_id'];
            
            $get_orders = "select * from customer_orders where customer_id='$customer_id'";
            
            $run_orders = mysqli_query($con,$get_orders);
            
            $i = 0;
            
            while($row_orders = mysqli_fetch_array($run_orders)){
                
                $order_id = $row_orders['order_id'];
                
                $due_amount = $row_orders['due_amount'];
                
                $invoice_no = $row_orders['invoice_no'];
                
                $qty = $row_orders['qty'];
                
                $size = $row_orders['size'];
                
                $order_date = substr($row_orders['order_date'],0,11);
                
                $order_status = $row_orders['order_status'];
                
                $i++;
                
                if($order_status=='chưa giải quyết'){
                    
                    $order_status = 'Chưa thanh toán';
                    
                }else{
                    
                    $order_status = 'Đã thanh toán';
                    
                }
            
            ?>
            
            <tr>
                <th> <?php echo $i; ?> </th>
                <td> $<?php echo $due_amount; ?> </td>
                <td> <?php echo $invoice_no; ?> </td>
                <td> <?php echo $qty; ?> </td>
                <td> <?php echo $size; ?> </td>
                <td> <?php echo $order_date; ?> </td>
                <td> <?php echo $order_status; ?> </td>
                
                <td>
                    
                    <a href="confirm.php?order_id=<?php echo $order_id; ?>" target="_blank" class="btn btn-primary btn-sm" style=" background:linear-gradient(90deg, #5170ff, #ff66c4);"> Xác nhận đã thanh toán</a>
                    
                </td>
                
            </tr>
            
            <?php } ?>
        </tbody>
        
    </table>
    
</div>