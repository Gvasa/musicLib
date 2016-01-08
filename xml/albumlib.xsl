<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="xml" indent="yes"/>
   	<xsl:param name="rows" select="3"/>

  	<xsl:template match="albums">
  		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
  		<link rel="stylesheet" type="text/css" href="css/agency.css" />
  		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    	<div class="container">
         	<xsl:apply-templates select="album[position() mod $rows = 1]" mode="group"/>
      	</div>
   	</xsl:template>

   	<xsl:template match="album" mode="group">
      	<div class="row text-center">
         	<xsl:apply-templates select="self::*|following-sibling::album[position() &lt; $rows]"/>
     	</div>
   	</xsl:template>

   	<xsl:template match="album">
      	<div class="col-md-4 col-sm-6 portfolio-item">
	      	<a target="_blank" class="portfolio-link" data-toggle="modal">
	  			<xsl:attribute name="href">
	  				<xsl:value-of select="albumUrl" />
	  			</xsl:attribute>
	  			<div class="custom-hover">
		      		<figure>
		      			<img class="img-responsive" alt="">
		      				<xsl:attribute name="src">
		      					<xsl:value-of select="imgUrl"/>
		      				</xsl:attribute>
		      			</img>
		      		</figure>
		      	</div>
	      	</a>
      		<div class="portfolio-caption">
	         	<h4>
	         		<xsl:value-of select="albumName"/>
	         	</h4>
	         	<p class="text-muted">
	         		<xsl:value-of select="artist"/>
	 				- <xsl:value-of select="year"/>
	 				<br/> 
	 				Tracks &#160; <xsl:value-of select="numTracks"/>
	         	</p> 
	         
	         	<form action="editEntry.php" method="POST">
	         		<input type="hidden" name="edit_id" >
	         			<xsl:attribute name="value">
	         				<xsl:value-of select="@ID" />
	         			</xsl:attribute>
	         		</input>
	         		<input class="btn"  type='submit' value="Edit">
	         			<xsl:attribute name="id">
	         				<xsl:value-of select="@ID" />
	         			</xsl:attribute>
	         		</input>
	         	</form>
	         	<form action="deleteEntry.php" method="POST">
	         		<input type="hidden" name="delete_id" >
	         			<xsl:attribute name="value">
	         				<xsl:value-of select="@ID" />
	         			</xsl:attribute>
	         		</input>
	         		<input class="btn" type='submit' value="Delete">
	         			<xsl:attribute name="id">
	         				<xsl:value-of select="@ID" />
	         			</xsl:attribute>
	         		</input>
	         	</form>
         	</div>
      	</div>
   	</xsl:template>
</xsl:stylesheet>
