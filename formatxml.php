<?php
	ini_set('display_errors', 1);
	$xsldoc = new DOMDocument();

	if($foundAlbums == true)
		$xsldoc->load('xml/albumfound.xsl');
	else if($edit_id == -1) 
		$xsldoc->load('xml/albumlib.xsl');
	else
		$xsldoc->load('xml/albumlibedit.xsl');


	$xmldoc = new DOMDocument();
	$xmldoc->load('xml/albumlib.xml');

	if (!$xmldoc->validate()) {
    	echo "This document is valid!\n";
	}

	$xsl = new XSLTProcessor();
	$xsl->importStyleSheet($xsldoc);
	echo $xsl->transformToXML($xmldoc);
?>	