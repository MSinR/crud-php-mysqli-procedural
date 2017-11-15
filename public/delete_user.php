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
if (isset($_GET["id"])) {
	$id = $user["id"];

	$query = "DELETE FROM user WHERE id = {$id}";

	$result = mysqli_query($conn, $query);

	if ($result && mysqli_affected_rows($conn) == 1) {
		$_SESSION["qry_success"] = "Successfully deleted.";
		redirect_to("index.php");
	} else {
		$_SESSION["qry_error"] = "Failed delete data " . mysqli_error($conn);
		redirect_to("index.php");
	}
} else {
	redirect_to("index.php");
}
?>