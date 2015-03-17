<!--?php include '../../Shared/header.php'; ?-->

<!DOCTYPE HTML>
<!--
/*
 * Bootstrap Image Gallery Demo 3.0.1
 * https://github.com/blueimp/Bootstrap-Image-Gallery
 *
 * Copyright 2013, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */
-->
<html lang="en">
<head>
        <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
        <meta charset="utf-8">
        <title>Image Gallery @ gotorecipes</title>
        <meta name="description" content="Bootstrap Image Gallery is an extension to blueimp Gallery, a touch-enabled, responsive and customizable image and video gallery. It displays images and videos in the modal dialog of the Bootstrap framework, features swipe, mouse and keyboard navigation, transition effects, fullscreen support and on-demand content loading and can be extended to display additional content types.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
        <link rel="stylesheet" href="css/bootstrap-image-gallery.css">        
</head>
    
    <!-- the body section -->
 <body>   
    <div class="container">  
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
                                            <a class="navbar-brand" href="#"><img id="logo" src="../../../Content/uploads/images/logo.jpg" alt="gotorecipes" /></a>
                                    </div><!-- end of "navbar-header-->

                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                            <ul class="nav navbar-nav navbar-right">
                                            <li><a href="../../Admin/register.php">Register</a></li>
                                            <li><a href="../../Admin/login.php">Login</a></li>
                                            </ul>
                                    </div><!-- /.navbar-collapse -->
                                            <ul class="nav navbar-nav">
                                            <li class="active"><a href="#">Home<span class="sr-only">(current)</span></a></li>
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Recipes <span class="caret"></span></a>
                                                    <ul class="dropdown-menu" role="menu">
                                                            <li><a class="ddl_link" href="#">Top Recipes</a></li>
                                                            <li><a class="ddl_link" href="#">Newest Recipes</a></li>
                                                            <li class="divider"></li>
                                                            <li><a class="ddl_link" href="#">Appetizers</a></li>
                                                            <li><a class="ddl_link" href="#">Quick Meals</a></li>
                                                            <li><a class="ddl_link" href="#">Breakfast</a></li>
                                                            <li><a class="ddl_link" href="#">Lunch</a></li>
                                                            <li><a class="ddl_link" href="#">Dinner</a></li>
                                                    </ul>
                                            </li>
                                            <li><a href="imagegallery.php">Gallery</a></li>
                                            <li><a href="#">Events</a></li>
                                            <li><a href="#">Contact Us</a></li>
                                            </ul>
                            </div><!-- /.container-fluid -->
                                    <form class="navbar-form navbar-right" role="search">
                                            <div class="form-group">
                                                    <input type="text" class="form-control" type="search" placeholder="Search">
                                            </div>
                                            <button type="submit" class="btn btn-default">Submit</button>
                                    </form>
                    </nav>
                    <!--end top_nav-->
            </header>
            <!--end top-->  
            
<!-- END of 'header include' in image_list_view-->
<!--  File:image_list_view : START here-->
<!-- 
    $current_category = CategoryDB::getCategory($category_id);
    $categories = CategoryDB::getCategories();
    $images = ImageGalleryDB::GetImagesByCategory($category_id);
 -->
<div id="main">
    <div id="sidebar">
<!--        <h1>Categories</h1>-->
        <ul class="nav">
            <!-- display links for all categories -->
            <?php foreach($categories as $category) : ?>
                <li>
                    <a href="?category_id=<?php echo $category->getCatID(); ?>">
                        <?php echo $category->getCatName(); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div> <!-- end of #sidebar -->
    
    
    <!--    <div id="content">-->
       <h1><?php echo $current_category->getCatName(); ?></h1>
    


<!-- The container for the list of example images -->
<div id="links">    
                <?php 
                     foreach ($images as $image) : 
                         
                         $img_ref= '../../../content/uploads/images/'. $current_category->getCatName() .
                                   '/'. $image->getFilename();
                        $img_src = '../../../content/uploads/images/'. $current_category->getCatName() . 
                                 '/thumbnails/'.$image->getFilename();
                         
                  ?>                   
                    
                       <a href="<?php echo $img_ref; ?>" title ="<?php $image->getTitle(); ?>" >
                             <img src="<?php echo $img_src;  ?>" alt="<?php $image->getTitle(); ?>"/>
                       </a>                          
                <?php endforeach; ?>            
        </div> <!--  end of #links         -->
    
    <br>
</div>

<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body 
                https://github.com/blueimp/Gallery/blob/master/README.md#description -->
                    <div id="blueimp-gallery" class="blueimp-gallery">
                        <!-- The container for the modal slides -->
                        <div class="slides"></div>
                        <!-- Controls for the borderless lightbox -->
                        <h3 class="title"></h3>
                        <a class="prev">‹</a>
                        <a class="next">›</a>
                        <a class="close">×</a>
                        <a class="play-pause"></a>
                        <ol class="indicator"></ol>
                    </div> <!-- end for #blueimp-gallery -->      
             
                
<!--    </div>  end of #content -->
</div> <!-- end #main -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation and button states -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<!--<script src="//blueimp.github.io/Gallery/js/blueimp-gallery.min.js"></script>-->
<script src="js/bootstrap-image-gallery.js"></script>
<script>
document.getElementById('links').onclick = function (event) {
    event = event || window.event;
    var target = event.target || event.srcElement,
        link = target.src ? target.parentNode : target,
        options = {index: link, event: event},
        links = this.getElementsByTagName('a');
    blueimp.Gallery(links, options);
};
</script>
 
<!-- END of FILE image_list_view-->
<!-- START of footer include in image_list_view-->
<!--?php include '../../Shared/footer.php'; ?-->
 <footer class="footer navbar-fixed-bottom">
<!--			<div class="container">-->

                <div id="copyright">
                        <p>&copy; <?php echo date("Y"); ?> www.gotorecipes.com</p>	
                </div> <!-- end of copyright-->

                <nav id="footer_nav">
                        <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">FAQs</a></li>
                                <li><a href="#">Contact Us</a></li>
                        </ul>
                </nav>

                <nav id="media">
                        <ul>
                                <li><a href="#">Facebook</a></li>
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">Google +</a></li>
                        </ul>
                </nav>

                </div> <!-- end of container -->
   </footer> <!--end footer-->
</body>
</html>
<!-- END of 'footer include' in image_list_view-->
<!--PHP team project at Humber 2015
//ImageGallery-Public Page(2/2)
//Jeesoo Kim, March 16
-->