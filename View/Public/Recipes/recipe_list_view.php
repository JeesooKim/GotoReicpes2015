<?php   

#File name: recipe_list_view.php
#File for Recipes-Public(2/2)
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim
#Created :March 31, 2015
#Modified: 
#Reference: Class material -PDO Class
#this file is to show the list of (categorized) recipes according to the category selected
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
       
 <?php
                                    if(isset($_POST['flag'])){
                                        $dish_id = $_POST['dish_id'];
                                        $vote_up = $_POST['vote_up'];
                                        
                                        //$votes = new RecipeDB($dish_id, $vote_up);
                                        RecipeDB::plusVote($dish_id, $vote_up);
                                    }
                                
                                
                                    ?>
 
<div id="main">
    <ol class="breadcrumb">
        <li><a href="<?php echo SERVERROOT; ?>/index.php">Home</a></li>
        <li class="active">Recipes</li>
        <li class="active"><?php echo $current_category->getCatName(); ?></li>        
        <!--  $current_category = CategoryDB::getCategory($category_id);  from index.php -->
    </ol>
    <br/>
    
    
    <div id="sidebar">        
        <!--a href="<?php //echo PATH_ADMIN_RECIPES;?>/index.php">Recipes Admin(temporary)</a>
        <br/><br/-->
        
        <!-- form to select category ;dropdown list-->
<form action='recipes.php' method='GET' >
        <input type='hidden' name='action' value='list_view_recipes'/>
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
    </div> <!-- end of #sidebar -->
  
<!-- The container for the list of example recipes -->

<!-- The following is stylesheet and javascript for Recipes -->
<!-- <script type="text/javascript" src="jquery-1.11.1.min.js"></script>-->
<!--script type="text/javascript" src="<?php //echo PATH_JS; ?>/recipe-jquery.js"></script>
<link rel="stylesheet" href="<?php //echo PATH_CSS; ?>/recipe-jquery.css" /-->

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <!--link rel="stylesheet" href="/resources/demos/style.css"-->
    <script>
    $(function() {
    $( "#accordion" ).accordion();
    });
    </script>


 <!-- End  Style and JavaScripts for Recipes-->
 
 <div id="accordion">
<!--<div class="recipeContainer">
                 <div class="panelContainer">-->
                   <?php foreach ($recipes as $recipe) : ?>
                            <h3> <!-- Name of recipes-->
                                   <?php
                                             $rec = $recipe -> getRecipeName();
                                             echo $rec . "<br/>";
                                   ?>
                            </h3> 
<div>
    <p>
<!--        <p class="contentBox">-->
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
                                   <br/>
                                   <hr/>
                            <form action="recipes.php" method="POST">
                                <input type="hidden" name="dish_id" value="<?php echo $recipe->getRecipeID(); ?>"/>
                                <input type="hidden" name="vote_up" value="<?php echo $recipe-> getVotes(); ?>"/>
                                <input type="hidden" name="flag" value="1234"/>
                                   Recommend?
                                   <input type="submit" name="votes" value="Yes" />
                                   <?php echo $recipe-> getVotes(); ?>
                            </form>
                            <!--</p>-->       
    </p>
</div>
                            
                    <?php endforeach; ?>   
                 <!--/div><!-- end of .panelContainer -->                
 <!--/div> <!--  end of .recipeContainer        -->
   
</div> <!-- end #main -->
<!-- END of FILE recipe_list_view-->
<!-- START of footer include in recipe_list_view-->
<?php include PATH_FOOTER; ?>
 