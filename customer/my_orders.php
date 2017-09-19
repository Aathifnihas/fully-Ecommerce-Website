<?php
//include ("include/db.php");
//include ("functions/functions.php");


	$c = $_SESSION['customer_email'];
	
	$get_c = "select * from customers where customer_email = '$c'";
	
	$run_c =mysqli_query($db,$get_c);
	
	$row_c = mysqli_fetch_array($run_c);
	
	  $customer_id = $row_c['customer_id'];
?>
<h2 align="center" style="background-color:#FFFFFF">All Order Details</h2>
<table width="700" border="15px;" align="center" bgcolor="#0033CC">
<tr>
<td>Order No</td>
<td>Due Amount</td>
<td>Invoice No.</td>
<td>Total Products</td>
<td>Order Date</td>
<td>Paid/UnPaid</td>
<td>Status</td>
</tr>
<?php
$get_orders = "select * from customer_order where customer_id = '$customer_id'";
$get_run=mysqli_query($db,$get_orders);
$i = 0;
while( $get_orders=mysqli_fetch_array($get_run)){
$order_id = $get_orders['order_id'];
$due_amount = $get_orders['due_amount'];
$invoice_no = $get_orders['invoice_no'];
$products	 = $get_orders['total_products'];
$date = $get_orders['order_date'];
$status = $get_orders['order_status'];
$i++;
if($status == 'pending'){
$status = 'UnPaid';
}
else{
$status = 'Paid';
}
echo"
<tr align='center'>
<td>$i</td>
<td>$due_amount</td>
<td>$invoice_no</td>
<td>$products</td>
<td>$date</td>
<td>$status</td>
<td><a href ='conform.php?order_id=$order_id' target='_blank'>conform if paid</a></td>
</tr>
";
}

?>
</table>