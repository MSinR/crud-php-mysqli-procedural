<?php
define("DB_HOST", "127.0.0.1");
define("DB_USER", "root");
define("DB_PASS", "toor");
define("DB_NAME", "sample_crud");

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_errno()) {
	die("FAILED TO CONNECT DATABASE " . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")");
}