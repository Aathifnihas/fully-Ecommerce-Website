<?php 
include("includes/db.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
 <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>

<body bgcolor="#FFCC66">
<form method="post" action="insert_product.php" enctype="multipart/form-data">
<table width="700" align="center" border="1" style="background:#CCFFFF;>
<tr align="center">
<td colspan="2">Insert New Products</td>

</tr>
<tr>

<td><b>Product Title</b></td>
<td><input type="text" name="product_title" size=50px; /></td>
</tr>
<tr>
<td><b>Select Categories</b></td>
<td>
<!---->
<select name="product_cat">
<option>Select a Categories</option>
<?php

 $get_cats ="SELECT * FROM categories";
 $run_cats = mysqli_query($con,$get_cats);
 while($row_cats=mysqli_fetch_array($run_cats)){
 $cat_id = $row_cats['cat_id'];
 $cat_title = $row_cats['cat_title'];
 echo "<option value='$cat_id'>$cat_title</option>";
  }
 
?> 
</td>
</tr>
<tr>
<td><b>Product Brand</b></td>
<td>

<select name="product_brand">
<option> Select Brand</option>
 <?php

 $get_brand ="SELECT * FROM brands";
 $run_brand = mysqli_query($con,$get_brand);
 while($row_brand=mysqli_fetch_array($run_brand)){
 $brand_id = $row_brand['brand_id'];
 $brand_title = $row_brand['brand_title'];
 echo "<option value ='$brand_id'>$brand_title</option>";
  }
 
?> 
</td>
</tr>
<tr>
<td><b>Product Image</b></td>
<td><input type="file" name="product_img1" /></td>
</tr>
<tr>
<td><b>Product Image2</b></td>
<td><input type="file" name="product_img2" /></td>
</tr>
<tr>
<td><b>Product Image3</b></td>
<td><input type="file" name="product_img3" /></td>
</tr>
<tr>
<td><b>Product Price</b></td>
<td><input type="text" name="product_price" /></td>
</tr>
<tr>
<td><b>Product Description</b></td>
<td><textarea name="product_desc" rows=20; column=20; ></textarea></td>
</tr>
<tr>
<td><b>Product Keywords</b></td>
<td><input type="text" name="product_keywords" size =50px; /></td>
</tr>
<tr align="center">
<td colspan="2"><input type="submit" name="insert_product" value="Insert Product" /></td>
</tr>
</form>
</body>
</html>
<?php 
if(isset($_POST['insert_product'])){
// text data variables

$product_cat = $_POST['product_cat'];
$product_brand = $_POST['product_brand'];
$product_title = $_POST['product_title'];

//image names
$product_img1 =$_FILES['product_img1']['name'];
$product_img2 =$_FILES['product_img2']['name'];
$product_img3 =$_FILES['product_img3']['name'];
//image temp names
$temp_name1 =$_FILES['product_img1']['tmp_name'];
$temp_name2 =$_FILES['product_img1']['tmp_name'];
$temp_name3 =$_FILES['product_img1']['tmp_name'];
$product_price = $_POST['product_price'];
$product_desc = $_POST['product_desc'];
$product_keywords = $_POST['product_keywords'];
$stutus = 'on';
if($product_title == '' OR $product_cat =='' OR $product_brand =='' OR $product_keywords=='' OR $product_img1==''){
echo"<script>alert('please fill all fileds')</script>";
exit();

}else{
move_uploaded_file($temp_name1,"products_images/$product_img1");
move_uploaded_file($temp_name2,"products_images/$product_img2");
move_uploaded_file($temp_name3,"products_images/$product_img3");

$insert_product = "INSERT INTO products(cat_id,brand_id,data,product_title,product_img1,product_img2,product_img3,product_price,product_desc,product_keywords,stutus) VALUES ('$product_cat','$product_brand',NOW()
 ,'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$product_keywords','$stutus')";
 $run_product = mysqli_query($con,$insert_product);
 if($run_product){
 echo "<script>alert('product inserted sucessfull')</script>";
 echo "<script>window.open('index.php?insert_product','_self')</script>";
 }else{
 echo "<script>alert('ERROR ON UPLOAD')</script>";
 }
}
}
?>