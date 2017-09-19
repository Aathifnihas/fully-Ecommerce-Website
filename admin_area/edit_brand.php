<?php
include("includes/db.php");
if(isset($_GET['edit_brand'])){
// text data variables

$brand_id = $_GET['edit_brand'];
$brand_cat = "select * from brands where brand_id ='$brand_id'";
$run_brand = mysqli_query($con,$brand_cat);
$row_brand=mysqli_fetch_array($run_brand);
$brand_id = $row_brand['brand_id'];
$brand_title = $row_brand['brand_title'];
 
}



?>
<form action="" method="post" >
<table>
<tr><h2>EDIT BRANDS</h2></tr>
<tr>
<td><input type="text" name="update_brand" value="<?php echo $brand_title;  ?>" /></td>
</tr>
<tr><input type="submit" name="update_brands"  value="update brand"/></tr>


</table>


</form>
<?php  
if(isset($_POST['update_brand'])){
$brand_title123 = $_POST['update_brand'];

$update_brand = "update brands set brand_title='$brand_title123' where brand_id = '$brand_id'";
$run_update=mysqli_query($con,$update_brand);

if($run_update){

 echo "<script>alert(' brand Update sucessfull')</script>";
 echo "<script>window.open('index.php?view_brand','_self')</script>";
}else{

 echo "<script>alert('ERROR')</script>";
}
}

?>