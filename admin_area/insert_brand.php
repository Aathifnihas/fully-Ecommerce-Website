<?php
include("includes/db.php");
if(isset($_POST['brand_submit'])){
// text data variables

$input_brand = $_POST['input_brand'];
$insert_brand = "INSERT INTO brands (brand_title) VALUES ('$input_brand')";
 $run_brand = mysqli_query($con,$insert_brand);
 if($run_brand){
 echo "<script>alert('new brand  inserted sucessfull')</script>";
 echo "<script>window.open('index.php?view_brand','_self')</script>";
 }else{
 echo "<script>alert('ERROR')</script>";
 }
}



?>
<form action="" method="post" >
<table>
<tr><h2>INSERT NEW Brand</h2></tr>
<tr>
<td><input type="text" name="input_brand" /></td>
</tr>
<tr><input type="submit" name="brand_submit" value="SUBMIT" /></tr>


</table>


</form>