<form action="" method="post">
<table width="500" align="center">
<tr align="center">
<td colspan="4"><h3>Change Your Password</h3></td>
</tr>
<tr>
   <td align="right">Enter Current Password</td>
   <td><input type="text" name="old_pass" required/></td>
</tr>
<tr>
   <td align="right">Enter New Password</td>
   <td><input type="password" name="new_pass" required /></td>
</tr>
<tr>
   <td align="right">Enter Conform Password</td>
   <td><input type="password" name="new_pass_again" required /></td>
</tr>
<tr>
<td colspan="4" align="center"><input type="submit" name="change_pass" value="Change Password"/></td>
</tr>
</table>
</form>
<?php 
include("includes/db.php");

  $c= $_SESSION['customer_email'];
  
  if(isset($_POST['change_pass'])){
  
  $old_pass = $_POST['old_pass'];
  $new_pass = $_POST['new_pass'];
  $new_pass_again = $_POST['new_pass_again'];
  
  $get_real_pass = "select * from customers where customer_pass = '$old_pass'";
  
  $run_real_pass = mysqli_query($con, $get_real_pass);
  $check_pass = mysqli_num_rows($run_real_pass);
  
  
  if($check_pass==0){
  
  echo "<script>alert('your current password is not valid ,try again')</script>";
  exit();
  }
  if($new_pass !=$new_pass_again){
  echo "<script>alert('New Password did not match , try again!')</script>";
  exit();
  }
  else{
  $update_pass ="update customers set customer_pass='$new_pass' where customer_email ='$c'";
  $run_pass = mysqli_query($con, $update_pass);
  echo "<script>alert('Your password has been update succesfully change')</script>";
  echo"<script>window.open('my_account.php','_self')</script>";
  }
  }
?>