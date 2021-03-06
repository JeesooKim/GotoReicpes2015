<?php include '../../Shared/_Layout/header-admin.php';    ?>
<?php

#File name: image_edit.php
#File for Image Gallery-Admin
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim
#Created : March 23,2015
#Modified: March 25, 2015
#Reference: Class material -PDO Class

?>
 <div id='sidebar'>   
        <?php include '../../Shared/_Layout/side-menu.php';  ?>
    </div> <!-- end of #sidebar -->
<div id="main">
     <ol class="breadcrumb">
        <li><a href="../index.php">Admin Panel</a></li>
        <li class="active"><a href="../Imagegallery_admin/index.php">Image Gallery</a></li>  
        <li class="active">Edit Image</li>        
    </ol>
    <?php
        if(isset($_GET['err'])){
            echo $_GET['err'];
        }
    ?>
        
    <a href="index.php?action=list_images">View Image List</a>
    <hr/>    

     <form action="index.php" method="post" enctype="multipart/form-data">      
         <input type="hidden" name="image_id" value="<?php echo $image->getID(); ?>" />
         
          <table class="table table-responsive table-bordered">                
                <tr>
                    <td><label>Category:</label></td>
                    <td> 
                        <!--$categories = CategoryDB::getCategories();-->
                        <select name="category_id">
                            <option value="<?php echo $category_id; ?>" selected><?php echo $category_name; ?>                              
                            </option>
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
                    <td><input type="text" name="img_source" value="<?php echo $image->getSource(); ?>" placeholder="http://" /></td>
                </tr>
                
        </table>
        <br/><br/>
        <input type="submit" name="action" value="Edit_Image" />  
        <br />
    </form>
</div> <!-- end of #main-->

<?php include '../../Shared/_Layout/footer-admin.php'; ?>