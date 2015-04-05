<?php include PATH_HEADER_ADMIN;    ?>
<?php

#File name: image_edit.php
#File for Image Gallery-Admin
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim
#Created : March 23,2015
#Modified: March 25, 2015
#Reference: Class material -PDO Class

?>

<div id="main">
    <p><a href="index.php?action=list_images">View Image List</a></p>
    <h1>Edit Image</h1>

     <form action="index.php" method="post" enctype="multipart/form-data">      
         <input type="hidden" name="image_id" value="<?php echo $image->getID(); ?>" />
         
          <table class="table table-responsive table-bordered">                
                <tr>
                    <td><label>Category:</label></td>
                    <td> 
                        <!--$categories = CategoryDB::getCategories();-->
                        <select name="category_id">
                            <?php foreach ($categories as $category) : ?>
                            <option value="<?php echo $category->getCatID(); ?>"><?php echo $category->getCatName(); ?>                              
                            </option>
                        <?php endforeach; ?>
                </select>
                    </td>
                </tr>
                
                <tr>
                    <td><label>Edit Image File: </label></td>
                    <td><input type="file" name="file_upload" value=""/></td>
                </tr>
                <tr><td><label>Edit File Name:</label></td>
                    <td><input type="text" name="img_filename" value="<?php echo$image->getFileName(); ?>"/></td>
                </tr>
                <tr>
                    <td><label>Title:</label></td>
                    <td> <input type="text" name="img_title"  value="<?php echo $image->getTitle();  ?>"/></td>
                </tr>
                <tr>
                    <td><label>Key Ingredient:</label></td>
                    <td><input type="text" name="img_key" value="<?php echo $image->getKeyIngredient(); ?>" /></td>
                </tr>
                <tr>
                    <td><label>Description:</label></td>
                    <td><input type="text" name="img_detail" value="<?php echo $image->getDetail(); ?>" /></td>
                </tr>
                <tr>
                    <td><label>Author:</label></td>
                    <td><input type="text" name="img_author" value="<?php echo $image->getAuthor(); ?>"/></td>
                </tr>
                <tr>
                    <td><label>Source:</label></td>
                    <td><input type="text" name="img_source" value="<?php echo $image->getSource(); ?>" /></td>
                </tr>
                
        </table>
        <label>&nbsp;</label>
        <input type="submit" name="action" value="Edit_Image" />  
        <br />
    </form>
</div> <!-- end of #main-->

<?php include PATH_FOOTER_ADMIN;    ?>