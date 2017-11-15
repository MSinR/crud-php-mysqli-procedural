<?php
session_start();

function query_session_msg() {
	if (isset($_SESSION["qry_error"])) {
		$output = "<div class=\"qry_error\">";
		$output .= htmlentities($_SESSION["qry_error"]);
		$output .= "<div class=\"qry_error\">";
		$_SESSION["qry_error"] = null;
		return $output;
	} elseif (isset($_SESSION["qry_success"])) {
		$output = "<div class=\"qry_success\">";
		$output .= htmlentities($_SESSION["qry_success"]);
		$output .= "<div class=\"qry_success\">";
		$_SESSION["qry_success"] = null;
		return $output;
	}
}