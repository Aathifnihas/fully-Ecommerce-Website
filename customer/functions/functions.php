<?php
//stabling connection
$db = mysqli_connect("localhost","root","monu1991","myshop"); 


//get ip address
  function getIp(){
	global $db;

        $ip = $_SERVER['REMOTE_ADDR'];     
        if($ip){
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            return $ip;
        }
        // There might not be any data
        return false;
    }
	//geting the default for customer
	function getDefault(){
	global $db;
	 
	  
	
	$c = $_SESSION['customer_email'];
	
	$get_c = "select * from customers where customer_email = '$c'";
	
	$run_c =mysqli_query($db,$get_c);
	
	$row_c = mysqli_fetch_array($run_c);
	
	  $customer_id = $row_c['customer_id'];
	  if(!isset($_GET['my_orders'])){
	  if(!isset($_GET['edit_account'])){
	   if(!isset($_GET['change_pass'])){
	    if(!isset($_GET['delete_account'])){
	 
	    $get_orders = "select * from customer_order where customer_id = '$customer_id' AND order_status='pending'";
		
		$run_orders = mysqli_query($db,$get_orders);
		
		$count_orders = mysqli_num_rows($run_orders);
		
		if($count_orders>0){
		
		   echo "
		   <div style ='padding:10px;'> 
		   <h2 style = 'color:red;'>important</h2>
		   <h3>You Have ($count_orders)Pending Orders</h3>
		   <h3>Please See Your Order Details By Click This <a href='my_account.php?my_orders'>Link</a><br/>Or Pay Offline<a href = '../payment_option.php'>pay here Now</a>
		   </div>
		   ";
		//}
		}else{
		echo"
		<div style ='padding:10px;'> 
		   
		   <h3>You Have No Pending Orders</h3>
		   <h3>View Your Order History <a href='my_account.php?my_order'>Link</a>
		   </div>
		
		";
		
		}
		}
		}
	 }
	 }
	 }
	
	
	//cart page 
	
	function rm_cart(){
	global $db;
	
	if(isset($_GET['add_cart'])){
	$ip_add = '1';
	$p_id = $_GET['add_cart'];
	$check_pro = "SELECT * FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id'";
	$run_check  = mysqli_query($db,$check_pro);
	if(mysqli_num_rows($run_check)>0){
	echo "";
	}
	else{
	$q = "INSERT INTO cart(p_id ,ip_add, qty) VALUES ('$p_id','$ip_add',1)";
	$run_q = mysqli_query($db,$q);
	echo "<script>window.open('index.php','self')</script>";
	}
	}

	} 	
	// getting item products to display
	
	function cartNo(){
	global $db;
	$ip_add= '1';
	if(isset($_GET['add_cart'])){
	
	$get_items ="select * from cart where ip_add='$ip_add'";
	$run_items =mysqli_query($db,$get_items);
	$count_items= mysqli_num_rows($run_items);
	
	}
	else{
	$get_items ="select * from cart where ip_add='$ip_add'";
	$run_items =mysqli_query($db,$get_items);
	$count_items= mysqli_num_rows($run_items);
	
	}
	echo $count_items;
	}
	
	//getting price of item from cart
	
	function total_price(){
	
	
	
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
	$product_rate = $p_price['product_price'];
	
	$values = array_sum($product_price);
	//$total += $values;
	$total += $values;
	}
	}
	echo $total;
	}

//get product details 
function getPro(){
global $db;

if(!isset($_GET['cat'])){
if(!isset($_GET['brand'])){

 
 $get_products = "SELECT * FROM products ORDER BY rand() LIMIT 0,6";
 $run_products = mysqli_query($db,$get_products);
 while($row_products = mysqli_fetch_array($run_products)){
 $pro_id = $row_products ['products_id'];
 $pro_title = $row_products ['product_title'];
 $pro_price = $row_products ['product_price'];
 $pro_cat = $row_products ['cat_id'];
 $pro_brand = $row_products ['brand_id'];
 $pro_desc = $row_products ['product_desc'];
 $pro_img1 = $row_products ['product_img1'];
 echo "
 <div id='single_product'>
 <h3>$pro_title</h3>
 
 <img src='admin_area/products_images/$pro_img1' width='180' height='180'/><br/>
 <b>Price:-$pro_price</b><br/>
 <a href='index.php?add_cart=$pro_id'> <button>Add To Cart</button></a>
 <a href='details.php?pro_id=$pro_id' style='float:right;'>Details</a>
 

</div>
";
 }
}
}
}
function getAllPro(){
global $db;
 $get_all_products = "SELECT * FROM products";
 $run_all_products = mysqli_query($db,$get_all_products);
 while($row_all_products = mysqli_fetch_array($run_all_products)){
 $pro_id = $row_all_products ['products_id'];
 $pro_title = $row_all_products ['product_title'];
 $pro_price = $row_all_products ['product_price'];
 $pro_cat = $row_all_products ['cat_id'];
 $pro_brand = $row_all_products ['brand_id'];
 $pro_desc = $row_all_products ['product_desc'];
 $pro_img1 = $row_all_products ['product_img1'];
 echo "
 <div id='single_product'>
 <h3>$pro_title</h3>
 
 <img src='admin_area/products_images/$pro_img1' width='180' height='180'/><br/>
 <b>Price:-$pro_price</b><br/>
  <a href='index.php?add_cart=$pro_id'><button>Add To Cart</button></a>
 <a href='details.php?pro_id=$pro_id' style='float:right;'>Details</a>
 

</div>
";
 }
}


function getCatPro(){
global $db;

if(isset($_GET['cat'])){
$cat_id=($_GET['cat']);

$get_cat_pro = "SELECT * FROM products WHERE cat_id ='$cat_id'";
 $run_cat_pro = mysqli_query($db,$get_cat_pro);
 $count = mysqli_num_rows($run_cat_pro);
 if($count==0){
 echo"Please Select other categories";
 }
 while($row_cat_pro = mysqli_fetch_array($run_cat_pro)){
 $pro_id = $row_cat_pro ['products_id'];
 $pro_title = $row_cat_pro ['product_title'];
 $pro_price = $row_cat_pro ['product_price'];
 $pro_cat = $row_cat_pro ['cat_id'];
 $pro_brand = $row_cat_pro ['brand_id'];
 $pro_desc = $row_cat_pro ['product_desc'];
 $pro_img1 = $row_cat_pro ['product_img1'];
 echo "
 <div id='single_product'>
 <h3>$pro_title</h3>
 
 <img src='admin_area/products_images/$pro_img1' width='180' height='180'/><br/>
 <b>Price:-$pro_price</b><br/>
  <a href='index.php?add_cart=$pro_id'><button style='float:right;>Add To Cart</button></a><br/>
 <a href='details.php?pro_id=$pro_id' style='float:right;'>Details</a>
 

</div>
";
 }
}
}

function getBrandPro(){
global $db;

if(isset($_GET['brand'])){
$brand_id=($_GET['brand']);

$get_brand_pro = "SELECT * FROM products WHERE brand_id ='$brand_id'";
 $run_brand_pro = mysqli_query($db,$get_brand_pro);
 $count = mysqli_num_rows($run_brand_pro);
 if($count==0){
 echo"Please Select other categories No Product on this brands";
 }
 while($row_brand_pro = mysqli_fetch_array($run_brand_pro)){
 $pro_id = $row_brand_pro ['products_id'];
 $pro_title = $row_brand_pro ['product_title'];
 $pro_price = $row_brand_pro ['product_price'];
 $pro_cat = $row_brand_pro ['cat_id'];
 $pro_brand = $row_brand_pro ['brand_id'];
 $pro_desc = $row_brand_pro ['product_desc'];
 $pro_img1 = $row_brand_pro ['product_img1'];
 echo "
 <div id='single_product'>
 <h3>$pro_title</h3>
 
 <img src='admin_area/products_images/$pro_img1' width='180' height='180'/><br/>
 <b>Price:-$pro_price</b><br/>
  <a href='index.php?add_cart=$pro_id'><button>Add To Cart</button></a>
 <a href='details.php?pro_id=$pro_id' style='float:right;'>Details</a>
 

</div>
";
 }
}
}


//get brands
function getBrands(){
global $db;

 $get_brand ="SELECT * FROM brands";
 $run_brand = mysqli_query($db,$get_brand);
 while($row_brand=mysqli_fetch_array($run_brand)){
 $brand_id = $row_brand['brand_id'];
 $brand_title = $row_brand['brand_title'];
 echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
  }
 
//get categories
}
function getCats(){
global $db;
$get_cats ="SELECT * FROM categories";
 $run_cats = mysqli_query($db,$get_cats);
 while($row_cats=mysqli_fetch_array($run_cats)){
 $cat_id = $row_cats['cat_id'];
 $cat_title = $row_cats['cat_title'];
 echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
  }
}



?>