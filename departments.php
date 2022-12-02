<?php
define("DB_SERVER", "127.0.0.1");
define("DB_USER", "mentor");
define("DB_PASSWORD", "mentor");
define("DB_NAME", "mentors");

header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con, DB_NAME);

$sql = "";
$sql .= "SELECT * ";
$sql .= "FROM departments ";
$sql .= "ORDER BY dept;";

$result = mysqli_query($con, $sql);
$departments = [];
while($row = mysqli_fetch_assoc($result)) {
	$departments[] = $row;
}
echo json_encode($departments);
mysqli_close($con);
?>