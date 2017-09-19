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
<th>PAYMENT ID.</th>
<th>INVOICE NO.</th>
<th> AMOUNT.</th>
<th>PAY  MODE.</th>
<th>REF NO.</th>
<th>CODE.</th>
<th>PAYMENT DATE.</th>
<TH>DELETE</TH>
</tr>
<?php 
include("includes/db.php");
$get_customer="select * from payments";
$run_customer= mysqli_query($con,$get_customer);
while($row_customer=mysqli_fetch_array($run_customer)){
$payment_id = $row_customer['payment_id'];
$invoice_no = $row_customer['invoice_no'];
$amount = $row_customer['amount'];
$payment_mod = $row_customer['payment_mod'];
$ref_no= $row_customer['ref_no'];
$code = $row_customer['code'];
$payment_date = $row_customer['payment_date'];

?>
<tr>
<th></th>
<th><?php echo $payment_id; ?></th>
<th><?php echo $invoice_no;  ?></th>
<th><?php echo $amount; ?></th>
<th><?php echo $payment_mod;  ?></th>
<th><?php echo $ref_no; ?></th>
<th><?php echo $code;  ?></th>

<th><?php echo $payment_date;  ?></th>

<th><a href="delete_order.php?delete_payment=<?php echo $payment_id; ?>">DELETE</a></th>
<?php } ?>
</tr>
</table>

</body>
</html>
