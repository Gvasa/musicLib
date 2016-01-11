<?php	
	ini_set('display_errors', 1);

	//$dom = new DomDocument('1.0', 'UTF-8');
	$dom = new DOMImplementation();
	
	$dtd = $dom->createDocumentType('albums', '', 'albums.dtd');
	 // Creates a DOMDocument instance
    $dom = $dom->createDocument("", "", $dtd);
	$xslt = $dom->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="albumlib.xsl"');
	
	if($edit_id == -1) 
		$sqlQuery = "SELECT * FROM $tablename WHERE 1";
	else {
		$sqlQuery = "SELECT * FROM $tablename WHERE ID = " . $edit_id;
		$xslt = $dom->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="albumlibedit.xsl"');
	}

	

	$dom->appendChild($xslt);
	$root = $dom->appendChild($dom->createElement('albums'));
	$result = $dbConn->query($sqlQuery);


	if(!$result)
		echo "Could not fetch from db";

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

			$albumNode = $dom->createElement('album');
			$root->appendChild($albumNode);

			$albumNodeAttr = $dom->createAttribute('ID');
			$albumNodeAttr->appendChild($dom->createTextNode($row["ID"]));
			$albumNode->appendChild($albumNodeAttr);

			$albumName = $dom->createElement('albumName', $row["albumName"]);
			$albumNode->appendChild($albumName);

			$artist = $dom->createElement('artist', $row["artist"]);
			$albumNode->appendChild($artist);

			$year = $dom->createElement('year', $row["year"]);
			$albumNode->appendChild($year);

			$numTracks = $dom->createElement('numTracks', $row["numTracks"]);
			$albumNode->appendChild($numTracks);

			$imgUrl = $dom->createElement('imgUrl', $row["imgUrl"]);
			$albumNode->appendChild($imgUrl);

			$albumUrl = $dom->createElement('albumUrl', $row["albumUrl"]);
			$albumNode->appendChild($albumUrl);
		}

	} else
		echo "0 results";

	$dom->formatOutput = true;

	$songlib = $dom->saveXML();
	$dom->save('xml/albumlib.xml');
?>