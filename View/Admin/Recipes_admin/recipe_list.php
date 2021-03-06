<?php include '../../Shared/_Layout/header-admin.php'; ?>  
<?php
#File name: recipe_list.php
#File for Recipes-Admin
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim
#Created :March  31, 2015
#Modified: 
#Reference: Class material -PDO Class
?>

<script>
    $(document).ready(function () {
        $('#recipeTB').DataTable();
    }
    );
</script>

<div id='sidebar'>   
    <?php include '../../Shared/_Layout/side-menu.php'; ?>
</div><!-- end of #sidebar -->

<div id="main">

    <ol class="breadcrumb">
        <li><a href="../index.php">Admin Panel</a></li>
        <li class="active"><a href="../Recipes_admin/index.php">Recipes</a></li>
        <li class="active">Current Category :  <?php echo $current_category->getCatName(); ?></li>        
        <!--  $current_category = CategoryDB::getCategory($category_id);  from index.php -->
    </ol>

    <a href="?action=show_insert_form">Insert a New Recipe</a>      
    <hr/>
    <!-- dropdown category -->
    <form action='.' method='GET' >
        <input type='hidden' name='action' value='list_recipes'/>
        Category: 
        <select name='category_id'>
            <option value='0'><?php echo $current_category->getCatName(); ?></option>
            <!--  $current_category = CategoryDB::getCategory($category_id);  from index.php -->
            <?php foreach ($categories as $category) : ?>
                <option value='<?php echo $category->getCatID(); ?>'><?php echo $category->getCatName(); ?></option>
            <?php endforeach; ?>
        </select>
        <input type='submit' value='Go' />
    </form>        

    <br/>  

    <!--div id="content">
    <!-- display a table of products -->
    <table id="recipeTB" class="display">   
        <!-- table id="recipe_insert_table"    width="900" -->
        <thead bgcolor="#a8cb81" >                
            <tr style="font-variant:small-caps;font-style:normal;color:black;font-size:18px;">
                <th>Name</th>
                <th>Key Ingredient</th>
                <th>Number of Serving</th>
                <th>Cooking Time</th>
                <th>Ingredients</th>
                <th>Steps</th>
                <th>Votes</th>
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
                    <td><?php echo $recipe->getVotes(); ?></td>
                    <td>
                        <form action="." method="post" id="edit_recipe_form">
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

    <!--/div><!-- end of #content -->
</div><!-- end of #main -->
<?php include '../../Shared/_Layout/footer-admin.php'; ?>