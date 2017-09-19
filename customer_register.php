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
 <span style="color:#FFFFFF"><i class="fa fa-inr"></i><?php total_price(); ?>-Price<a href="cart.php" style="color:#00FF00">&nbsp; -Go Cart</a>
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
 <form action="customer_register.php" method="post" enctype="multipart/form-data">
 <table width="750" align="center">
 <tr align="center">
 <td><h2>Crate an Account</h2></td>
 </tr>
 <tr>
 <td align="right"><b>Customer Name:</b></td>
 <td><input type="text" name="c_name" required /></td>
 </tr>
 <tr>
 <td align="right"><b>Customer Email:</b></td>
 <td><input type="text" name="c_email" required /></td>
 </tr>
 <tr>
 <td align="right"><b>Customer Password:</b></td>
 <td><input type="text" name="c_pass" required /></td>
 </tr>
 <tr>
 <td align="right"><b>Customer Country:</b></td>
 <td>
 <select name="c_country">
 <option>Select Country</option>
 <option>India</option>
 <option>USA</option>
 <option>Afaganistan</option>
 <option>Japan</option>
 </select></td>
 </tr>
 <tr>
 <td align="right"><b>Customer City:</b></td>
 <td><input type="text" name="c_city" required /></td>
 </tr>
 <tr>
 <td align="right"><b>Customer Contact:</b></td>
 <td><input type="text" name="c_contact" required /></td>
 </tr>
 <tr>
 <td align="right"><b>Customer Address:</b></td>
 <td><input type="text" name="c_address" required /></td>
 </tr>
 <tr>
 <td align="right"><b>Customer Image:</b></td>
 <td><input type="file" name="c_image"/></td>
 </tr>
 <tr align="center"><td colspan="8"><input type="submit" name="register" value="Submit" />	</td></tr>
 </form>
</table>
 </div>
 </div>
<div class="footer">
<h1 style="color:#000000" padding-top:20px; align="center">&copy;2017</h1>
</div>
</div>
<!--main contaner end-->
</body>
</html>

<?Php
 if(isset($_POST['register'])){
 
   $c_name = $_POST['c_name'];
   $c_email = $_POST['c_email'];
   $c_pass = $_POST['c_pass'];
   $c_country = $_POST['c_country'];
   $c_city = $_POST['c_city'];
   $c_contact = $_POST['c_contact'];
   $c_address = $_POST['c_address'];
   $c_image = $_FILES['c_image']['name'];
   $c_image_tmp = $_FILES['c_image']['tmp_name'];
   
   $c_ip = '1';
   
   $insert_customer = "INSERT INTO customers(customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address, customer_image, customer_ip) VALUES ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
   
   $run_customer = mysqli_query($con,$insert_customer);
   move_uploaded_file($c_image_tmp,"customer/customer_photos/$c_image");
  
   
   //$get_ip = getIp();
        $sel_cart = "select * from cart where ip_add ='$c_ip'";
        $run_cart = mysqli_query($con,$sel_cart);
        $check_cart = mysqli_num_rows($run_cart);
		
		if($check_cart==1){
		
		$_SESSION['customer_email']=$c_email;
		echo "<script>alert('Account Created Successfully, Thank You!')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
		}else{
		$_SESSION['customer_email']=$c_email;
		echo "<script>alert('Account Created Successfully, Thank You!')</script>";
		echo "<script>window.open('index.php','_self')</script>";
		}
}

?>