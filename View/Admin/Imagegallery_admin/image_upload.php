<?php include '../../Shared/_Layout/header-admin.php';    ?>

<?php
#File name: image_upload.php
#File for Image Gallery-Admin
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim @Humber College 2015
#Created :March 16, 2015
#Modified: March 25,2015
#Reference: Class material -PDO Class
?>
 <div id="sidebar">        
        <?php include '../../Shared/_Layout/side-menu.php';  ?>
 </div> <!-- end of #sidebar -->            
    
   
<div id="main">
    <ol class="breadcrumb">
        <li><a href="../index.php">Admin Panel</a></li>
        <li class="active"><a href="../Imagegallery_admin/index.php">Image Gallery</a></li>  
        <li class="active">Upload Image</li>        
        <!--  $current_category = CategoryDB::getCategory($category_id);  from index.php -->
    </ol>
    
     <form action="index.php" method="post" enctype="multipart/form-data">         
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
                    <td><label>Upload Image File: </label></td>
                    <td><input type="file" name="file_upload" /></td>
                </tr>
                <tr>
                    <td><label>Title:</label></td>
                    <td> <input type="text" name="img_title" /></td>
                </tr>
                <tr>
                    <td><label>Key Ingredient:</label></td>
                    <td><input type="text" name="img_key" /></td>
                </tr>
                <tr>
                    <td><label>Description:</label></td>
                    <td><input type="text" name="img_detail" /></td>
                </tr>
                <tr>
                    <td><label>Author:</label></td>
                    <td><input type="text" name="img_author" /></td>
                </tr>
                <tr>
                    <td><label>Source:</label></td>
                    <td><input type="text" name="img_source" placeholder="http://" /></td>
                </tr>
                
        </table>
        <label>&nbsp;</label>
        <input type="submit" name="action" value="Upload Image" />  
        <br />
    </form>
    

</div>
<?php include '../../Shared/_Layout/footer-admin.php'; ?>