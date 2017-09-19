<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Products</title>
</head>

<body>
<?php 
if(!isset($_GET['view_products'])){
?>
<table width="700" bgcolor="#CC9900">
<tr align="center">
<td colspan="6"><h2>VIEW ALL PRODUCTS</h2></td>

</tr>
<tr>
<th>Product ID</th>
<th align="left">Product Title</th>
<th>Image</th>
<th>Price</th>
<th>Total Sold</th>
<th>Stutus</th>
<th>Edit</th>
<th>Delete</th>

</tr>
<?php 
$get_pro = "select* from products";
$run_pro = mysqli_query($con,$get_pro);
while($row_pro=mysqli_fetch_array($run_pro)){
$p_id= $row_pro['products_id'];
$p_title= $row_pro['product_title'];
$p_img= $row_pro['product_img1'];
$p_price= $row_pro['product_price'];
$p_sold= $row_pro['products_id'];
$p_stutus= $row_pro['products_id'];
$p_edit= $row_pro['products_id'];
$p_delete= $row_pro['products_id'];
$stutus= $row_pro['stutus'];

?>
<tr>
<th><?php echo $p_id;  ?></th>
<th><?php echo $p_title;  ?></th>
<th><img src="products_images/<?php echo $p_img; ?>" width="50"/></th>
<th><?php echo $p_price;  ?></th>
<th><?php $get_sold ="select 	qty from pending_orders where product_id = '$p_sold'";
$run_sold = mysqli_query($con, $get_sold);

$count = mysqli_num_rows($run_sold);
echo $count;

?></th>
		
<th><?php echo $stutus; ?></th>
<th><a href="index.php?edit_pro=<?php echo $p_id ; ?>">EDIT</a></th>
<th><a href="delete_pro.php?delete_pro=<?php echo $p_id; ?>">DELETE</a></th>
</tr>
<?php  } ?>
</table>

<?php } 
else {
include("edit_pro.php");
}
?>
</body>
</html>
