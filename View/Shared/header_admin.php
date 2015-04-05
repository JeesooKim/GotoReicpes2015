<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to GoToRecipes-ADMIN</title>
	<!--[if lt IE 9]>
	      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	      <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->        
                    
                    <link href="<?php echo  PATH_CSS; ?>/bootstrap.css" rel="stylesheet" />
	<link href="<?php echo  PATH_CSS; ?>/style.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo  PATH_CSS; ?>/reset.css" rel="stylesheet" type="text/css" />
	
        
                <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                <!-- Include all compiled plugins (below), or include individual files as needed -->
                    <script src="<?php echo PATH_JS; ?>/bootstrap.min.js"></script>                    

                    <!-- The following is for Image Gallery -->                    
                    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
                    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/bootstrap-image-gallery.css"> 
                    <!-- Bootstrap JS is not required, but included for the responsive demo navigation and button states -->                    
                    <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
                    <script src="//blueimp.github.io/Gallery/js/blueimp-gallery.min.js"></script>
                    <script src="//blueimp.github.io/Gallery/js/bootstrap-image-gallery.js"></script>
                    <script src="<?php echo PATH_JS; ?>/bootstrap-image-gallery.js"></script>
                    <!-- Image Gallery CDN-->
</head> 
<body>
 
<div id="container">
<header>
        <nav class="navbar navbar-default">
                <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                            <!-- admin index -->
                                <a class="navbar-brand" href="<?php echo PATH_ADMIN_INDEX; ?>">                     
                                    <img id="logo" src="<?php echo  PATH_IMAGES."/logo.jpg"; ?>" alt="gotorecipes" /></a>
                        </div><!-- end of "navbar-header-->

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">                                    
                                <li><a href="<?php echo PATH_VIEW_ADMIN; ?>/register.php">Register</a></li>
                                <li><a href="<?php echo PATH_VIEW_ADMIN; ?>/login.php">Login</a></li>                                
                                </ul>
                        </div><!-- /.navbar-collapse -->
                        
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="<?php echo PATH_ADMIN_INDEX; ?>">Home -ADMIN<span class="sr-only">(current)</span></a></li>
                                    <li><a href="#">About Us</a></li>
<!--                                    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Recipes <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                                <li><a class="ddl_link" href="#">Top Recipes</a></li>
                                                <li><a class="ddl_link" href="#">Newest Recipes</a></li>
                                                <li class="divider"></li>
                                                <li><a class="ddl_link" href="#">Appetizers</a></li>
                                                <li><a class="ddl_link" href="#">Breakfast</a></li>
                                                <li><a class="ddl_link" href="#">Lunch</a></li>
                                                <li><a class="ddl_link" href="#">Dinner</a></li>
                                        </ul></li>
                                        -->
                                        <li><a href="<?php echo PATH_ADMIN_RECIPES . '/index.php';?>">Recipes</a></li>
                                        <li><a href="<?php echo PATH_ADMIN_IMAGEGALLERY . '/index.php';?>">Image Gallery</a></li>
                                        <li><a href="<?php echo PATH_ADMIN_EVENTS . '/index.php';?>">Events</a></li>
                                        <li><a href="<?php echo PATH_ADMIN_GOOGLEMAP .'/location_admin.php';?>">Google Map</a></li>
                                        <li><a href="<?php echo PATH_ADMIN_IMAGESLIDER .'/imageslider_admin.php';?>">ImageSlider</a></li>
                                        <li><a href="<?php echo PATH_ADMIN_TOPRECIPES . '/index.php';?> ">Top Recipes</a></li>
                                        <li><a href="<?php echo  SERVERROOT; ?>/index.php"target='_blank'>HOME-PUBLIC</a></li>                                        
                                </ul>
                            <form class="navbar-form navbar-right" role="search">
                                <input type="text" class="form-control" type="search" placeholder="Search . . .">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </form>
                </div><!-- /.container-fluid -->
        </nav>
        <!--end top_nav-->
</header>
<!--end top-->
    