<?php include '../../Shared/header-admin.php';    ?>
<?php
#File name: image_list.php
#File for Image Gallery-Admin
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim
#Created :March 16, 2015
#Modified: March 25,2015
#Reference: Class material -PDO Class

?>
<div id="sidebar">
        
        <?php include PATH_VIEW_SHARED . '/side-menu.php';  ?>
    </div> <!-- end of #sidebar -->         
<div id="main">
    <ol class="breadcrumb">
        <li><a href="<?php echo PATH_VIEW_ADMIN; ?>/index.php">Admin Panel</a></li>
        <li class="active"><a href="<?php echo PATH_ADMIN_IMAGEGALLERY; ?>/index.php">Image Gallery</a></li>  
        <li class="active">Current Category :  <?php echo $current_category->getCatName(); ?></li>      
    </ol>
    
    <p><a href="?action=show_upload_form">Upload Image</a></p>
    <hr/>
    <!-- dropdown category-->
    <form action='.' method='GET' >
        <input type='hidden' name='action' value='list_images'/>
        Category: 
        <select name='category_id'>
            <!--option value='0'><?php //echo $current_category->getCatName(); ?></option>
            <  $current_category = CategoryDB::getCategory($category_id);  from index.php -->
            <?php foreach ($categories as $category) : ?>
                <option value='<?php echo $category->getCatID(); ?>'><?php echo $category->getCatName(); ?></option>
           <?php endforeach; ?>
        </select>
        <input type='submit' value='Go' />
    </form>   
    
<br/>


    <script>
        $(document).ready( function () { 
            $('#imageGalleryTB').DataTable(
                    {
                        "pageLength": 5
                        
                    });}
                );
            </script>
    <!--div id="content">
        <!-- display a table of products -->
   
        <table id="imageGalleryTB" class="display"><!--class="table table-responsive table-bordered"    width="900"-->
            <thead bgcolor="#a8cb81" >                
                <tr style="font-variant:small-caps;font-style:normal;color:black;font-size:18px;">
                    <th>Img</th>
                    <th>Title</th>
                    <th>Key Ingredient</th>
                    <th>Description</th>
                    <th>Author</th>
                    <th>Source</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($images as $image) : ?>
                <!-- $images = ImageGalleryDB::getImagesByCategory($category_id); from index.php -->
                        <tr>
                            <td><a href="<?php echo PATH_IMAGES . "/" . $current_category->getCatName() . "/" . $image->getFileName();?>"><img src="<?php echo PATH_IMAGES . "/" . $current_category->getCatName() . "/thumbnails/" . $image->getFileName();?>" alt="<?php echo $image->getTitle();?>" title="<?php echo $image->getTitle();?>"/></a></td>
                            <td><?php echo $image->getTitle(); ?></td>
                            <td><?php echo $image->getKeyIngredient(); ?></td>
                            <td><?php echo $image->getDetail(); ?></td>
                            <td><?php echo $image->getAuthor(); ?></td>
                            <td><?php echo $image->getSource(); ?></td>
                            <td><form action="." method="post" id="edit_image_form">
                                            <input type="hidden" name="action" value="show_edit_form" />
                                            <input type="hidden" name="image_id" value="<?php echo $image->getID(); ?>" />
                                            <input type="hidden" name="category_id" value="<?php echo $current_category->getCatID(); ?>" />
                                            <input type="submit" value="Edit" />
                                    </form></td>
                            <td><form action="." method="post" id="delete_image_form">
                                            <input type="hidden" name="action" value="delete_image" />
                                            <input type="hidden" name="image_id" value="<?php echo $image->getID(); ?>" />
                                            <input type="hidden" name="category_id" value="<?php echo $current_category->getCatID(); ?>" />
                                            <input type="submit" value="Delete" onclick="return confirm('Are you sure to delete?')"/>
                                    </form></td>
                        </tr>     
                <?php endforeach; ?>
                        
        </tbody>                
        </table>        
        
    <!--/div><!-- end of #content -->
</div><!-- end of #main -->
<?php include '../../Shared/footer-admin.php'; ?>