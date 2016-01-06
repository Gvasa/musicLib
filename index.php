<html>
	<head>
 		<title>Music Lib</title>
	</head>

	<body>
 		<?php 
			include 'dbconnect.php';

			/* $sql = "INSERT INTO $tablename (songName, artist, year, genre)
					VALUES ('klaus', 'untz', 1964, 'insane')";

					if ($dbConn->query($sql) === TRUE) {
					    echo "New record created successfully <br>";
					} else {
					    echo "Error: " . $sql . "<br>" . $conn->error;
					} */
			
			$sqlQuery = "SELECT * FROM $tablename WHERE 1";
			$result = $dbConn->query($sqlQuery);

			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			        echo "id: " . $row["ID"]. " - Name: " . $row["songName"]. " " . $row["artist"]. " " . $row["genre"]. "<br>";
			    }
			} else {
			    echo "0 results";
			}
			$dbh->close();
		?> 


	</body>
</html>

