<?php include '../../Shared/header.php';

#File name: image_list.php
#File for Image Gallery-Admin
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim
#Created :March 16, 2015
#Modified: March 25,2015
#Reference: Class material -PDO Class

?>

<div id="main">
    <p><a href="?action=show_upload_form">Upload Image</a></p>
    <h1>Image List</h1>
    <div id="sidebar">
        <!-- display a list of categories -->
        <h2>Categories :  <?php echo $current_category->getCatName(); ?></h2>
        <!--  $current_category = CategoryDB::getCategory($category_id);  from index.php -->
        <br/>
        
        <ul class="nav">
            <?php foreach ($categories as $category) : ?>
                <!-- $categories : an object of Category class from $categories = CategoryDB::getCategories();  of index.php-->
                <li>
                    <a href="?category_id=<?php echo $category->getCatID(); ?>">  <!-- get category's id -->
                        <?php echo $category->getCatName(); ?>    <!-- get category's name -->
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <br />        
    </div> <!-- end of #sidebar -->

    <div id="content">
        <!-- display a table of products -->
   
        <table class="table table-responsive table-bordered"    width="900">
            <thead bgcolor="#a8cb81" >                
                <tr style="font-variant:small-caps;font-style:normal;color:black;font-size:18px;">
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
        
    </div><!-- end of #content -->
</div><!-- end of #main -->
<?php include '../../Shared/footer.php'; ?>