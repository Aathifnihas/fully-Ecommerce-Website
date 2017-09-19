<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payment Options</title>
</head>
<body>
<?php
include("includes/db.php");
//include("functions/functions.php");
?>
<div align="center" style="padding:20px;">
<h2>Payment Option For You</h2>
<?php
$ip ='1';

$get_customer = "select * from customers where customer_ip ='$ip'";

$run_customer = mysqli_query($db,$get_customer);

$customer = mysqli_fetch_array($run_customer);
$customer_id = $customer['customer_id'];

?>

<br/><a href="https://www.paypal.com/signin?country.x=IN&locale.x=en_IN" target="_blank"><img src="images/payment.png"/></a><b><a href="order.php?c_id=<?php echo $customer_id; ?>">Pay Offline</a></b>
<b>if select pay offline</b>
</div>

</body>
</html>