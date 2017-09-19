<?php
include("includes/db.php");
if(isset($_GET['delete_pro'])){

$delete_id = $_GET['delete_pro'];

$delete_pro="delete from products where products_id ='$delete_id'";

$run_delete = mysqli_query($con, $delete_pro);

if($run_delete){

echo"<script>alert('product is delete done!')</script>";
echo"<script>window.open('index.php?view_product','_self')</script>";
}else {

echo"<script>alert('ERROR ON DELETE!')</script>";
}

}

?>