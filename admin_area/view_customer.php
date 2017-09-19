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
<th>CUSTOMER NAME.</th>
<th>CUSTOMER EMAIL.</th>
<th>CUSTOMER PASS.</th>
<th>CUSTOMER COUNTRY.</th>
<th>CUSTOMER CITY.</th>
<th>CUSTOMER CONTACT.</th>
<th>CUSTOMER IMAGE.</th>
<th>SYSTEM IP</th>
<TH>DELETE</TH>
</tr>
<?php 
include("includes/db.php");
$get_customer="select * from customers";
$run_customer= mysqli_query($con,$get_customer);
while($row_customer=mysqli_fetch_array($run_customer)){
$customer_id = $row_customer['customer_id'];
$customer_name = $row_customer['customer_name'];
$customer_email = $row_customer['customer_email'];
$customer_pass = $row_customer['customer_pass'];
$customer_country= $row_customer['customer_country'];
$customer_city = $row_customer['customer_city'];
$customer_contact = $row_customer['customer_contact'];
$customer_image = $row_customer['customer_image'];
$customer_ip = $row_customer['customer_ip'];

?>
<tr>
<th><?php echo $customer_id ; ?></th>
<th><?php echo $customer_name;  ?></th>
<th><?php echo $customer_email; ?></th>
<th><?php echo $customer_pass;  ?></th>
<th><?php echo $customer_country; ?></th>
<th><?php echo $customer_city;  ?></th>

<th><?php echo $customer_contact;  ?></th>
<th><img src="../customer/customer_photos/<?php echo $customer_image; ?>" width="60" height="60"/></th>
<th><?php echo $customer_ip; ?></th>
<th><a href="delete_brand.php?delete_brand=<?php echo $brand_id; ?>">DELETE</a></th>
<?php } ?>
</tr>
</table>

</body>
</html>
