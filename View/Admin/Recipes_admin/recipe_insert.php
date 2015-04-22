<?php  include '../../Shared/header-admin.php';  ?> 
<?php
#File name: recipe_insert.php
#File for Recipes-Admin
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim @Humber College 2015
#Created :March 31, 2015
#Modified: 
#Reference: Class material -PDO Class

?>
<div id='sidebar'>   
        <?php include PATH_VIEW_SHARED . '/side-menu.php';  ?>
</div> <!-- end of #sidebar -->   
    
<div id="main">
    
    <ol class="breadcrumb">
        <li><a href="<?php echo PATH_VIEW_ADMIN; ?>/index.php">Admin Panel</a></li>
        <li class="active"><a href="<?php echo PATH_ADMIN_RECIPES; ?>/index.php">Recipes</a></li>
        <li class="active">Insert Recipe</li>        
        <!--  $current_category = CategoryDB::getCategory($category_id);  from index.php -->
    </ol>
     
    <?php
        if(isset($_GET['err'])){
            echo $_GET['err'];
        }
    ?>
    <br/>
    <h2><b>* Required</b></h2>
    <br/>
     <form action="index.php" method="POST" >         
          <table>                
                <tr>
                    <td><label>Category *:</label></td>
                    <td> 
                        <!--$categories = CategoryDB::getCategories();-->
                        <select name="category_id">
                            <option value="" Selected>== Choose Category ==</option>
                            <?php foreach ($categories as $category) : ?>                            
                            <option value="<?php echo $category->getCatID(); ?>"><?php echo $category->getCatName(); ?>                              
                            </option>
                        <?php endforeach; ?>
                </select>
                    </td>
                   
                </tr>
                
                
                <tr>
                    <td><label>Name *:</label></td>
                    <td> <input type="text" name="recipe_name" Required/></td>
                </tr>
                <tr>
                    <td><label>Key Ingredient *:</label></td>
                    <td><input type="text" name="recipe_key" Required/></td>
                </tr>
                <tr>
                    <td><label>Number of Serving:</label></td>
                    <td><input type="text" name="recipe_num_serving" /></td>
                </tr>
                <tr>
                    <td><label>Cooking Time:</label></td>
                    <td><input type="text" name="recipe_cook_time" /></td>
                </tr>
                <tr>
                    <td><label>Ingredients *:</label></td>
                    <td><textarea name="recipe_ingredients" Required></textarea></td>
                </tr>
                <tr>
                    <td><label>Steps *:</label></td>
                    <td><textarea name="recipe_steps" Required></textarea></td>
                </tr>
                
                
        </table>
        <br/><br/>
        <input type="submit" name="action" value="Insert Recipe" />  
        <br />
    </form>
    

</div>
<?php include '../../Shared/footer-admin.php'; ?>