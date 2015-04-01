<?php  include PATH_HEADER;  ?>  
<!--end top-->
<?php
#File name: recipe_insert.php
#File for Recipes-Admin
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim @Humber College 2015
#Created :March 31, 2015
#Modified: 
#Reference: Class material -PDO Class

?>

<div id="main">
    <p><a href="index.php?action=list_recipes">View Recipe List</a></p>
    <h1>Insert Recipe</h1>

     <form action="index.php" method="post" >         
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
                    <td> <input type="text" name="recipe_name" /></td>
                </tr>
                <tr>
                    <td><label>Key Ingredient:</label></td>
                    <td><input type="text" name="recipe_key" /></td>
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
                    <td><label>Ingredients:</label></td>
                    <td><textarea name="recipe_ingredients" ></textarea></td>
                </tr>
                <tr>
                    <td><label>Steps:</label></td>
                    <td><textarea name="recipe_steps" ></textarea></td>
                </tr>
                
                
        </table>
        <label>&nbsp;</label>
        <input type="submit" name="action" value="Insert Recipe" />  
        <br />
    </form>
    

</div>
<?php include PATH_FOOTER; ?>