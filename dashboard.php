<?php
require('db.php');
include("auth.php"); //include auth.php file on all secure pages ?>
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
</style>
<meta charset="utf-8">
<title>Dashboard</title>
</head>
<body>
<div class="form">
<p>Welcome</p>

<p><a href="index.php">Home</a><p>
<p><a href="insert.php">Add New Marks</a></p>
<p><a href="view.php">View Marks</a><p>
<p><a href="logout.php">Logout</a></p>

</div>
</body>
</html>
