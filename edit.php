<?php 
require('db.php');
include("auth.php");
$id=$_REQUEST['id'];
$query = "SELECT * from new_record where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
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
input[type='text']
{
	border:0;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px;
    padding: 14px 10px;
    width: 200px;
    outline: none;
    color: black;
}
</style>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> | <a href="insert.php">Add New Marks</a> | <a href="logout.php">Logout</a></p>
<h1>Update Marks</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$trn_date = date("Y-m-d H:i:s");
$name =$_REQUEST['name'];
$marks =$_REQUEST['marks'];
$submittedby = $_SESSION["username"];
$update="update new_record set trn_date='".$trn_date."', name='".$name."', marks='".$marks."', submittedby='".$submittedby."' where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br><a href='view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" name="name" placeholder="Enter Subject Name with code" required value="<?php echo $row['name'];?>" /></p>
<p><input type="text" name="marks" placeholder="Enter Marks" required value="<?php echo $row['marks'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>

<br /><br /><br /><br />
</div>
</div>
</body>
</html>
