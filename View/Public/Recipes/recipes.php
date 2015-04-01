<?php  include "c:/xampp/htdocs/GotoReicpes2015/config.php";  ?>

<?php include PATH_HEADER;  ?>  
<!--end top-->

<?php
require_once( SITEROOT.PATH_DATABASE);   //SERVER ROOT is not working but SITEROOT is working ......why?
require_once( SITEROOT.PATH_MODEL_CATEGORY);
require_once( SITEROOT.PATH_MODEL_CATEGORY_DB);
require_once( SITEROOT.PATH_MODEL_RECIPE);
require_once( SITEROOT.PATH_MODEL_RECIPES_DB);

#File name: recipes.php
#File for Recipes-Public(1/2)
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim
#Created :March 31, 2015
#Modified: 
#Reference: Class material -PDO Class

//connect to db
//bring data here
//display the data

//For selected recipes....depending on category,    list of recipes will be rendered.
//get the recipes object,,,RECIPEDB::GetRecipes()

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_view_recipes';
}

if ($action == 'list_view_recipes') {
    if(!isset($_GET['category_id'])) {
        $category_id = 1;
    }else
    {
       $category_id = $_GET['category_id'];   
    }

    $current_category = CategoryDB::getCategory($category_id);
    $categories = CategoryDB::getCategories();
    $recipes =RecipeDB::GetRecipesByCategory($category_id);
    //recipes under a selected/current category

include('recipe_list_view.php');
}
?>
