<?php   

#File name: recipe_list_view.php
#File for Recipes-Public(2/2)
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim
#Created :March 31, 2015
#Modified: 
#Reference: Class material -PDO Class
#this file is to show the list of (cateforized) recipes according to the category selected
#category: breakfast, lunch, dinner, pastry, and beverages
?>
<!-- END of 'header include' in recipe_list_view-->
<!--  File: recipe_list_view : START here-->
<!-- 
the following variables are declared in recipes.php because this file will be included in that file.
so, the following variables are already defined when they are called
    $current_category = CategoryDB::getCategory($category_id);
    $categories = CategoryDB::getCategories();
    $recipes = RrecipeDB::GetRecipesByCategory($category_id);
 -->
       
<div id="main">
    <div id="sidebar">
        
        <a href="<?php echo PATH_ADMIN_RECIPES;?>/index.php">Recipes Admin(temporary)</a>
        <br/>
<!--        <h1>Categories</h1>-->
        <ul class="nav">
            <!-- display links for all categories -->
            <?php foreach($categories as $category) : ?>
                <li>
                    <a href="?category_id=<?php echo $category->getCatID(); ?>">
                        <?php echo $category->getCatName(); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div> <!-- end of #sidebar -->
  
<!-- The container for the list of example recipes -->

<!-- The following is stylesheet and javascript for Recipes -->
<!-- <script type="text/javascript" src="jquery-1.11.1.min.js"></script>-->
<script type="text/javascript" src="<?php echo PATH_JS; ?>/recipe-jquery.js"></script>
<link rel="stylesheet" href="<?php echo PATH_CSS; ?>/recipe-jquery.css" />	
 <!-- End  Style and JavaScripts for Recipes-->
 
<div class="recipeContainer">
    <h1> <?php echo $current_category->getCatName() ; ?></h1>
                             
                 <div class="panelContainer">
                   <?php foreach ($recipes as $recipe) : ?>
                            <h2> <!-- Name of recipes-->
                                   <?php
                                             $rec = $recipe -> getRecipeName();
                                             echo $rec . "<br/>";
                                   ?>
                            </h2> 
                            <p class="contentBox">
                                <!-- displays the content of the recipes: 
                                    Key Ingredient, Number Serving, Cooking TIme, Ingredients, and Steps-->
                                   Key Ingredient : 
                                          <?php echo $recipe->getRecipeKeyIngredient();  ?>
                                   <br />
                                   Number of Servings:
                                          <?php echo $recipe-> getRecipeNumServing(); ?>
                                   <br/>
                                   Cooking Time:
                                         <?php echo $recipe-> getRecipeCookTime(); ?>
                                   <br/>
                                   Ingredients:
                                          <?php echo $recipe-> getRecipeIngredients(); ?>
                                   <br/>
                                   Steps:
                                          <?php echo $recipe-> getRecipeSteps(); ?>                   
                            </p>
                    <?php endforeach; ?>   
                 </div><!-- end of .panelContainer -->
                
 </div> <!--  end of .recipeContainer        -->
   
</div> <!-- end #main -->
<!-- END of FILE recipe_list_view-->
<!-- START of footer include in recipe_list_view-->
<?php include PATH_FOOTER; ?>
 