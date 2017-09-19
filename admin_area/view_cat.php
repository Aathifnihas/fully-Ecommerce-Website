<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Categories</title>
</head>

<body>
<table align="center" width="700" >
<tr>
<th>CATEGORIES SN.</th>
<th>CATEGORIES NAME.</th>
<th>DELETE</th>
<th>EDIT</th>
</tr>
<?php 
include("includes/db.php");
$get_cats="select * from categories";
$run_cats= mysqli_query($con,$get_cats);
while($row_cats=mysqli_fetch_array($run_cats)){
$cat_id = $row_cats['cat_id'];
$cat_title = $row_cats['cat_title'];

?>
<tr>
<th><?php echo $cat_id; ?></th>
<th><?php echo $cat_title  ?></th>
<th><a href="index.php?edit_cats= <?php echo $cat_id; ?>">EDIT</a></th>
<th><a href="delete_cat.php?delete_cats=<?php echo $cat_id; ?>">DELETE</a></th>
<?php } ?>
</tr>
</table>

</body>
</html>
