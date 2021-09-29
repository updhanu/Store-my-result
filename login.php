
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
input[type='text'], input[type='username'], input[type='password'] 
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
input[type='submit']
{
	padding: 10px 25px 8px; 
    color: #fff; 
    background-color: #0067ab; 
    display: block;
    margin: 20px auto;
    text-align: center;
    padding: 14px 40px;
    outline: none;
    color: white;
    cursor: pointer;
}
</style>
<meta charset="utf-8">
<title>Login</title>
</head>
<body>
<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysqli_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: index.php"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{
?>
<div class="container">
<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>

<br /><br />

</div>
	</div>
<?php } ?>


</body>
</html>
