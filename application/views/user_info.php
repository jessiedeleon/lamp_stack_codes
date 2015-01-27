<!DOCTYPE html>
<html>
<head>
	<title>User Info</title>
</head>
<body>
<div>
	<h2>Welcome <?= $user_info['first_name']; ?>!</h2>
	<div>
		<h3>User Information</h3>
		<p>First name: <span><?= $user_info['first_name']?></span></p>
		<p>Last name: <span><?= $user_info['last_name']?></span></p>
		<p>Email: <span><?= $user_info['email']?></span></p>
	</div>
	<a href="/main/logout">Logout</a>
</div>
</body>
</html>