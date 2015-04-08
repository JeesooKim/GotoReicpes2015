<?php include "C:/wamp/www/GotorecipesGITHUB/GotoReicpes2015/config.php";  

require_once( PATH_DATABASE);
require_once( PATH_MODEL_IMAGESLIDERS );
require_once( PATH_MODEL_IMAGESLIDER_DB );
?>
<?php include PATH_HEADER;  ?>  
    <link href="<?php echo  PATH_CSS; ?>/responsiveslides.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo PATH_RSLIDER.'/responsiveslides.min.js' ?>"></script>
  
<section id="content">
<!-- image slider feature -->
    <ul class="rslides">
        <?php
        $imageslider = ImagesliderDB::getImagesliders();
        foreach ($imageslider as $row):
        ?>
        <li><a href="#"><img src="<?php echo SERVERROOT . "/" . $row->getPath(); ?>"</a></li>
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