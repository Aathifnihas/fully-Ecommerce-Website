<?php
include("includes/db.php");
if(isset($_POST['cat_submit'])){
// text data variables

$input_cat = $_POST['input_cat'];
$insert_cat = "INSERT INTO categories (cat_title) VALUES ('$input_cat')";
 $run_cat = mysqli_query($con,$insert_cat);
 if($run_cat){
 echo "<script>alert('new categories  inserted sucessfull')</script>";
 echo "<script>window.open('index.php?view_cats','_self')</script>";
 }else{
 echo "<script>alert('ERROR')</script>";
 }
}



?>
<form action="" method="post" >
<table>
<tr><h2>INSERT NEW CATEGORIES</h2></tr>
<tr>
<td><input type="text" name="input_cat" /></td>
</tr>
<tr><input type="submit" name="cat_submit" /></tr>


</table>


</form>