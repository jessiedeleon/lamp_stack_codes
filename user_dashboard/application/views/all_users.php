<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table id="all_users">
		<thead>
			<tr>
				<th>User ID</th>
				<th>Email</th>
				<th>Full Name</th>
			</tr>
		</thead>
		<tbody>

<?php   
		foreach($users as $user)
		{
?>
			<tr>
				<th><a href="/users/profile/<?= $user["id"] ?>"><?= $user["id"] ?></a></th>
				<th><?= $user["email"] ?></th>
				<th><?= $user["first_name"]." ".$user["last_name"] ?></th>
			</tr>
<?php
		}
?>
		</tbody>
	</table>
</body>
</html>
