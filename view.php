<?php

require('db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
    <style>
body
{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background: lightblue;
}
.form
{
    width: 300px; 
    margin: 0 auto;
}
a
{
	color:#0067ab; 
    text-decoration:none;
}

</style>
<meta charset="utf-8">
<title>View Marks</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="index.php">Home</a> | <a href="insert.php">Add New Marks</a> | <a href="logout.php">Logout</a></p>
<h2>View Marks</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead action="print.php" method="POST">
<tr>
<th><strong >S.No</strong></th>
<th><strong>Subject Name with Code </strong></th>
<th><strong>Total Marks</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th></tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from new_record ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td align="center"><?php echo $count; ?></td>
    <td align="center"><?php echo $row["name"]; ?></td>
    <td align="center"><?php echo $row["marks"]; ?></td>
    <td align="center">
        <a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
        <td align="center"><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td></tr>
<?php $count++; } ?>
</tbody>
</table>

<br /><br /><br /><br />


<a href="print.php">Print</a> 



</div>
</body>
</html>
