<div>

<h2 align="center">Login Or Register</h2>
<form action="checkout.php" method="post">
<table width="600" bgcolor="#CCFFCC" align="center">
<tr>
<td><b>Your Email</b></td><td><input type="text" name="c_email"/></td></tr><tr>
<td><b>Your Password</b></td><td><input type="password" name="c_pass"/></td>
</tr>
<tr>
<td align="center" colspan="2"><input type="submit" name="c_login" value="Login" /></td>
<td><a href="forget_password">Forget Password</a></td>
</tr>
<tr></tr>
</table>
<h2 style="float:right"><a href="customer_register.php"><font size="+2">New? Register Here</font></a>
</form>


</div>
<?php
if(isset($_POST['c_login'])){
$customer_email = $_POST['c_email'];
$customer_pass = $_POST['c_pass'];
$sel_customer ="select * from customers where customer_email = '$customer_email' AND customer_pass ='$customer_pass'";
$run_customer = mysqli_query($con, $sel_customer);
$check_customer = mysqli_num_rows($run_customer);
$get_ip = getIp();
$sel_cart = "select * from cart where ip_add ='$get_ip'";
$run_cart = mysqli_query($con,$sel_cart);
$check_cart = mysqli_num_rows($run_cart);
if($check_customer == 0){
echo "<script>alert('password or email is incorrect')</script>";
exit();
}
if($check_customer==1 AND $check_cart==0){
    $_SESSION['customer_email'] =$customer_email;
echo "<script>window.open('customer/my_account.php','_self')</script>";
}
else{
$_SESSION['customer_email']=$customer_email;
echo "<script>alert('You successfully logged in,you can order now')</script>";
include("payment_option.php");
}
}
?>