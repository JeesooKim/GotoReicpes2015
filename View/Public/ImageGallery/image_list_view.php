<?php   include ('../../Shared/header.php'); ?>
<?php  include ('../../Shared/side-menu.php'); ?>

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
    
    
    <!--    <div id="content">
       <h1><?php echo $current_category->getCatName(); ?></h1>
    
-->

<!-- The container for the list of example images -->
<div id="links">    
                <?php 
                     foreach ($images as $image) : 
                         
                         $img_ref= '../../../Content/uploads/images/'. $current_category->getCatName() .
                                   '/'. $image->getFilename();
                        $img_src = '../../../Content/uploads/images/'. $current_category->getCatName() . 
                                 '/thumbnails/'.$image->getFilename();
                         
                  ?>                   
                    
                       <a href="<?php echo $img_ref; ?>" title ="<?php echo $image->getTitle(); ?>" >
                             <img src="<?php echo $img_src;  ?>" alt="<?php echo $image->getTitle(); ?>"/>
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
<script src="../../Content/js/bootstrap-image-gallery.js"></script>
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
<?php include ('../../Shared/footer.php'); ?>
 
<!-- END of 'footer include' in image_list_view-->
<!--PHP team project at Humber 2015
//ImageGallery-Public Page(2/2)
//Jeesoo Kim, March 16
-->