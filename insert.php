<?php

require('db.php');
include("auth.php");

$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$trn_date = date("Y-m-d H:i:s");
$name =$_REQUEST['name'];
$marks = $_REQUEST['marks'];
$submittedby = $_SESSION["username"];
$ins_query="insert into new_record (`trn_date`,`name`,`marks`,`submittedby`) values ('$trn_date','$name','$marks','$submittedby')";
mysqli_query($con,$ins_query) or die(mysql_error());
$status = "New Marks Added Successfully.</br></br><a href='view.php'>View Added Marks</a>";
}
?>

<DOCTYPE html>
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
<title>Store my results</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> | <a href="view.php">View Marks</a> | <a href="logout.php">Logout</a></p>

<div>
<h1>Add New Marks</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="name" placeholder="Enter Subject Name with Code" required /></p>
<p><input type="text" name="marks" placeholder="Enter Marks" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:green;"><?php echo $status; ?></p>

<br /><br /><br /><br />
</div>
</div>
</body>
</html>

 
