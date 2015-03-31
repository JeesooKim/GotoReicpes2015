<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to GoToRecipes</title>
	<!--[if lt IE 9]>
	      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	      <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->        
                    <!-- change 'yourdirectory' according to your local directory-->
<!--	<link href="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/GotorecipesGITHUB/GotoReicpes2015/Content/css/bootstrap.css" rel="stylesheet" />
	<link href="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/GotorecipesGITHUB/GotoReicpes2015/Content/css/style.css" rel="stylesheet" type="text/css" />
	<link href="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/GotorecipesGITHUB/GotoReicpes2015/Content/css/reset.css" rel="stylesheet" type="text/css" />
	-->
                    <link href="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/project2015_Mar24_forWEB/Content/css/bootstrap.css" rel="stylesheet" />
	<link href="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/project2015_Mar24_forWEB/Content/css/style.css" rel="stylesheet" type="text/css" />
	<link href="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/project2015_Mar24_forWEB/Content/css/reset.css" rel="stylesheet" type="text/css" />
	
        
                <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                <!-- Include all compiled plugins (below), or include individual files as needed -->
                    <script src="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/project2015_Mar24_forWEB/Content/js/bootstrap.min.js"></script>

                    <!-- The following is for Image Gallery -->                    
                    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
                    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/bootstrap-image-gallery.css"> 
                    <!-- Bootstrap JS is not required, but included for the responsive demo navigation and button states -->                    
                    <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
                    <script src="//blueimp.github.io/Gallery/js/blueimp-gallery.min.js"></script>
                    <script src="//blueimp.github.io/Gallery/js/bootstrap-image-gallery.js"></script>
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
                                <a class="navbar-brand" href="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/project2015_Mar24_forWEB/View/Public/index.php">
                                    <img id="logo" src="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/project2015_Mar24_forWEB/Content/uploads/images/logo.jpg" alt="gotorecipes" /></a>
                        </div><!-- end of "navbar-header-->

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                <li><a href="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/project2015_Mar24_forWEB/View/Admin/register.php">Register</a></li>
                                <li><a href="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/project2015_Mar24_forWEB/View/Admin/login.php">Login</a></li>
                                <form class="navbar-form navbar-right" role="search">
                                    <div class="form-group">
                                            <input type="text" class="form-control" type="search" placeholder="Search">
                                    </div>
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </form>
                                </ul>
                        </div><!-- /.navbar-collapse -->
                                <ul class="nav navbar-nav">
                                <li class="active"><a href="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/project2015_Mar24_forWEB/View/Public/index.php">Home<span class="sr-only">(current)</span></a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Recipes <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                                <li><a class="ddl_link" href="#">Top Recipes</a></li>
                                                <li><a class="ddl_link" href="#">Newest Recipes</a></li>
                                                <li class="divider"></li>
                                                <li><a class="ddl_link" href="#">Appetizers</a></li>
                                                <li><a class="ddl_link" href="#">Breakfast</a></li>
                                                <li><a class="ddl_link" href="#">Lunch</a></li>
                                                <li><a class="ddl_link" href="#">Dinner</a></li>
                                        </ul>
                                </li>
                                <li><a href="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/project2015_Mar24_forWEB/View/Public/ImageGallery/imagegallery.php">Gallery</a></li>
                                <li><a href="#">Events</a></li>
                                <li><a href="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/project2015_Mar24_forWEB/View/Public/ContactUs/contactus_form.php">Contact Us</a></li>
                                </ul>
                        
                </div><!-- /.container-fluid -->
        </nav>
        <!--end top_nav-->
</header>
<!--end top-->
    
