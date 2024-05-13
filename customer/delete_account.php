<center>
    
    <h1>Bạn có thực sự muốn xóa tài khoản của mình không? </h1>
    
    <form action="" method="post">
        
       <input type="submit" name="Yes" value="Đúng, tôi muốn xóa" class="btn btn-danger"> 
        
       <input type="submit" name="No" value="Không, tôi không muốn xóa" class="btn btn-primary"> 
        
    </form>
    
</center>


<?php 

$c_email = $_SESSION['customer_email'];

if(isset($_POST['Yes'])){
    
    $delete_customer = "delete from customers where customer_email='$c_email'";
    
    $run_delete_customer = mysqli_query($con,$delete_customer);
    
    if($run_delete_customer){
        
        session_destroy();
        
        echo "<script>alert('Xóa thành công tài khoản của bạn, cảm thấy tiếc về điều này. Tạm biệt')</script>";
        
        echo "<script>window.open('../index.php','_self')</script>";
        
    }
    
}

if(isset($_POST['No'])){
    
    echo "<script>window.open('my_account.php?my_orders','_self')</script>";
    
}

?>