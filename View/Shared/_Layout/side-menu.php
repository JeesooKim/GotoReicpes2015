<?php  include "c:/xampp/htdocs/GotoReicpes2015/config.php"; 

?>
<!-- Sidebar -->
      <div id="sidebar-wrapper">
      <ul id="sidebar_menu" class="sidebar-nav">
           <li class="sidebar-brand"><a id="menu-toggle" href="#">Menu<span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
      </ul>
        <ul class="sidebar-nav" id="sidebar">     
            <li><a href="../Events_admin/index.php">Events<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a href="../Imageslider_admin/imageslider_admin.php">Image Slider<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a href="../Imagegallery_admiin/index.php">Gallery<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a href="../GoogleMap_admin/location_admin.php">Location<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a href="../Recipes_admin/index.php">Recipes<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a href="../Toprecipes_admin/index.php">Top Recipes<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a href="../Volunteer_admin/index.php';?> ">Volunteer<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a href="../Sitemap_admin/index.php">Sitemap<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a href="../faq_admin/faq_index.php">FAQ<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <!--li><a>Live Chat<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a>Search<span class="sub_icon glyphicon glyphicon-link"></span></a></li-->
        </ul>
      </div>
</div><!-- end of #wrapper (header-admin.php)-->
<script>
    
$("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
});

</script>