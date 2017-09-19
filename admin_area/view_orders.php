<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Brand</title>
</head>

<body>
<table align="center" width="700" >
<tr>
<th> SN.</th>
<th>ORDER ID.</th>
<th>CUSTOMER ID.</th>
<th>DUE AMOUNT.</th>
<th>INVOICE NO.</th>
<th>TOTAL PRODUCTS.</th>
<th>ORDER DATE.</th>
<th>ORDER STATUS.</th>
<TH>DELETE</TH>
</tr>
<?php 
include("includes/db.php");
$get_customer="select * from customer_order";
$run_customer= mysqli_query($con,$get_customer);
while($row_customer=mysqli_fetch_array($run_customer)){
$order_id = $row_customer['order_id'];
$customer_id = $row_customer['customer_id'];
$due_amount = $row_customer['due_amount'];
$invoice_no = $row_customer['invoice_no'];
$total_products= $row_customer['total_products'];
$order_date = $row_customer['order_date'];
$order_status = $row_customer['order_status'];

?>
<tr>
<th></th>
<th><?php echo $order_id ; ?></th>
<th><?php echo $customer_id;  ?></th>
<th><?php echo $due_amount; ?></th>
<th><?php echo $invoice_no;  ?></th>
<th><?php echo $total_products; ?></th>
<th><?php echo $order_date;  ?></th>

<th><?php echo $order_status;  ?></th>

<th><a href="delete_order.php?delete_order=<?php echo $brand_id; ?>">DELETE</a></th>
<?php } ?>
</tr>
</table>

</body>
</html>
