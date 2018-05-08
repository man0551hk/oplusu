<?php
include("interface1.php");
include 'oplusu_admin/controller/home_setting.inc';
?>

<section id="hero-area">
  <div class="container">
    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">

    <!--
      <?php
        $slider = $homeClass->HomeGetSliderImage();
      ?>
      <ol class="carousel-indicators">
        <?php
          print $slider[0];
        ?>
      </ol>-->
      <div class="carousel-inner">
        <?php
          print $slider[1];
        ?>
      </div>
    </div>
  </div>
</section>
<!-- * Snippet Box * -->
<table cellpadding="0" cellspacing="0" border="0">
  <tr>
    <td>
    <xsl:choose>
      <xsl:when test="MT/@N='description' and MT/@V!=''">
        <xsl:value-of select="MT[@N = 'description']/@V"/>
      </xsl:when>
      <xsl:otherwise>
          <xsl:call-template name="reformat_keyword">
            <xsl:with-param name="orig_string" select="S"/>
          </xsl:call-template>
      </xsl:otherwise>
    </xsl:choose>
    </td>
  </tr>
</table>
<?php
include("interface2.php");
?>
