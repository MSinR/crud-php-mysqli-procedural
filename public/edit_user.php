<?php require_once("../inc/session.php"); ?>
<?php require_once("../inc/dbconnect.php"); ?>
<?php require_once("../inc/function.php"); ?>
<?php $user = find_user_by_id($_GET["id"]); ?>
<?php
	if (!$user) {
		redirect_to("index.php");
	}
	?>
<?php 
if (isset($_POST["submit"])) {
	$id = $user["id"];
	$name = $_POST["name"];
	$address = $_POST["address"];

	$query = "UPDATE user set ";
	$query .= "name = '{$name}', ";
	$query .= "address = '{$address}' ";
	$query .= "WHERE id = {$id} ";
	$query .= "LIMIT 1";

	$result = mysqli_query($conn, $query);

	if ($result && mysqli_affected_rows($conn) == 1) {
		$_SESSION["qry_success"] = "Successfully changed.";
		redirect_to("index.php");
	} else {
		$_SESSION["qry_error"] = "Failed edit data " . mysqli_error($conn);
		redirect_to("index.php");
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sample CRUD</title>
	<link rel="stylesheet" type="text/css" href="stylesheets/public.css">
</head>
<body>

	<div class="main">
	<?php echo query_session_msg(); ?>
	<h1>New User</h1>
<form action="edit_user.php?id=<?php echo urlencode($user["id"]); ?>" method="post">
	<p>Name:
		<input type="text" name="name" value="<?php echo htmlentities($user["name"]); ?>">	
	</p>
	<p>Address
		<input type="text" name="address" value="<?php echo htmlentities($user["address"]); ?>">
	</p>
	<input type="submit" name="submit" value="Save Changes">
</form>

</body>
</html>