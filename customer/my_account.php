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
<a href="index.php"><img src="../images/australia.jpg"style="float:left"/></a>
<img src="../images/china.jpg"style="float:left"/>
<img src="../images/australia.jpg" style=" float:right"/>
</div>
<!--header end-->
  <!--navigation bar start-->
 <div id="navbar" >
 <ul id="menu">
 <li><a href="../index.php">Home</a></li>
 <li><a href="../all_products.php">All Products</a></li>
 <li><a href="../my_account.php">My Account</a></li>
 <?php if(isset($_SESSION['customer_email'])){
 
 echo "";
 }
 else{
 echo "<li><a href='../user_register.php'>SingUP</a>";
 }
 
   ?>
 <li><a href="cart.php">Shopping Cart</a>
 <li><a href="contact.php">Contact US</a>
 </li>
 </ul>
 <!--<div id="form">
 <form method="get" action="result.php" enctype="multipart/form-data">
 
 <input type="text" name="user_query" placeholder="Search a Product"/>
 <input type="submit" name="search" value="Search"/>
 
 </form>
 </div>-->
 
 </div>
 <div id="headline">
 <div id="headline_content">
 <?php rm_cart();  ?>
 <?php if(!isset($_SESSION['customer_email'])){
 echo "<b>Welcome MR. X</b>";
 
 }else{
  echo "<b>Welcome :</b><b><span style ='color:yellow'>".$_SESSION['customer_email']."</b>";
 }
    ?>
 <!--<b style="color:#99FFFF">Your Shopping cart</b>&nbsp;&nbsp;&nbsp;
 <span style="color:#00FF00"><?php  //cartNo(); ?>-Items</span>&nbsp;&nbsp;&nbsp;-->
<!-- <span style="color:#FFFFFF"><i class="fa fa-inr"></i><?php //total_price(); ?>-Price<a href="cart.php" style="color:#00FF00">&nbsp; -Go Cart</a>-->
 <?php
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
 <div id="sidebar_title">Manage Accounts</div>
 <ul id="cate">
 <?php 
 $customer_session = $_SESSION['customer_email'];
 $get_customer_pic = "select * from customers where customer_email ='$customer_session'";
 $run_customer  = mysqli_query($con,$get_customer_pic);
 $row_customer = mysqli_fetch_array($run_customer);
 $customer_pic = $row_customer['customer_image'];
 echo"<img src='customer_photos/$customer_pic'width ='180' height='180'>";
   ?>
 <li><a href="my_account.php?my_orders">My Order</a></li>
 <li><a href="my_account.php?edit_account">Edit Account</a></li>
 <li><a href="my_account.php?change_pass">Change Password</a></li>
 <li><a href="my_account.php?delete_account">Delete Account</a></li>
 <li><a href="logout.php">Logout</a></li>
 </ul>
 <!--<div id="sidebar_title">Brands</div>-->
 
 </div>


 <div id="right_sidebar">
<h1 align="center"><font color="#990000">Manage Your Accounts</font></h1>
<?php getDefault(); ?>
<?php  
if (isset($_GET['my_orders']))
{
include ("my_orders.php");
}
if(isset($_GET['edit_account']))
{
include ("edit_account.php");
}

if(isset($_GET['change_pass']))
{
include ("change_pass.php");

}
if(isset($_GET['delete_account']))
{
include ("delete_account.php");

}
?>

 </div>
 </div>
<div class="footer">
<h1 style="color:#000000" padding-top:20px; align="center">&copy;2017-2018</h1>
</div>
</div>
<!--main contaner end-->
</body>
</html>