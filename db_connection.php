<?php
//DATABASE Name will come here
$database = "cricketai"; /* Database name */

$host = "localhost";    /* Host name */
$user = "root";         /* User */
$password = "";         /* Password */

$conn = mysqli_connect($host, $user, $password);
$db = mysqli_select_db($conn, $database);
if (!$db) {
    die("Database connection failed ! >> " . mysqli_connect_error());
} else {
    //echo "Database connection is fine!";
    if (session_status() === PHP_SESSION_NONE) {
		session_start();
	}
	
}
?>
