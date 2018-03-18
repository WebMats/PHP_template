<?php
// $mysqli = new mysqli("localhost", "root", "exclusion", "studentinfo");
// if ($mysqli->connection_errno) {
// 	echo "Failed to connect to MySQL: ('" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
// }
// echo $mysqli->host_info . "\n";

$db_user = "";
$db_password = "";
$db_host = "127.0.0.1";
$db_name = "";


$dbc = mysqli_connect($db_host, $db_user, $db_password, $db_name, 3306);
	if ($mysqli->connect_errno) {
		echo "Failed to connec to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connec_error;;
	}
?>