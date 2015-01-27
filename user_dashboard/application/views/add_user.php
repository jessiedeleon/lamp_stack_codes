<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php
	if(isset($add_user["success"])) 
	{
		if($add_user["success"])
		{	?>
		<div class="success">
<?php 		echo $add_user["success_message"]; ?>
		</div>
<?php 	}
		else
		{	?>
		<div class="error">
<?php		echo $add_user["error_message"];	?>
		</div>
<?php
		}
	}	?>
	<h3>Add User</h3>
	<form action="/users/add_user" method="post">
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
		<input type="submit" value="Add user">
	</form>
</body>
</html>