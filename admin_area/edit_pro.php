<?php 
include("includes/db.php");

if(isset($_GET['edit_pro'])){
$edit_id = $_GET['edit_pro'];

$get_edit="select * from products where products_id = '$edit_id'";


$run_edit = mysqli_query($con,$get_edit);

$row_edit =mysqli_fetch_array($run_edit);

$update_id = $row_edit['products_id'];

$p_titile= $row_edit['product_title'];
$cat_id = $row_edit['cat_id'];
$brand_id = $row_edit['brand_id'];
$p_image1 = $row_edit['product_img1'];
$p_image2= $row_edit['product_img2'];
$p_image3 = $row_edit['product_img3'];
$p_price = $row_edit['product_price'];
$p_desc = $row_edit['product_desc'];
$p_keyword = $row_edit['product_keywords'];
//$p_stutus = $row_edit['stutus'];

}
//categories
$get_cat = "select * from categories where cat_id = '$cat_id'";

$run_cat = mysqli_query($con,$get_cat);

$cat_row = mysqli_fetch_array($run_cat);

$cat_edit_title = $cat_row['cat_title']; 

//brand

$get_brand = "select * from brands where brand_id = '$brand_id'";

$run_brand = mysqli_query($con,$get_brand);

$brand_row = mysqli_fetch_array($run_brand);

$brand_edit_title = $brand_row['brand_title']; 


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
<form method="post" action="" enctype="multipart/form-data">
<table width="700" align="center" border="1" style="background:#CCFFFF;>
<tr align="center">
<td colspan="2">Update Products</td>

</tr>
<tr>

<td><b>Product Title</b></td>
<td><input type="text" name="product_title" size=50px; value="<?php echo $p_titile; ?>" /></td>
</tr>
<tr>
<td><b>Select Categories</b></td>
<td>
<!---->
<select name="product_cat">
<option value = "<?php echo $cat_id; ?>"><?php echo $cat_edit_title; ?></option>
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
<option value="<?php echo $brand_id; ?>"><?php echo $brand_edit_title;  ?></option>
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
<td><input type="file" name="product_img1" /><br/><img src="products_images/<?php echo $p_image1; ?>" width = "60" height="60"/></td>
</tr>
<tr>
<td><b>Product Image2</b></td>
<td><input type="file" name="product_img2" /><br/><img src="products_images/<?php echo $p_image2 ;?>" width = "60" height="60"/></td>
</tr>
<tr>
<td><b>Product Image3</b></td>
<td><input type="file" name="product_img3" /><br/><img src="products_images/<?php echo $p_image3; ?>" width = "60" height="60"/></td>
</tr>
<tr>
<td><b>Product Price</b></td>
<td><input type="text" name="product_price" value="<?php echo $p_price; ?>"/></td>
</tr>
<tr>
<td><b>Product Description</b></td>
<td><textarea name="product_desc" rows=20; column=20; value="<?php echo $p_desc; ?>" ></textarea></td>
</tr>
<tr>
<td><b>Product Keywords</b></td>
<td><input type="text" name="product_keywords" size =50px; value="<?php echo $p_keyword; ?>" /></td>
</tr>
<tr align="center">
<td colspan="2"><input type="submit" name="update_product" value="UPDATE Product" /></td>
</tr>
</form>
</body>
</html>
<?php 
if(isset($_POST['update_product'])){
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
//if($product_title == '' OR $product_cat =='' OR $product_brand =='' OR $product_keywords=='' OR $product_img1==''){

//exit();

//}else{
move_uploaded_file($temp_name1,"products_images/$product_img1");
move_uploaded_file($temp_name2,"products_images/$product_img2");
move_uploaded_file($temp_name3,"products_images/$product_img3");

$update_product = "update products set cat_id ='$product_cat',brand_id ='$product_brand',product_title='$product_title'
,product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',
product_price='$product_price',product_desc='$product_desc',product_keywords='$product_keywords' where products_id='$update_id'";
 $run_update = mysqli_query($con,$update_product);
 if($run_update){
 echo "<script>alert('product Update sucessfull')</script>";
 echo "<script>window.open('index.php?view_product','_self')</script>";
 }else{
 echo "<script>alert('ERROR')</script>";
 //}
}
}
?>