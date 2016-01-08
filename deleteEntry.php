<?php
	
	ini_set('display_errors', 1);
	include('dbconnect.php');

	$id = $_POST['delete_id'];

	//echo $sql = "DELETE FROM `songLib` WHERE ID = " . $id;
	$sql = "DELETE FROM `albumLib` WHERE ID = " . $id;
	if($dbConn->query($sql) == TRUE)
		echo "successfully deleted";
	else 
		echo "something went shitface";

	$dbConn->close();
	include('redirect.php');

?>
