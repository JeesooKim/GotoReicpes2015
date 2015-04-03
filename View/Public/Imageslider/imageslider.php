<?php   include "c:/xampp/htdocs/GotoReicpes2015/config.php";  ?>

<?php include SITEROOT. PATH_HEADER;  ?>  
<!--end top-->
<?php
require_once( SITEROOT. PATH_DATABASE);   //SERVER ROOT is not working but SITEROOT is working ......why?
require_once( SITEROOT. PATH_MODEL_IMAGESLIDERS );
require_once( SITEROOT. PATH_MODEL_IMAGESLIDER_DB );
?>

<section id="content">
<!-- image slider feature -->

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
        <?php
        $imageslider = ImagesliderDB::getImagesliders();
        foreach ($imageslider as $row):
            ?>
        <img src="<?php echo $row->getPath() ?>" alt="<?php echo $row->getName(); ?>" title="<?php echo $row->getName(); ?>" />
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</section>