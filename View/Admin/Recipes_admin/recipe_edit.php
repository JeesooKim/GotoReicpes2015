<?php  include PATH_HEADER;  ?>  
<!--end top-->
<?php
#File name: recipe_edit.php
#File for Recipes-Admin
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim
#Created : March 31,2015
#Modified: 
#Reference: Class material -PDO Class

?>

<div id="main">
    <p><a href="index.php?action=list_recipes">View Recipe List</a></p>
    <h1>Edit Recipe</h1>

     <form action="index.php" method="post" >      
         <input type="hidden" name="recipe_id" value="<?php echo $recipe->getRecipeID(); ?>" />
         
          <table>                
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
                    <td><label>Name:</label></td>
                    <td> <input type="text" name="recipe_name"  value="<?php echo $recipe->getRecipeName();  ?>"/></td>
                </tr>
                <tr>
                    <td><label>Key Ingredient:</label></td>
                    <td><input type="text" name="recipe_name" value="<?php echo $recipe->getRecipeKeyIngredient(); ?>" /></td>
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
                    <td><textarea name="recipe_ingredients" value="<?php echo $recipe->getRecipeIngredients(); ?>"></textarea></td>
                </tr>
                <tr>
                    <td><label>Steps:</label></td>
                    <td><textarea name="recipe_steps" value="<?php echo $recipe->getRecipeSteps(); ?>"></textarea></td>
                </tr>
                
        </table>
        <label>&nbsp;</label>
        <input type="submit" name="action" value="Edit_Recipe" />  
        <br />
    </form>
</div> <!-- end of #main-->

<?php include PATH_FOOTER; ?>