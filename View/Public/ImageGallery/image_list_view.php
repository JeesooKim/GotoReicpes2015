    <?php   
#File name: image_list_view.php
#File for Image Gallery-Public
#Team Project: gotorecipes
#Author: Jeesoo Kim
#March 2015
#Reference: Class material -PDO Class

?>

<!-- END of 'header include' in image_list_view-->
<!--  File:image_list_view : START here-->
<!-- 
    $current_category = CategoryDB::getCategory($category_id);
    $categories = CategoryDB::getCategories();
    $images = ImageGalleryDB::GetImagesByCategory($category_id);
 -->
 
<div id="main">
     <ol class="breadcrumb">
        <li><a href="<?php echo SERVERROOT; ?>/index.php">Home</a></li>
        <li class="active">Image Gallery</li>
        <li class="active"><?php echo $current_category->getCatName(); ?></li>        
        <!--  $current_category = CategoryDB::getCategory($category_id);  from index.php -->
    </ol>
    <br/>
    
    <div id="sidebar">        
        <!--a href="<?php //echo PATH_ADMIN_IMAGEGALLERY. '/index.php'; ?>"> Image Gallery Admin(temporary)</a-->
        <!-- dropdown -->
        <form action='imagegallery.php' method='GET' >
        <input type='hidden' name='action' value='list_view_images'/>
        Category: 
        <select name='category_id'>
            <option value='0'><?php echo $current_category->getCatName(); ?></option>
            <!--  $current_category = CategoryDB::getCategory($category_id);  from index.php -->
            <?php foreach ($categories as $category) : ?>
                <option value='<?php echo $category->getCatID(); ?>'><?php echo $category->getCatName(); ?></option>
           <?php endforeach; ?>
        </select>
        <input type='submit' value='Go' />
    </form>        
        
          <br/>
<!-- The container for the list of example images -->
<div id="links">    
                <?php 
                     foreach ($images as $image) : 
                         
                         $img_ref= PATH_IMAGES. '/'. $current_category->getCatName() .
                                   '/'. $image->getFilename();
                        $img_src = PATH_IMAGES. '/' . $current_category->getCatName() . 
                                 '/thumbnails/'.$image->getFilename();
                         
                  ?>                   
                    
                       <a href="<?php echo $img_ref; ?>" title ="<?php echo $image->getTitle(); ?>" >
                             <img src="<?php echo $img_src;  ?>" alt="<?php echo $image->getTitle(); ?>" title ="<?php echo $image->getTitle(); ?>"/>
                       </a>                          
                <?php endforeach; ?>            
        </div> <!--  end of #links         -->
    
    <br>
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
  
<!--script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script-->
<!-- Bootstrap JS is not required, but included for the responsive demo navigation and button states -->
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
<?php include PATH_FOOTER; ?> 
<!-- END of 'footer include' in image_list_view-->
