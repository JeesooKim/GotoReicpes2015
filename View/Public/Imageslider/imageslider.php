<?php //include "C:/wamp/www/GotorecipesGITHUB/GotoReicpes2015/config.php";  

require_once( '../../../Model/database.php' );
require_once( '../../../Model/imagesliders.php' );
require_once( '../../../Model/imageslider_db.php' );
?>
    <link href="../.././Content/css/responsiveslides.css" rel="stylesheet" type="text/css" />
    <script src="../../../Content/js/responsiveslides.min.js"></script>
  
<section id="content">
<!-- image slider feature -->
    <ul class="rslides">
        <?php
        $imageslider = ImagesliderDB::getImagesliders();
        foreach ($imageslider as $row):
        ?>
        <li><?php echo '<img src="../../../Content/uploads/images/imageslider/' . $row->getPath(). '"  '; ?></li>
        <?php endforeach; ?>
    </ul>   

<script>
    //credit to: http://responsiveslides.com/ for imageslider template
    $(function () {
        $(".rslides").responsiveSlides({
        auto: true,
        pager: false,
        speed: 50
      });
    });
</script>