<?php 
include("includes/db.php");
include("functions/functions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome To My Shop</title>
<link rel="stylesheet" href="styles/style.css" media="all"/>
</head>

<body>
<!--main container start-->
<div class="main_wrapper">

<!--header start -->

<div class="header_wrapper">
<a href="index.php"><img src="images/australia.jpg"style="float:left"/></a>
<img src="images/china.jpg"style="float:left"/>
<img src="images/australia.jpg" style=" float:right"/>
</div>
<!--header end-->
  <!--navigation bar start-->
 <div id="navbar" >
 <ul id="menu">
 <li><a href="index.php">Home</a></li>
 <li><a href="all_products.php">All Products</a></li>
 <li><a href="my_account.php">My Account</a></li>
 <li><a href="user_register.php">SingUP</a>
 <li><a href="cart.php">Shopping Cart</a>
 <li><a href="contact.php">Contact US</a>
 </li>
 </ul>
 <div id="form">
      <form method="get" action="result.php" enctype="multipart/form-data">
      
 <input type="text" name="user_query" placeholder="Search a Product"/>
 
 <input type="submit" name="search" value="Search"/>
 
          </form>
 </div>
 
 </div>
 <div id="headline">
 <div id="headline_content">
 <b>Welcome Guest!</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <b style="color:#FFFF00">Shopping cart</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <span>-ITems</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>-Price</span>

 </div>
 </div>

 <!--navigation end-->
 <div class="contant_wrapper">
 <div id="left_sidebar">
 <div id="sidebar_title">Categories</div>
 <ul id="cate">
 <?php getCats();?> 
 </ul>
 <div id="sidebar_title">Brands</div>
 <ul id="cate">
 <?php getBrands(); ?>
 </ul>
 </div>
 <button><a href=""></a></button>

 <div id="right_sidebar">
 <?php 
 if(isset($_GET['pro_id'])){
 $product_id = $_GET['pro_id'];
 $get_pro_details = "SELECT * FROM products WHERE 	products_id = '$product_id'  ORDER BY rand() LIMIT 0,6";
 
 $run_pro_details = mysqli_query($db,$get_pro_details);
 while($row_pro_details = mysqli_fetch_array($run_pro_details)){
 $pro_id = $row_pro_details ['products_id'];
 $pro_title = $row_pro_details['product_title'];
 $pro_price = $row_pro_details ['product_price'];
 $pro_cat = $row_pro_details['cat_id'];
 $pro_brand = $row_pro_details ['brand_id'];
 $pro_desc = $row_pro_details ['product_desc'];
 $pro_img1 = $row_pro_details ['product_img1'];
  $pro_img2 = $row_pro_details ['product_img2'];
   $pro_img3 = $row_pro_details ['product_img3'];
 echo "
 <div id='single_product'>
 <h3>$pro_title</h3>
 
 <img src='admin_area/products_images/$pro_img1' width='180' height='180'/>
 <img src='admin_area/products_images/$pro_img2' width='90' height='60'/>
 <img src='admin_area/products_images/$pro_img3' width='90' height='60'/>
 <br/>
 <b>Price:-$pro_price</b><br/>
 <b>Description:- $pro_desc </b>
  <button style='float:left;><a href='index.php?add_cart=$pro_id'>Add To Cart</a></button>
 <a href='details.php?pro_id=$pro_id' style='float:right;'>Details</a>
 

</div>
";
 }
 }
  ?>

 </div>
 
 </div>
<div class="footer">
<h1 style="color:#000000" padding-top:20px; align="center">&copy;2017-By Ravi Kumar dubey</h1>
</div>
</div>
<!--main contaner end-->
</body>
</html>