<?php require_once("../inc/session.php"); ?>
<?php require_once("../inc/dbconnect.php"); ?>
<?php require_once("../inc/function.php"); ?>

<?php
if (isset($_POST["submit"])) {
	$name = $_POST["name"];
	$address = $_POST["address"];

	$query = "INSERT INTO user ";
	$query .= "(name, address) ";
	$query .= "VALUES ";
	$query .= "('{$name}', '{$address}')";

	$result = mysqli_query($conn, $query);
	if ($result) {
		$_SESSION["qry_success"] = "Successfully added.";
		redirect_to("index.php");
	} else {
		$_SESSION["qry_error"] = "Failed to add " . mysqli_error($conn);
		redirect_to("index.php");
	}
}