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
         <div class="col-md-12 text-center portfolio-item">
            <img alt="">
               <xsl:attribute name="src">
                  <xsl:value-of select="imgUrl"/>
               </xsl:attribute>
            </img>
            <div class="portfolio-caption">
               <h4>
                  <xsl:value-of select="albumName"/>
               </h4>
               <p class="text-muted">
                  <xsl:value-of select="artist"/>
               - <xsl:value-of select="year"/>
               </p> 

               <form action="update.php" method="POST">
                  <div class="row">
                     <div class="col-lg-12 text-center top-pad-4px">
                        <input type="text" name="albumName">
                           <xsl:attribute name="value">
                              <xsl:value-of select="albumName"/>
                           </xsl:attribute>
                        </input>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12 text-center top-pad-4px">
                        <input type="text" name="artist">
                           <xsl:attribute name="value">
                              <xsl:value-of select="artist"/>
                           </xsl:attribute>
                        </input>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12 text-center top-pad-4px">
                        <input type="text" name="year">
                           <xsl:attribute name="value">
                              <xsl:value-of select="year"/>
                           </xsl:attribute>
                        </input>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12 text-center top-pad-4px">
                        <input type="hidden" name="edit_id">
                           <xsl:attribute name="value">
                              <xsl:value-of select="@ID" />
                           </xsl:attribute>
                        </input>
                        <input class="btn btn-primary" type="submit" name="submit" value="Save changes"/>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12 text-center top-pad-4px">
                        <a href="http://localhost" class="btn btn-primary">Return to Lib without saving</a>
                     </div>
                  </div>
                 </form>

            </div>
         </div>
      </xsl:template>
</xsl:stylesheet>
