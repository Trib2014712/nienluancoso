<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  
    <title> Thêm Sản Phẩm</title>
</head>
<body>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Điều Khiển / Thêm Sản Phẩm
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> Thêm Sản Phẩm
                    </h3>
                </div>
            </div class="panel-body">
             <form method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-md-3 control-label">Tên sản phẩm</label>
                    <div class="col-md-6">
                        <input type="text" name="product_title" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Danh mục sản phẩm</label>
                    <div class="col-md-6">
                        <select name="product_cat" id="" class="form-control">
                            <option>Chọn một danh mục Sản phẩm</option>
                            <?php
                            $get_p_cats = "select * from product_categories";
                            $run_p_cats = mysqli_query($con,$get_p_cats);

                            while ($row_p_cats = mysqli_fetch_array($run_p_cats)){
                                $p_cat_id = $row_p_cats['p_cat_id'];
                                $p_cat_title = $row_p_cats['p_cat_title'];
                                echo"
                                <option value = '$p_cat_id'> $p_cat_title </option>
                                ";
                            }
                            ?>
                        </select>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Danh mục</label>
                    <div class="col-md-6">
                        <select name="cat" id="" class="form-control">
                            <option>Chọn danh mục</option>
                            <?php
                            $get_cat = "select * from categories";
                            $run_cats = mysqli_query($con,$get_cat);

                            while ($row_cat = mysqli_fetch_array($run_cats)){
                                $cat_id = $row_cat['cat_id'];
                                
                                $cat_title = $row_cat['cat_title'];
                                echo"
                                <option value = '$cat_id'> $cat_title </option>
                                ";
                            }
                            ?>
                        </select>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Hình ảnh sản phẩm 1</label>
                    <div class="col-md-6">
                        <input type="file" name="product_img1" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Hình ảnh sản phẩm 2</label>
                    <div class="col-md-6">
                        <input type="file" name="product_img2" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Hình ảnh sản phẩm 3</label>
                    <div class="col-md-6">
                        <input type="file" name="product_img3" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Giá sản phẩm</label>
                    <div class="col-md-6">
                        <input type="text" name="product_price" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Từ khóa Sản phẩm</label>
                    <div class="col-md-6">
                        <input type="text" name="product_keywords" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Mô tả sản phẩm</label>
                    <div class="col-md-6">
                        <textarea name="product_desc" id="" cols="19" rows="6"></textarea>
                    </div>
                </div>

                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-6">
                        <input type="submit" name="submit" value="Thêm sản phẩm" class="btn btn-primary form-control">
                    </div>
                </div>
             </form>

        </div>
    </div>
    
<script src="js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea'});</script>

</body>
</html>

<?php
 if (isset($_POST['submit'])){
    print_r($_POST);
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $cat = $_POST['cat'];
    $product_price = $_POST['product_price'];
    $product_keywords = $_POST['product_keywords'];
    $product_desc = $_POST['product_desc'];

    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];

    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];

    move_uploaded_file($temp_name1,"product_images/$product_img1");
    move_uploaded_file($temp_name2,"product_images/$product_img2");
    move_uploaded_file($temp_name3,"product_images/$product_img3");
    
    $insert_product = "insert into  products
    (p_cat_id,cat_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_keywords,product_desc) values
    ('$product_cat','$cat',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_keywords','$product_desc')";

    $run_product = mysqli_query($con,$insert_product);
    
    if($run_product){

        echo "<script>alert('Product has been inserted sucessfully')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";
        
    }
 }
?>
<?php } ?>