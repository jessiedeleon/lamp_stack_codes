<!DOCTYPE html>
<html>
<head>
	<title>Login Registration</title>
</head>
<body>
<div>
<?php
	if(isset($login_user["success"])) 
	{
		if($login_user["success"])
		{	?>
		<div class="success">
<?php 		echo $login_user["success_message"]; ?>
		</div>
<?php 	}
		else
		{	?>
		<div class="error">
<?php		echo $login_user["error_message"];	?>
		</div>
<?php
		}
	}	?>
	<div>
		<h3>Login</h3>
		<form action="/login/log_in" method="post">
			<div>
				<label>Email: </label>
				<input type="text" name="email">
			</div>
			<div>
				<label>Password: </label>
				<input type="password" name="password">
			</div>
			<input type="submit" value="Login">
		</form>
	</div>

	<div>
		<h3>Or Register</h3>
		<form action="/login/register" method="post">
			<div>
				<label>Fisrt name: </label>
				<input type="text" name="first_name">
			</div>
			<div>
				<label>Last Name: </label>
				<input type="text" name="last_name">
			</div>
			<div>
				<label>Email: </label>
				<input type="text" name="email">
			</div>
			<div>
				<label>Password: </label>
				<input type="password" name="password">
			</div>
			<div>
				<label>Confirm Password: </label>
				<input type="password" name="confirm_password">
			</div>
			<input type="submit" value="Register">
		</form>
	</div>
</div>
</body>
</html>