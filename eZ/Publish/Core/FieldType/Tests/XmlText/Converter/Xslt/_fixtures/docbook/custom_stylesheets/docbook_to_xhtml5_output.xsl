<xsl:stylesheet
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:ezcustom="http://ez.no/xmlns/ezpublish/docbook/custom"
    exclude-result-prefixes="ezcustom"
    version="1.0">

  <xsl:variable name="outputNamespace" select="''"/>

  <xsl:template match="ezcustom:custom[@ezcustom:name='youtube']">
    <xsl:element name="div" namespace="{$outputNamespace}">
      <xsl:attribute name="class">jvembed jvembed-youtube</xsl:attribute>
      <xsl:element name="iframe" namespace="{$outputNamespace}">
        <xsl:attribute name="width"><xsl:value-of select="@ezcustom:videoWidth"/></xsl:attribute>
        <xsl:attribute name="height"><xsl:value-of select="@ezcustom:videoHeight"/></xsl:attribute>
        <xsl:attribute name="src">
          <xsl:value-of select="concat( 'http://www.youtube.com/embed/', substring-after( @ezcustom:video, 'http://www.youtube.com/watch?v=' ) )"/>
        </xsl:attribute>
        <xsl:attribute name="frameborder">0</xsl:attribute>
        <xsl:attribute name="allowfullscreen"/>
      </xsl:element>
    </xsl:element>
  </xsl:template>

</xsl:stylesheet>