<?php
include("includes/db.php");
if(isset($_GET['edit_cats'])){
// text data variables

$cat_id = $_GET['edit_cats'];
$edit_cat = "select * from categories where cat_id ='$cat_id'";
$run_edit = mysqli_query($con,$edit_cat);
$row_edit=mysqli_fetch_array($run_edit);
$cat_id = $row_edit['cat_id'];
$cat_title = $row_edit['cat_title'];
 
}



?>
<form action="" method="post" >
<table>
<tr><h2>EDIT CATEGORIES</h2></tr>
<tr>
<td><input type="text" name="update_cat" value="<?php echo $cat_title;  ?>" /></td>
</tr>
<tr><input type="submit" name="update_cats"  value="update cate"/></tr>


</table>


</form>
<?php  
if(isset($_POST['update_cats'])){
$cat_title123 = $_POST['update_cat'];

$update_cat = "update categories set cat_title='$cat_title123' where cat_id = '$cat_id'";
$run_update=mysqli_query($con,$update_cat);

if($run_update){

 echo "<script>alert(' categories Update sucessfull')</script>";
 echo "<script>window.open('index.php?view_cats','_self')</script>";
}else{

 echo "<script>alert('ERROR')</script>";
}
}

?>