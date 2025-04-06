<?php
//DATABASE Name will come here
$database = "2024_cricketai"; /* Database name */

$host = "localhost";    /* Host name */
$user = "root";         /* User */
$password = "";         /* Password */


$connection=mysql_connect($host,$user,$password);
$db=mysql_select_db($database,$connection);
if (!$db) {
	die("Database connection failed ! >> ".mysqli_connect_error());
}else
{
	//echo "Database connection is fine!";
	session_start();
}
?>