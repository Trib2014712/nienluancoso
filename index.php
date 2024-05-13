
<?php 

    $active='home';
    include("includes/header.php");

?>
   <div class="container" id="slider">
       
       <div class="col-md-12">
           
           <div class="carousel slide" id="myCarousel" data-ride="carousel">
               
               <ol class="carousel-indicators">
                   
                   <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                   <li data-target="#myCarousel" data-slide-to="1"></li>
                   <li data-target="#myCarousel" data-slide-to="2"></li>
                   <li data-target="#myCarousel" data-slide-to="3"></li>
                   
               </ol>
               
               <div class="carousel-inner">
                  
                  <?php 
                   
                   $get_slides = "select * from slider LIMIT 0,1";
                   
                   $run_slides = mysqli_query($con,$get_slides);
                   
                   while($row_slides=mysqli_fetch_array($run_slides)){
                       
                       $slide_name = $row_slides['slide_name'];
                       $slide_image = $row_slides['slide_image'];
                       
                       echo "
                       
                       <div class='item active'>
                       
                       <img src='admin_area/slides_images/$slide_image'>
                       
                       </div>
                       
                       ";
                       
                   }
                   
                   $get_slides = "select * from slider LIMIT 1,3";
                   
                   $run_slides = mysqli_query($con,$get_slides);
                   
                   while($row_slides=mysqli_fetch_array($run_slides)){
                       
                       $slide_name = $row_slides['slide_name'];
                       $slide_image = $row_slides['slide_image'];
                       
                       echo "
                       
                       <div class='item' >
                       
                       <img src='admin_area/slides_images/$slide_image'>
                       
                       </div>
                       
                       ";
                       
                   }
                   
                   ?>
                   
               </div>
               
               <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                   
                   <span class="glyphicon glyphicon-chevron-left"></span>
                   <span class="sr-only">Previous</span>
                   
               </a>
               
               <a href="#myCarousel" class="right carousel-control" data-slide="next">
                   
                   <span class="glyphicon glyphicon-chevron-right"></span>
                   <span class="sr-only">Next</span>
                   
               </a>

           </div>
           
       </div>
       
   </div>
   
   <div id="advantages">
       
       <div class="container">
           
           <div class="same-height-row">
               
               <div class="col-sm-4">
                   
                   <div class="box same-height" >
                       
                       <div class="icon">
                           
                           <i class="fa fa-heart"></i>
                           
                       </div>
                       <div  style=" color:linear-gradient(90deg, #5170ff, #ff66c4);">
                       
                       <h3 ><a href="#" > Phục vụ khách hàng tốt nhất</a></h3>
                       
                       <p>Thời trang TQT xây dựng một trong những thương hiệu “THỜI TRANG BỀN VỮNG” đầu tiên tại Việt Nam.</p>
                       </div>
                   </div>
                   
               </div>
               
               <div class="col-sm-4">
                   
                   <div class="box same-height">
                       
                       <div class="icon">
                           
                           <i class="fa fa-tag"></i>
                           
                       </div>
                       
                       <h3><a href="#">Gía tốt nhất trên thị trường</a></h3>
                       
                       <p>Thời trang TQT xây dựng một trong những thương hiệu “THỜI TRANG BỀN VỮNG” đầu tiên tại Việt Nam.</p>
                       
                   </div>
                   
               </div>
               
               <div class="col-sm-4">
                   
                   <div class="box same-height">
                       
                       <div class="icon">
                           
                           <i class="fa fa-thumbs-up"></i>
                           
                       </div>
                       
                       <h3><a href="#">100% chất liệu thiên nhiên</a></h3>
                       
                       <p>Thời trang TQT xây dựng một trong những thương hiệu “THỜI TRANG BỀN VỮNG” đầu tiên tại Việt Nam.</p>
                       
                   </div>
                   
               </div>
               
           </div>
           
       </div>
       
   </div>
   
   <div id="hot" >
       
       <!-- <div class="box tri"   style= "width:1110px; margin-left: 205px;"> -->
       <div class="box">
           
           <div class="container" >
               
               <div class="col-md-12" >
                  
                   <h2 class="text text-uppercase" style="color:linear-gradient(90deg, #5170ff, #ff66c4);"> 
                   Sản phẩm mới nhất của chúng tôi
                   </h2>
                   
               </div>
               
           </div>
       </div>
       
   </div>
   
   <div id="content" class="container">
       <div class="row">
          <?php 
           getPro();
           ?>  
       </div>
   </div>
   <?php 
    include("includes/footer.php");
    ?>
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
</body>
</html>