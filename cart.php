<?php 
session_start();
include("includes/db.php");
include("functions/functions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome To My Shop</title>
<link rel="stylesheet" href="styles/style.css" media="all"/>
<!--for india currecy sign-->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
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
 <?php rm_cart();  ?>
 <b>Welcome Guest!</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <b style="color:#FFFF00">Shopping cart</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <span style="color:#00FF00"><?php  cartNo(); ?>-Items</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <span style="color:#FFFFFF"><i class="fa fa-inr"></i><?php  total_price(); ?>-Price<a href="index.php" style="color:#00FF00">Back </a>
 &nbsp;<?php
 if(!isset($_SESSION['customer_email'])){
 echo "<a href='checkout.php' style ='color:white'>login</a>";
 
 }else{
 echo   "<a href='logout.php' style ='color:white'>Logout</a>";
 }
 ?>
 </span>

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
 <form action="cart.php" method="post" enctype="multipart/form-data">
 <table width="750" align="center" bgcolor="#000000">
 <tr>
 <td><b>Remove</b></td>
 <td><b>Product(s)</b></td>
 <td><b>Quantity</b></td>
 <td><b>Total Price</b></td>
</tr> 
<?php
$ip_add= '1';
	global $db;
	$total = 0;
	
	$sel_price ="select * from cart where ip_add='$ip_add'";
	$run_price=mysqli_query($db,$sel_price);
	while ($record = mysqli_fetch_array($run_price)){
	$pro_id = $record['p_id'];
	$pro_price = "select * from products where 	products_id = '$pro_id'";
	$run_pro_price =mysqli_query($db,$pro_price);
	while($p_price=mysqli_fetch_array($run_pro_price)){
	
	$product_price = array($p_price['product_price']);
	$product_tit = $p_price['product_title'];
	$product_image = $p_price['product_img1'];
	$product_image = $p_price['product_img1'];
	$product_rate = $p_price['product_price']; 
	$values = array_sum($product_price);
	$total += $values;
	
	//echo $total;
	 
?>
<tr>
<td><input type="checkbox" name="remove[]"value="<?php echo $pro_id; ?>" /></td>
<td><?php echo $product_tit; ?><br/><img src="admin_area/products_images/<?php echo $product_image; ?>" width="80" height="80" /></td>
<td><input type="text" name="qty" value="<?php $product_QTY;  ?>" size="3" /></td>
<?php  
if(isset($_POST['update']))
{
$qty = $_POST['qty'];
$insert_qty ="update cart set qty='$qty'";

$run_qty = mysqli_query ($con,$insert_qty);
$total = $total*$qty;

}
?>
<td><i class="fa fa-inr"></i><?php echo $product_rate; ?></td>

</tr>
<?php }} ?>
<tr align="center">
<td colspan="3" align="right"><b>Sub Total </b></td>
<td ><b><i class="fa fa-inr"></i><?php echo $total; ?> </b></td>
</tr>
<tr></tr>

<tr>
<td colspan="2.5" ><input type="submit" name="update" value="Update Cart" /></td>
<td ><input type="submit" name="continue" value="Continue to shopping" /></td>
<td><button><a href="checkout.php">Checkout</a></button></td>
 </table>
 
 </form>
<?php 
function updatecart(){
global $con;
if(isset($_POST['update'])){
foreach($_POST['remove'] as $remove_id)
{
$delete_products = "delete from cart where p_id='$remove_id'";
$run_delete = mysqli_query($con,$delete_products);
if($run_delete)
{
echo "<script>window.open('cart.php','_self')</script>";
}
}
}
if(isset ($_POST['continue']))
{
echo "<script>window.open('index.php','_self')</script>";
}
}
echo @$up_cart = updatecart();
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