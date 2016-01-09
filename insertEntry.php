<?php

	ini_set('display_errors', 1);	
	include('dbconnect.php');
 	
	$albumName = $_POST['albumName'];
	$artist = $_POST['artist'];

	if( isset($_POST['year']) ) {
		$year = $_POST['year'];
		$numTracks = $_POST['numTracks'];
		$imgUrl = $_POST['imgUrl'];
		$albumUrl = $_POST['albumUrl'];

	} else {
		include('scraper.php');
	}

	if(isset($year)) {
		$sql = "INSERT INTO `albumLib` (albumName, artist, year, numTracks, imgURL, albumURL) VALUES ('" . $albumName . "', '" . $artist . "', '" . $year . "', '" . $numTracks . "', '" . $imgUrl . "', '". $albumUrl ."')";
		if($dbConn->query($sql) == TRUE)
			echo "<br>successfully addhed";
		else 
			echo "<br>something went shitface";

		$dbConn->close();
		include('redirect.php');
	}

?>
