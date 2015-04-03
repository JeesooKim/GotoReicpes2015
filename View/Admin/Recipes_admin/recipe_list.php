<?php  include SITEROOT.PATH_HEADER;  ?>  
<!--end top-->
<?php
#File name: recipe_list.php
#File for Recipes-Admin
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim
#Created :March  31, 2015
#Modified: 
#Reference: Class material -PDO Class
?>

<div id="main">
    <p><a href="?action=show_insert_form">Insert a New Recipe</a></p>
    <h1>Recipe List</h1>
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
   
        <table id="recipe_insert_table"    width="900">
            <thead bgcolor="#a8cb81" >                
                <tr style="font-variant:small-caps;font-style:normal;color:black;font-size:18px;">
                    <th>Name</th>
                    <th>Key Ingredient</th>
                    <th>Number of Serving</th>
                    <th>Cooking Time</th>
                    <th>Ingredients</th>
                    <th>Steps</th>                        
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recipes as $recipe) : ?>
                <!-- $recipes = RecipeDB::getRecipesByCategory($category_id); from index.php -->
                        <tr>
                            <td><?php echo $recipe->getRecipeName(); ?></td>
                            <td><?php echo $recipe->getRecipeKeyIngredient(); ?></td>
                            <td><?php echo $recipe->getRecipeNumServing(); ?></td>
                            <td><?php echo $recipe->getRecipeCookTime(); ?></td>
                            <td><?php echo $recipe->getRecipeIngredients(); ?></td>
                            <td><?php echo $recipe->getRecipeSteps(); ?></td>
                            <td><form action="." method="post" id="edit_recipe_form">
                                            <input type="hidden" name="action" value="show_edit_form" />
                                            <input type="hidden" name="recipe_id" value="<?php echo $recipe->getRecipeID(); ?>" />
                                            <input type="hidden" name="category_id" value="<?php echo $current_category->getCatID(); ?>" />
                                            <input type="submit" value="Edit" />
                                    </form></td>
                            <td><form action="." method="post" id="delete_recipe_form">
                                            <input type="hidden" name="action" value="delete_recipe" />
                                            <input type="hidden" name="recipe_id" value="<?php echo $recipe->getRecipeID(); ?>" />
                                            <input type="hidden" name="category_id" value="<?php echo $current_category->getCatID(); ?>" />
                                            <input type="submit" value="Delete" onclick="return confirm('Are you sure to delete?')"/>
                                    </form></td>
                        </tr>     
                <?php endforeach; ?>
                        
        </tbody>                
        </table>        
        
    </div><!-- end of #content -->
</div><!-- end of #main -->
<?php include SITEROOT.PATH_FOOTER; ?>