<?php
	
	ini_set('display_errors', 1);
	include('dbconnect.php');

	echo $id = $_POST['edit_id']; 
	echo "<br>";
	echo $albumName = $_POST['albumName'];
	echo "<br>";
	echo $artist = $_POST['artist'];
	echo "<br>";
	echo $year = $_POST['year'];
	echo "<br>";
	echo $genre = $_POST['genre'];
	echo "<br>";
	

	echo $sql ="UPDATE `albumLib` SET `albumName`= '" . $albumName . "',`artist`= '" . $artist . "',`year`= '" . $year . "' WHERE ID = " . $id;
	
	if($dbConn->query($sql) == TRUE)
		echo "successfully updated";
	else 
		echo "something went shitface";

	$dbConn->close();
	include('redirect.php');

?>
