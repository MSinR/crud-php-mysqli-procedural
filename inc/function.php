<?php
function redirect_to($new_location) {
	header("Location:"."$new_location");
	exit;
}

function mysql_prep($string) {
	global $conn;
	$escaped_string = mysqli_real_escape_string($conn, $string);
	return $escaped_string;
}

function confirm_query($result_set) {
	global $conn;
	if (!$result_set) {
		die("Failed query " . "(" . mysqli_error($conn) . ")");
	}
}

function find_all_user() {
	global $conn;
	$query = "SELECT * FROM user ";
	$result = mysqli_query($conn, $query);
	confirm_query($result);
	return $result;
}

function find_user_by_id($id) {
	global $conn;
	$safe_id = mysql_prep($id);
	$query = "SELECT * FROM user ";
	$query .= "WHERE id = {$safe_id}";
	$result_set = mysqli_query($conn, $query);
	confirm_query($result_set);
	if ($result = mysqli_fetch_assoc($result_set)) {
		return $result;
	} else {
		return null;
	}
}