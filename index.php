<?php

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
    color: white;
}
</style>
<meta charset="utf-8">
<title>Welcome</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p>Welcome <?php echo $_SESSION['username']; ?>!</p>
<p><a href="dashboard.php">Dashboard</a></p>
<a href="logout.php">Logout</a>


<br /><br /><br /><br />
</div>
</body>
</html>
