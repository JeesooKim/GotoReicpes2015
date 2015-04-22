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

        <link href="../../Content/css/bootstrap.css" rel="stylesheet" />
        <link href="../../Content/css/style.css" rel="stylesheet" type="text/css" />
        <link href="../../Content/css/reset.css" rel="stylesheet" type="text/css" />


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../../Content/js/bootstrap.min.js"></script>                    

        <!-- The following is for Image Gallery -->                    
        <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css" />
        <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/bootstrap-image-gallery.css" /> 
        <!-- Bootstrap JS is not required, but included for the responsive demo navigation and button states -->                    
        <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
        <script src="//blueimp.github.io/Gallery/js/blueimp-gallery.min.js"></script>
        <script src="//blueimp.github.io/Gallery/js/bootstrap-image-gallery.js"></script>
        <script src="../../Content/js/bootstrap-image-gallery.js"></script>
        <!-- Image Gallery CDN-->
    </head> 
    <body>

        <div class="container">
            <header>
                <nav class="navbar navbar-default navbar-static-top" role="navigation">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="./index.php">                     
                                <img id="logo" src="../../Content/uploads/images/logo.jpg" alt="gotorecipes" /></a>
                        </div><!-- end of "navbar-header-->

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">                                    
                                <li><a href="../Admin/register.php">Register</a></li>
                                <li><a href="../Admin/login_index.php">Login</a></li>                                
                            </ul>
                        </div><!-- /.navbar-collapse -->

                        <ul class="nav navbar-nav">
                            <li class="active"><a href="../../index.php">Home<span class="sr-only">(current)</span></a></li>
                            <li><a href="#">About Us</a></li>

                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Recipes<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="ddl_link" href="../Public/Recipes/recipes.php">Recipes</a></li>
                                    <li><a class="ddl_link" href="../Public/Toprecipes//toprecipes.php">Today Recipes</a></li>
                                </ul></li>
                            <li><a href="../Public/ImageGallery/imagegallery.php">Gallery</a></li>
                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Events<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="ddl_link" href="../Public/Events/events.php">Events List</a></li>
                                    <li><a class="ddl_link" href="../Public/Volunteer/index.php">Volunteer Sign Up</a></li>
                                </ul></li>
                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Contact<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="ddl_link" href="../Public/ContactUs/contactus_form.php">Contact Us</a></li>
                                    <li><a class="ddl_link" href="../Public/Sitemap/sitemap.php">Sitemap</a></li>
                                </ul></li>                                       
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

