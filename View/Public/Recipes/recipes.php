<?php
require_once('../../../Model/database.php');   
require_once('../../../Model/category.php');
require_once('../../../Model/category_db.php');
require_once('../../../Model/recipe.php');
require_once('../../../Model/recipes_db.php');

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
include "../../../View/Shared/_Layout/header.php";

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
