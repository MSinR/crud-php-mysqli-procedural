<?php require_once("../inc/session.php"); ?>
<?php require_once("../inc/dbconnect.php"); ?>
<?php require_once("../inc/function.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sample CRUD</title>
	<link rel="stylesheet" type="text/css" href="stylesheets/public.css">
</head>
<body>

	<div class="main">
		<?php echo query_session_msg(); ?>
		<h1>Sample CRUD</h1>

	<?php $user_set = find_all_user(); ?>
	<?php if (mysqli_num_rows($user_set) > 0) { ?>
		<table width="25%" border="1px solid black">
			<caption>User List</caption>
			<tr>
				<th>Name</th>
				<th>Address</th>
				<th>Action</th>
			</tr>
			<?php while ($user = mysqli_fetch_assoc($user_set)) { ?>
			<tr align="center">
				<td><?php echo htmlentities($user["name"]); ?></td>
				<td><?php echo htmlentities($user["address"]); ?></td>
				<td>
					<a href="edit_user.php?id=<?php echo urlencode($user["id"]); ?>">Edit</a>
					&nbsp;|
					<a href="delete_user.php?id=<?php echo urlencode($user["id"]); ?>" onclick="return confirm('Are you sure?')">Delete</a>
				</td>
			</tr>
			<?php } ?>
		</table>
<?php } else { ?>
<p>There's nothing in here...<a href="new_user.php">add new user</a></p>
	</div>
<?php } ?>

</body>
</html>