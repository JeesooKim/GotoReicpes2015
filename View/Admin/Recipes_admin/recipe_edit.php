<?php  include '../../Shared/_Layout/header-admin.php';  ?>  

<?php
#File name: recipe_edit.php
#File for Recipes-Admin
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim
#Created : March 31,2015
#Modified: 
#Reference: Class material -PDO Class

?>
 <div id='sidebar'>   
        <?php include '../../Shared/_Layout/side-menu.php';  ?>
    </div><!-- end of #sidebar -->
    
<div id="main">
    <ol class="breadcrumb">
        <li><a href="../index.php">Admin Panel</a></li>
        <li class="active"><a href="../Recipes_admin/index.php">Recipes</a></li>
        <li class="active">Edit Recipe</li>        
        <!--  $current_category = CategoryDB::getCategory($category_id);  from index.php -->
    </ol>
    <?php
        if(isset($_GET['err'])){
            echo $_GET['err'];
        }
    ?>
    <br/>
   <a href="?action=show_insert_form">Insert a New Recipe</a> &nbsp;|&nbsp;   
   <a href="index.php?action=list_recipes">View Recipes List</a>
    <hr/>
    
    <form action="index.php" method="post" >      
         <input type="hidden" name="recipe_id" value="<?php echo $recipe->getRecipeID(); ?>" />
         
          <table>                
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
                    <td><label>Name:</label></td>
                    <td> <input type="text" name="recipe_name"  value="<?php echo $recipe->getRecipeName();  ?>" Required/></td>
                </tr>
                <tr>
                    <td><label>Key Ingredient:</label></td>
                    <td><input type="text" name="recipe_key" value="<?php echo $recipe->getRecipeKeyIngredient(); ?>" Required/></td>
                </tr>
                <tr>
                    <td><label>Number of Serving:</label></td>
                    <td><input type="text" name="recipe_num_serving" value="<?php echo $recipe->getRecipeNumServing(); ?>" /></td>
                </tr>
                <tr>
                    <td><label>Cooking Time:</label></td>
                    <td><input type="text" name="recipe_cook_time" value="<?php echo $recipe->getRecipeCookTime(); ?>"/></td>
                </tr>
                <tr>
                    <td><label>Ingredients:</label></td>
                    <td><textarea name="recipe_ingredients" Required><?php echo $recipe->getRecipeIngredients(); ?></textarea></td>
                </tr>
                <tr>
                    <td><label>Steps:</label></td>
                    <td><textarea name="recipe_steps" Required><?php echo $recipe->getRecipeSteps(); ?></textarea></td>
                </tr>
                
        </table>
        <br/><br/>
        <input type="submit" name="action" value="Edit Recipe" />  
        <br />
    </form>
</div> <!-- end of #main-->
<?php include '../../Shared/_Layout/footer-admin.php'; ?>