<?php
	
	function fetchAsJson($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:x.x.x) Gecko/20041107 Firefox/x.x");
		$output = curl_exec($ch);
		curl_close($ch);

		return json_decode($output, true);
	}

	function getAlbumInfo(&$year, &$numTracks, $albumID) {

		$url = 'https://api.spotify.com/v1/albums/' . $albumID;

		$outputAsJson = fetchAsJson($url);

		$year = $outputAsJson['release_date'];
		
		if($outputAsJson['release_date_precision'] != 'year') {
			$arr = explode("-", $year, 2);
			$year = $arr[0];
		}

		$numTracks = $outputAsJson['tracks']['total'];		
	}

	function saveToXml($output) {
		
		$dom = new DomDocument('1.0', 'UTF-8');
		$xslt = $dom->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="albumfound.xsl"');


		$dom->appendChild($xslt);
		$root = $dom->appendChild($dom->createElement('albums'));

		//var_dump($output);
		$counter = 1;
		foreach ($output['albums']['items'] as $album) {

			$url = 'https://api.spotify.com/v1/albums/' . $album['id'];

			$albumInfo = fetchAsJson($url);

			$albumNode = $dom->createElement('album');
			$root->appendChild($albumNode);

			$albumNodeAttr = $dom->createAttribute('ID');
			$albumNodeAttr->appendChild($dom->createTextNode($counter));
			$albumNode->appendChild($albumNodeAttr);

			$albumName = $dom->createElement('albumName', $albumInfo["name"]);
			$albumNode->appendChild($albumName);

			$artist = $dom->createElement('artist', $albumInfo['artists'][0]['name']);
			$albumNode->appendChild($artist);

			$yearReleased = $albumInfo['release_date'];
		
			if($albumInfo['release_date_precision'] != 'year') {
				$arr = explode("-", $yearReleased, 2);
				$yearReleased = $arr[0];
			}

			$year = $dom->createElement('year', $yearReleased);
			$albumNode->appendChild($year);

			$numTracks = $dom->createElement('numTracks', $albumInfo['tracks']['total']);
			$albumNode->appendChild($numTracks);

			$imgUrl = $dom->createElement('imgUrl', $albumInfo['images'][0]['url']);
			$albumNode->appendChild($imgUrl);

			$albumUrl = $dom->createElement('albumUrl', $albumInfo['external_urls']['spotify']);
			$albumNode->appendChild($albumUrl);

			$counter++;
		}

		$dom->formatOutput = true;

		$songlib = $dom->saveXML();
		$dom->save('xml/albumlib.xml');
	}

	//ini_set('display_errors', 1);	


	$albumName = str_replace(' ', '+', $albumName);
	$artist = str_replace(' ', '+', $artist);

	if($artist == 'artist' || $artist == '') {
		$url = 'https://api.spotify.com/v1/search?q=album%3A'. $albumName .'&type=album';

		$output = fetchAsJson($url);

		saveToXml($output);

		$edit_id = -1;
		include 'foundAlbums.php';

		$imgUrl = '../img/placeholder.png';
		$albumUrl = 'https://open.spotify.com/album/404';

	} else {


		$url = 'https://api.spotify.com/v1/search?q=album%3A'. $albumName .'+artist%3A' . $artist. '&type=album';
	
		$albumName = ucwords(strtolower(str_replace('+', ' ', $albumName)));
		$artist = ucwords(strtolower(str_replace('+', ' ', $artist)));

		$outputAsJson  = fetchAsJson($url);


		if($outputAsJson['albums']['total'] == 0) {
			$imgUrl = '../img/placeholder.png';
			$albumUrl = 'https://open.spotify.com/album/404';
		}
		else {

			echo $albumID = $outputAsJson['albums']['items'][0]['id'];
			getAlbumInfo($year, $numTracks, $albumID);

			$imgUrl = $outputAsJson['albums']['items'][0]['images'][0]['url'];
			$albumUrl = $outputAsJson['albums']['items'][0]['external_urls']['spotify'];
		}
	}

?>