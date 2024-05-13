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
                                Shop
                            </li>
                            <li> 
                                <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>
                            </li>
                            <li> <?php echo $pro_title; ?> </li>  
                    </ul>

            </div>      
            <div class="col-md-3">
            <?php 
                include("includes/sidebar.php");
                ?>   
            </div>
            <div class="col-md-9">
            <div id="productMain" class="row">
            <div class="col-sm-6">
            <div id="mainImage">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        
        <div class="carousel-inner">
            <div class="item active">
                <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Product 3-a"></center>
            </div>
            <div class="item">
                <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="Product 3-b"></center>
            </div>
            <div class="item">
                <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="Product 3-c"></center>
            </div>
        </div>
        
    <a href="#myCarousel" class="left carousel-control" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Trước</span>
    </a>
    
    <a href="#myCarousel" class="right carousel-control" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Trước</span>
    </a>

        </div>
    </div>
</div>

        <div class="col-sm-6">
        <div class="box">

        <h1 class="text-center"><?php echo $pro_title; ?></h1>

        <?php  add_cart(); ?>
        <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post">
        <div class="form-group">
            <label for="" class="col-md-5 control-label">Số lượng sản phẩm</label>       
        <div class="col-md-7">
            <select name="product_qty" id="" class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
    </div>
    
    <div class="form-group">
    <label class="col-md-5 control-label">Kích thước sản phẩm</label>
           
        <div class="col-md-7">
                                       
            <select name="product_size" class="form-control" required oninput="setCustomValidity('')" oninvalid="setCustomValidity('Phải chọn 1 size cho sản phẩm')">               
                <option disabled selected>Chọn size</option>
                <option>Nhỏ</option>
                <option>Vừa</option>
                <option>Lớn</option>
            </select>
        </div>
    </div>
            <p class="price">$ <?php echo  $pro_price; ?></p>
            <p class="text-center buttons" >
            <button class="btn btn-primary i fa fa-shopping-cart"  style=" background:linear-gradient(90deg, #5170ff, #ff66c4);">Thêm vào giỏ hàng</button></p>
                               
        </form>
     </div> 
                       <div class="row" id="thumbs">
                           
                           <div class="col-xs-4">
                               <a data-target="#myCarousel" data-slide-to="0"  href="#" class="thumb">
                                   <img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="product 1" class="img-responsive">
                               </a>
                           </div>
                           
                           <div class="col-xs-4">
                               <a data-target="#myCarousel" data-slide-to="1"  href="#" class="thumb">
                                   <img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="product 2" class="img-responsive">
                               </a>
                           </div>
                           
                           <div class="col-xs-4">
                               <a data-target="#myCarousel" data-slide-to="2"  href="#" class="thumb">
                                   <img src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="product 4" class="img-responsive">
                               </a>
                           </div>
                           
                       </div>
                       
                   </div>
               </div>
               
               <div class="box" id="details">
                       
                       <h4> Chi tiết sản phẩm</h4>
                   
                   <p>
                       
                   <?php echo $pro_desc; ?>
                       
                   </p>
                   
                        
                       <hr>
                   
               </div>
               
               <div id="row same-heigh-row">
                   <div class="col-md-3 col-sm-6">
                       <div class="box same-height headline">
                           <h3 class="text-center">Sản phẩm bạn có thể thích</h3>
                       </div>
                   </div>
                   
                   <?php 
                   
                   $get_products = "select * from products order by 1 DESC LIMIT 0,3";
                  
                   $run_products = mysqli_query($con,$get_products);
                  
                   while($row_products=mysqli_fetch_array($run_products)){
                      
                      $pro_id = $row_products['product_id'];
                      
                      $pro_title = $row_products['product_title'];
                      
                      $pro_img1 = $row_products['product_img1'];
                      
                      $pro_price = $row_products['product_price'];
                      
                      echo "
                      
                       <div class='col-md-3 col-sm-6 center-responsive'>
                       
                           <div class='product same-height'>
                           
                               <a href='details.php?pro_id=$pro_id'>
                               
                                   <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                               
                               </a>
                               
                               <div class='text'>
                               
                                   <h3> <a href='details.php?pro_id=$pro_id'> $pro_title </a> </h3>
                                   
                                   <p class='price'> $ $pro_price </p>
                               
                               </div>
                           
                           </div>
                       
                       </div>
                      
                      ";
                      
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
