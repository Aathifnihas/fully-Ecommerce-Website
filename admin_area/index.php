<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RM admin panel</title>
</head>
<link rel="stylesheet" href="styles/style.css" media="all" />


<body>
<div class="wrapper">
<div class="header"></div>
<div class="left">
<?php 
include("includes/db.php");
//include("view_product.php");
//include("functions/functions.php");
if(isset($_GET['insert_product'])){
include("insert_product.php");
}
if(isset($_GET['view_product'])){
include("view_product.php");
}
if(isset($_GET['edit_pro'])){
include("edit_pro.php");
}
if(isset($_GET['insert_cat'])){
include("insert_cat.php");
}

if(isset($_GET['view_cats'])){
include("view_cat.php");
}
if(isset($_GET['edit_cats'])){
include("edit_cats.php");
}
if(isset($_GET['insert_brand'])){
include("insert_brand.php");
}
if(isset($_GET['view_brand'])){
include("view_brand.php");
}
if(isset($_GET['view_customer'])){
include("view_customer.php");
}
if(isset($_GET['view_orders'])){
include("view_orders.php");
}
if(isset($_GET['view_payments'])){
include("view_payments.php");
}

?>
</div>
<div class="right">
<h2>Manage Contain</h2>
<hr/>
<a href="index.php?insert_product">Insert New Products</a>
<a href="index.php?view_product">view all Products</a>
<a href="index.php?insert_cat">Insert New Category</a>
<a href="index.php?view_cats">View all Categories</a>
<a href="index.php?insert_brand">Insert new brand</a>
<a href="index.php?view_brand">view all Brand</a>
<a href="index.php?view_customer">View All Customer</a>
<a href="index.php?view_orders">View All Orders</a>
<a href="index.php?view_payments">View All payments</a>
<a href="logout.php">Logout</a>
</div>
</div>
</html>
