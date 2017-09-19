<?php
include("includes/db.php");
if(isset($_GET['delete_cats'])){

$delete_id = $_GET['delete_cats'];

$delete_cat="delete from categories where cat_id ='$delete_id'";

$run_delete = mysqli_query($con, $delete_cat);

if($run_delete){

echo"<script>alert('categories is delete done!')</script>";
echo"<script>window.open('index.php?view_cats','_self')</script>";
}else {

echo"<script>alert('ERROR ON DELETE!')</script>";
}

}

?>