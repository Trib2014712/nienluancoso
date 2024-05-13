<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-4">
               
                
                <h4>Người dùng</h4>
                
                <ul>
                <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                               
                               echo"<a href='checkout.php'>Đặng nhập</a>";
                               
                           }else{
                               
                              echo"<a href='customer/my_account.php?my_orders'>Tài khoản của bạn</a>"; 
                               
                           }
                           
                           ?>
                    <li><a href="customer_register.php">Đăng ký</a></li>
                </ul>
                
                <hr class="hidden-md hidden-lg hidden-sm">
                
            </div>
            
            
            <div class="col-sm-4 col-md-4">
                
                <h4>Tìm chúng tôi</h4>
                
                <p>
                     <strong>TQT-Shop</strong>
                     <br/>Quản lý
                     <br/>Nhân viên
                     <br/>038-3023-899
                     <br/>Tri@gmail.com
                     <br/><strong>Mr Tri.</strong>
                </p>
                
                <a href="contact.php">Kiểm tra trang liên hệ của chúng tôi</a>
                
                <hr class="hidden-md hidden-lg">
                
            </div>
            
            <div class="col-sm-4 col-md-4">
                
                <h4>Cảm ơn</h4>
                
                <p class="m-0 text-white">Cửa hàng chúng tôi rất vui lòng khi được phục vụ quý khách.</p>
                
                <hr>
                
                <h4>Giữ liên lạc</h4>
                
                <p class="social">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-google-plus"></a>
                    <a href="#" class="fa fa-envelope"></a>
                </p>
                
            </div>
        </div>
    </div>
</div>


<div id="copyright" style=" background:linear-gradient(90deg, #5170ff, #ff66c4);">
    <div class="container">
        <div class="col-md-6">
            
            <p class="pull-left text text-dark">&copy; Cửa hàng TQT-Shop 2023 bảo lưu mọi quyền</p>
            
        </div>
        <div class="col-md-6">
            
            <p class="pull-right"> Chủ đề của: <a href="#">TQT-Shop</a></p>
            
        </div>
    </div>
</div>