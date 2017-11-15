<!DOCTYPE html>
<html>
<head>
	<title>Sample CRUD</title>
	<link rel="stylesheet" type="text/css" href="stylesheets/public.css">
</head>
<body>

	<div class="main">
		<h1>New User</h1>
<form action="create_user.php" method="post">
	<p>Name:
		<input type="text" name="name">	
	</p>
	<p>Address
		<input type="text" name="address">
	</p>
	<input type="submit" name="submit" value="Save">
</form>

</body>
</html>