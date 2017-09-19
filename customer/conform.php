<?php
session_start();
include("includes/db.php");
if(isset($_GET['order_id'])){
$order_id = $_GET['order_id'];
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body bgcolor="#666666">
<form action="conform.php" method="post">
<table width="350" align="center" border="5" bgcolor="#FFFFFF">
<tr>
<td colspan="2"><h2>Please conform your payments</h2></td>
</tr>
<tr>
<td>Invoice No</td>
<td><input type="text" name="invoice_no"/></td>
</tr>
<tr>
<td>Amount Sent</td>
<td><input type="text" name="amount"/></td>
</tr>
<tr>
<td>Select Payment Mode</td>
<td><select name="payment_method">
<option>Select Payment</option>
<option>Bank </option>
<option>Paypal</option>
<option>ATM</option>
</select>
</td>
</tr>
<tr>
<td>Transavtion ID</td>
<td><input type="text" name="tr"/></td>
</tr>
<tr>
<td>Easy Pais /ATM No.</td>
<td><input type="text" name="code"/></td>
</tr>
<tr>
<td>Payment Date</td>
<td><input type="date" name="date"/></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit"  name="confirm" value="Conform Payments"/></td>
</tr>
</table>
</form>

</body>
</html>
<?php
if(isset($_POST['confirm'])){
$invoice = $_POST['invoice_no'];
$amount = $_POST['amount'];
$payment_method = $_POST['payment_method'];
$ref_no = $_POST['tr'];
$code = $_POST['code'];
$date = $_POST['date'];


$insert_payment = "INSERT INTO payments( invoice_no, amount, payment_mod,ref_no,code,payment_date) VALUES('$invoice','$amount','$payment_method','$ref_no','$code','$date')";
 
$run_payment = mysqli_query($con, $insert_payment);
 if($run_payment){
 echo "<h2 align= centet>Payment is Recived ! thanking you 24 Hours</h2>";
 $update_order = 'update customer_order set order_status="complete" where order_id=$order_id';
 $run_order = mysqli_query($con, $update_order);
 }else{
 echo "there is error";
 }
}
?>