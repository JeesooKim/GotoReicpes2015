<?php
require_once( '../../../Model/database.php');
require_once( '../../../Model/category.php');
require_once( '../../../Model/category_db.php');
require_once( '../../../Model/recipe.php');
require_once( '../../../Model/recipes_db.php');

#File name: index.php
#File for Recipes-Admin
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim @Humber College 2015
#Created: March 31 2015
#Modified: 
#Reference: Class material -PDO Class

error_reporting();
$error = '';

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_recipes';  //when this page is loaded for the first time, assign 'list_recipes' string to $action
}
//'action' is the name of the hidden type input under a form from 'recipe_insert.php' 

if ($action == 'list_recipes') { //when the page is loaded for the first time
// First thing to do is to get the category id
// 
    // Get the current category ID
    if(!isset($_GET['category_id'])) {
        $category_id = 1; //default category id=1 (when the category is not been set/selected
    }else
    {
       $category_id = $_GET['category_id'];   
    }
    // Get recipe and category data
    $current_category = CategoryDB::getCategory($category_id);   //Category object having name and id properties
    $categories = CategoryDB::getCategories();
    $recipes = RecipeDB::GetRecipesByCategory($category_id);

    // Display the list of recipes
    include('recipe_list.php');
    
} 
// -------------------< DELETE recipe >---------------------

else if ($action == 'delete_recipe') {
    // Get the IDs
    $recipe_id = $_POST['recipe_id'];
    $category_id = $_POST['category_id'];

    // Delete the recipe
    RecipeDB::deleteRecipe($recipe_id);

    // Display the Recipe List page for the current category
    header("Location: .?category_id=$category_id");
    
} 

//--------------------< EDIT recipe >----------------------
else if ($action == 'show_edit_form') {
    // this action is triggered by line 60 of recipe_list.php     
    // Get the IDs
    $recipe_id = $_POST['recipe_id'];     //gets the id of the selected recipe
    $category_id = $_POST['category_id']; //get the category of the selected recipe
    $current_category = CategoryDB::getCategory($category_id);   //Category object having name and id properties
    $category_name=$current_category->getCatName();
    
    $categories = CategoryDB::getCategories();
    $recipe=RecipeDB::GetRecipe($recipe_id);
  
    include('recipe_edit.php');
    
}else if($action=='Edit Recipe'){  
    
    $recipe_id = $_POST['recipe_id'];
    $category_id = $_POST['category_id'];   //Required
    
    //Category object having name and id properties
    //to get the name of the category
    $current_category = CategoryDB::getCategory($category_id);   
    $category_name=$current_category->getCatName();
    
    $recipe = RecipeDB::GetRecipe($recipe_id);   
    
    $recipe_name = $_POST['recipe_name'];    //Required
    $recipe_key=$_POST['recipe_key'];        //Required
    $recipe_num_serving=$_POST['recipe_num_serving'];    
    $recipe_cook_time=$_POST['recipe_cook_time'];
    $recipe_ingredients=$_POST['recipe_ingredients'];//Required
    $recipe_steps =$_POST['recipe_steps'];   //Required
    
    //-------------- Start Validation ----------------//
    $valid =true;
    if($category_id == null || empty($category_id)){
        $error .= "Please choose the <em>category</em><br/>";
        $valid = false;
        
    }
    if($recipe_name == null || empty($recipe_name)){
        $error .= "Enter the <em>name</em> of the recipe<br/>";
        $valid= false;
        
    }
    if($recipe_key == null || empty($recipe_key)){
        $error .= "Enter the <em>key ingredient</em> of the recipe<br/>";
        $valid=false;
        
    }
    if($recipe_ingredients == null || empty($recipe_ingredients)){
        $error .= "Enter the <em>ingredients</em> of the recipe<br/>";
        $valid=false;
        
    }
    if($recipe_steps == null || empty($recipe_steps)){
        $error .= "Enter the <em>steps</em> of the recipe<br/>";
        $valid=false;        
    }    
    //------------------- End Validation (EDIT) ---//
    if(!$valid){
        $error .= "Sorry, your recipe was not edited.<br/>";
        //include(PATH_ERRORS. '/error.php'); 
        //echo $error;
        if($error != ""){
            header("location:index.php?action=show_edit_form&err=".$error);
    }
        
    }
    else if($valid){  
   //Edit a Recipe if validation passes
    RecipeDB::editRecipe($recipe_id, $recipe_name,$category_id,$recipe_key,$recipe_num_serving,$recipe_cook_time,$recipe_ingredients,$recipe_steps);
    } 
   // Display the Image List page for the current category
   header("Location: .?category_id=$category_id");
    
}  
//******************Editing Image Gallery ends ******************// 
//**************** Insert Recipe starts ***********//   
else if ($action == 'show_insert_form') {
    
    $categories = CategoryDB::getCategories();    
    include('recipe_insert.php');
    
} else if ($action == 'Insert Recipe') {
    
    $category_id = $_POST['category_id'];  //Required
    $recipe_name = $_POST['recipe_name'];  //Required 
    $recipe_key = $_POST['recipe_key'];    //Required
    $recipe_num_serving = $_POST['recipe_num_serving'];    
    $recipe_cook_time = $_POST['recipe_cook_time'];
    $recipe_ingredients = $_POST['recipe_ingredients']; //Required
    $recipe_steps =$_POST['recipe_steps'];     //Required
    
    //*************Validation starts (Insert) ***********************//
    $valid =true;
    if($category_id == null || empty($category_id)){
        $error .= "Please choose the <em>category</em><br/>";
        $valid = false;
        
    }
    if($recipe_name == null || empty($recipe_name)){
        $error .= "Enter the <em>name</em> of the recipe<br/>";
        $valid= false;
        
    }
    if($recipe_key == null || empty($recipe_key)){
        $error .= "Enter the <em>key ingredient</em> of the recipe<br/>";
        $valid=false;
        
    }
    if($recipe_ingredients == null || empty($recipe_ingredients)){
        $error .= "Enter the <em>ingredients</em> of the recipe<br/>";
        $valid=false;
        
    }
    if($recipe_steps == null || empty($recipe_steps)){
        $error .= "Enter the <em>steps</em> of the recipe<br/>";
        $valid=false;        
    }       
    //*****************validation ends (Insert) ********************//
    if(!$valid){
        $error .= "Sorry, your recipe was not inserted.<br/>";
        //include(PATH_ERRORS. '/error.php'); 
        //echo $error;
        if($error != ""){
            header("location:index.php?action=show_insert_form&err=".$error);
    }
        
    }
    else if($valid){   
    
    $current_category = CategoryDB::getCategory($category_id);   //Category object having name and id properties
    $category_name=$current_category->getCatName();
      
    // if everything is ok, try to insert a new recipe        
     //$current_category = CategoryDB::getCategory($category_id);       
     //$current category...is a category Object...not a string         
     $recipeObj = new Recipe($recipe_name , $category_id, $recipe_key,$recipe_num_serving, $recipe_cook_time, $recipe_ingredients, $recipe_steps);
     RecipeDB::addRecipe($recipeObj);                                           
    
    // Display the Recipe List page for the current category
    header("Location: .?category_id=$category_id");         
    }//****************** Inserting a new Recipe ends ******************//
}
    ?>