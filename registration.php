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
a 
{
	color:#0067ab; text-decoration:none;
}
.form
{
    width: 300px; 
    margin: 0 auto;
}
input[type='text'], input[type='username'], input[type='email'], input[type='password'] 
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
input[type='submit'], input[type='Register']
{
    padding: 10px 25px 8px; 
    color: #fff; 
    background-color: #0067ab; 
	border:0;
    display: block;
    margin: 20px auto;
    text-align: center;
    padding: 14px 40px;
    outline: none;
    color: white;
}

</style>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
	require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

		$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
<br /><br />
</div>
<?php 
} 
?>
</body>
</html>
