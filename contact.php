<?php 
    
    $active='Contact';
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
                   Liên hệ chúng tôi
                   </li>
               </ul>
               
           </div>
           
           <div class="col-md-3">
   
 
               
           </div>
           
           <div class="col-md-12">
               
               <div class="box">
                   
                   <div class="box-header">
                       
                       <center>
                           
                           <h2> Cần liên lạc nếu cần</h2>
                           
                           <p class="text-muted">
                               
                           Nếu bạn có bất kỳ câu hỏi nào, xin vui lòng hỏi.<strong>24/7</strong>
                               
                           </p>
                           
                       </center>
                       
                       <form action="contact.php" method="post">
                           
                           <div class="form-group">
                               
                               <label>Tên</label>
                               
                               <input type="text" class="form-control" name="name" required>
                               
                           </div>
                           
                           <div class="form-group">
                               
                               <label>Email</label>
                               
                               <input type="text" class="form-control" name="email" required>
                               
                           </div>
                           
                           <div class="form-group">
                               
                               <label>Chủ đề</label>
                               
                               <input type="text" class="form-control" name="subject" required>
                               
                           </div>
                           
                           <div class="form-group">
                               
                               <label>Tin nhắn</label>
                               
                               <textarea name="message" class="form-control"></textarea>
                               
                           </div>
                           
                           <div class="text-center">
                               
                               <button type="submit" name="submit" class="btn btn-primary" style=" background:linear-gradient(90deg, #5170ff, #ff66c4);">
                               
                               <i class="fa fa-user-md"></i> Gửi tin nhắn
                               
                               </button>
                               
                           </div>
                           
                       </form>
                       <?php 
                       
                       if(isset($_POST['submit'])){
                           
                           $sender_name = $_POST['name'];
                           
                           $sender_email = $_POST['email'];
                           
                           $sender_subject = $_POST['subject'];
                           
                           $sender_message = $_POST['message'];
                           
                           $receiver_email = "tri@gmail.com";
                           
                           mail($receiver_email,$sender_name,$sender_subject,$sender_message,$sender_email);
                           
                           $email = $_POST['email'];
                           
                           $subject = "Chào mừng đến trang web của tôi";
                           
                           $msg = "Cảm ơn đã gửi tin nhắn cho chúng tôi.Chúng tôi sẽ trả lời tin nhắn của bạn sớm nhất";
                           
                           $from = "tri@gmail.com";
                           
                           mail($email,$subject,$msg,$from);
                           
                           echo "<h2 align='center'> Tin nhắn của bạn đã được gửi thành công </h2>";
                           
                       }
                       
                       ?>
                       
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