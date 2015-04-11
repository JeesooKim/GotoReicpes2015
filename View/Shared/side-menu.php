<!-- Sidebar -->
            <!-- Sidebar -->
      <div id="sidebar-wrapper">
      <ul id="sidebar_menu" class="sidebar-nav">
           <li class="sidebar-brand"><a id="menu-toggle" href="#">Menu<span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
      </ul>
        <ul class="sidebar-nav" id="sidebar">     
          <li><a>Events<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a>Imageslider<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a>Gallery<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a>Location<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a>Recipes<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a>TopRecipes<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a>Volunteer<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a>FAQ<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a>Live Chat<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li><a>Search<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
        </ul>
      </div>
</div>

<script>
    
$("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
});

</script>