<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Brand</title>
</head>

<body>
<table align="center" width="700" >
<tr>
<th>Brand SN.</th>
<th>BRAND NAME.</th>
<th>DELETE</th>
<th>EDIT</th>
</tr>
<?php 
include("includes/db.php");
$get_brand="select * from brands";
$run_brand= mysqli_query($con,$get_brand);
while($row_brand=mysqli_fetch_array($run_brand)){
$brand_id = $row_brand['brand_id'];
$brand_title = $row_brand['brand_title'];

?>
<tr>
<th><?php echo $brand_id; ?></th>
<th><?php echo $brand_title  ?></th>
<th><a href="edit_brand.php?edit_brand= <?php echo $brand_id; ?>">EDIT</a></th>
<th><a href="delete_brand.php?delete_brand=<?php echo $brand_id; ?>">DELETE</a></th>
<?php } ?>
</tr>
</table>

</body>
</html>
