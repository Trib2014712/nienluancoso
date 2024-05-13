<?php
if(isset($_GET['search'])){
   $key_w = $_GET['user_query'];
}
?>

<?php 

    $active='search';
    include("includes/header.php");

?>
   <div id="hot" >
       <!-- <div class="box tri"   style= "width:1110px; margin-left: 205px;"> -->
       <div class="box">
           
           <div class="container" >
               
               <div class="col-md-12    " >
                  
                   <h2 class="text text-uppercase" style="color:linear-gradient(90deg, #5170ff, #ff66c4);"> 
                   Sản phẩm mà bạn tìm kiếm
                   </h2>
                   
               </div>
               
           </div>
       </div>
       
   </div>
   
   <div id="content" class="container">
       <div class="row">
          <?php 
           search_pro();
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