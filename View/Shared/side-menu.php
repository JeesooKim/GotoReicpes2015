<?php  include "c:/xampp/htdocs/GotoReicpes2015/config.php"; ?>
<!-- Sidebar -->
      <div id="sidebar-wrapper">
      <ul id="sidebar_menu" class="sidebar-nav">
           <li class="sidebar-brand"><a id="menu-toggle" href="#">Menu<span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
      </ul>
        <ul class="sidebar-nav" id="sidebar">     
          <li><a href="<?php echo PATH_ADMIN_EVENTS . '/index.php';?>">Events<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a href="<?php echo PATH_ADMIN_IMAGESLIDER .'/imageslider_admin.php';?>">Image Slider<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a href="<?php echo PATH_ADMIN_IMAGEGALLERY . '/index.php';?>">Gallery<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a href="<?php echo PATH_ADMIN_GOOGLEMAP .'/location_admin.php';?>">Location<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a href="<?php echo PATH_ADMIN_RECIPES . '/index.php';?>">Recipes<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a href="<?php echo PATH_ADMIN_TOPRECIPES . '/index.php';?> ">Top Recipes<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a href="<?php echo PATH_ADMIN_VOLUNTEER . '/index.php';?> ">Volunteer<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a href="<?php echo PATH_ADMIN_SITEMAP . '/index.php';?> ">Sitemap<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a>Volunteer<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a>FAQ<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a>Live Chat<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a>Search<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
        </ul>
      </div>
</div><!-- end of #wrapper (header-admin.php)-->
<script>
    
$("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
});

</script>