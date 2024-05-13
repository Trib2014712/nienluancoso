<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>windown.open('login.php','_self')</script>";
    } else{
?>
    
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><!-- navbar-toggle begin -->
            
            <span class="sr-only">Thanh điều hướng</span>
            
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            
        </button>
        
        <a href="index.php?dashboard" class="navbar-brand">Admin</a>
        
    </div>
    
    <ul class="nav navbar-right top-nav">
        
        <li class="dropdown">
            
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                
                <i class="fa fa-user"></i>  <b class="caret"></b>
                
            </a>
            
            <ul class="dropdown-menu">
                <li>
                    <a href="../admin_area/dieukhien.php">
                        
                        <i class="fa fa-fw fa-user"></i> Hồ sơ
                        
                    </a>
                </li>
                
                <li>
                    <a href="index.php?view_products">
                        
                        <i class="fa fa-fw fa-envelope"></i> Sản phẩm 
                        
                        <span class="badge">7</span>
                        
                    </a>
                </li>
                
                <li>
                    <a href="index.php?view_customers">
                        
                        <i class="fa fa-fw fa-users"></i> Khách hàng
                        
                        <span class="badge">11</span>
                        
                    </a>
                </li>
                
                <li>
                    <a href="index.php?view_cats">
                        
                        <i class="fa fa-fw fa-gear"></i> Danh mục sản phẩm
                        
                        <span class="badge">4</span>
                        
                    </a>
                </li>
                
                <li class="divider"></li>
                
                <li>
                    <a href="logout.php">
                        
                        <i class="fa fa-fw fa-power-off"></i> Đăng xuất
                        
                    </a>
                </li>
                
            </ul>
            
        </li>
        
    </ul>
    
    <div class="collapse navbar-collapse navbar-ex1-collapse bg-dark">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php?dashboard">
                        
                        <i class="fa fa-fw fa-dashboard"></i> Trang chủ

                        
                </a>
                
            </li>
            
            <li>
                <a href="#" data-toggle="collapse" data-target="#products">
                        
                        <i class="fa fa-fw fa-tag"></i> Sản phẩm
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a>
                
                <ul id="products" class="collapse">
                    <li>
                        <a href="index.php?insert_product"> Thêm sản phẩm </a>
                    </li>
                    <li>
                        <a href="index.php?view_products"> Xem sản phẩm </a>
                    </li>
                </ul>
                
            </li>
            
            <li>
                <a href="#" data-toggle="collapse" data-target="#p_cat">
                        
                        <i class="fa fa-fw fa-edit"></i> Danh mục sản phẩm
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a>
                
                <ul id="p_cat" class="collapse">
                    <li>
                        <a href="index.php?insert_p_cat"> Thêm danh mục sản phẩm</a>
                    </li>
                    <li>
                        <a href="index.php?view_p_cats"> Xem danh mục sản phẩm </a>
                    </li>
                </ul>
                
            </li>
            
            <li>
                <a href="#" data-toggle="collapse" data-target="#cat">
                        
                        <i class="fa fa-fw fa-book"></i> Danh mục
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a>
                
                <ul id="cat" class="collapse">
                    <li>
                        <a href="index.php?insert_cat"> Thêm danh mục </a>
                    </li>
                    <li>
                        <a href="index.php?view_cats"> Xem danh mục </a>
                    </li>
                </ul>
                
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#slides">
                        
                        <i class="fa fa-fw fa-gear"></i> Slides
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a>
                
                <ul id="slides" class="collapse">
                    <li>
                        <a href="index.php?insert_slide"> Thêm Slide </a>
                    </li>
                    <li>
                        <a href="index.php?view_slides"> Xem Slides </a>
                    </li>
                </ul>
                
            </li>
            
            <li>
                <a href="index.php?view_customers">
                    <i class="fa fa-fw fa-users"></i> Xem khách hàng
                </a>
            </li>
            
            <li>
                <a href="index.php?view_orders">
                    <i class="fa fa-fw fa-book"></i> Xem đơn đặt hàng
                </a>
            </li>
            
            <li>
                <a href="index.php?view_payments">
                    <i class="fa fa-fw fa-money"></i> Xem thanh toán
                </a>
            </li>
            
            <li>
                <a href="#" data-toggle="collapse" data-target="#users">
                        
                        <i class="fa fa-fw fa-users"></i> Người dùng
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a>
                
                <ul id="users" class="collapse">
                    <li>
                        <a href="index.php?insert_user"> Thêm người dùng </a>
                    </li>
                    <li>
                        <a href="index.php?view_users"> Xem người dùng </a>
                    </li>
                </ul>
                
            </li>
            
            <li>
                <a href="logout.php">
                    <i class="fa fa-fw fa-power-off"></i> Đăng xuất
                </a>
            </li>
            
        </ul>
    </div>
    
</nav>
<?php } ?>