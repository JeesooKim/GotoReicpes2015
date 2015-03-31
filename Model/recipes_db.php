<?php
#File name: recipes_db.php 
#File for Recipes -Model/Controller
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim
#March 25, 2015
#Reference: Class material -PDO Class

//RecipesDB class (controller)
//Validation class

class RecipeDB{
    //this class is a controller to connect Data from DB with pages in View
    //(1)GetRecipes(): method for getting all the recipes
    //(2)GetRecipe($dish_id): method for getting a recipe of a certain id
    //(3)GeRecipesByCategory($cat_id): method for getting categorized recipes
    //(4)deleteRecipe(): method for deleting a recipe
    //(5)editRecipe(): method for editing(updating) a recipe
    //(6)addRecipe(): method for adding(inserting) a recipe
    
    public static function GetRecipes(){
                $dbCon = Database::getDB();
                
                $query= "SELECT * FROM recipes INNER JOIN categories ON recipes.dish_cat = categories.cat_id";
                $result = $dbCon->query($query);
                $recipes = array();
                foreach($result as $row){
                    //instantiating a Category object from data queried above 
                    $category = new Category($row['cat_id'], $row['cat_name']);
                    $category_id=$category->getCatID();                    
                     
                    //instantiating a Recipe object
                    $recipe= new Recipe($row['dish_name'], $category_id, $row['dish_key'], $row['dish_num_serving'], $row['dish_cook_time'], $row['dish_ingredients'], $row['dish_steps'] );
                    $recipe->setRecipeID($row['dish_id']);
                    $recipes[] =$recipe; //adding each recipe to the array of recipes as an element
                }
                return $recipes; //return an array        
    }
    
    public static function GetRecipe($dish_id){
        $dbCon=Database::getDB();
        $query="SELECT * FROM recipes WHERE dish_id = '$dish_id' ";
        $result = $dbCon->query($query);
        //convert result into array
        $row = $result -> fetch();
        
        //create category object
        $category_id=$row['dish_cat'];
        $category= CategoryDB::getCategory($category_id);
        
        $recipe = new Recipe($row['dish_name'], $category_id, $row['dish_key'], $row['dish_num_serving'], $row['dish_cook_time'], $row['dish_ingredients'], $row['dish_steps']);
        $recipe->setRecipeID($dish_id);
        
        return $recipe;  //return an object of the Recipe class 
    }
    
    public static function GetRecipesByCategory($cat_id){
        $dbCon=Database::getDB();
        $query = "SELECT * FROM recipes WHERE dish_cat='$cat_id' ORDER BY dish_id ";
        $result = $dbCon->query($query);        
        $recipes= array();
        
        foreach($result as $row){
            $recipe=new Recipe($row['dish_name'] , $cat_id, $row['dish_key'], $row['dish_num_serving'], $row['dish_cook_time'], $row['dish_ingredients'], $row['dish_steps']);
            $recipe->setRecipeID($row['dish_id']);
            $recipes[]= $recipe;
        }        
        return $recipes; //return an array        
    }    
     
    public static function deleteRecipe($dish_id){
        //connect to DB
        $dbCon=Database::getDB();
        
        //query to delete the object of the given id, $dish)id
        $query="DELETE FROM recipes WHERE dish_id='$dish_id' ";
        $row_count= exec($query);
        return $row_count;
    }
    
    public static function editRecipe( $dish_id,  $dish_name, $cat_id, $dish_key, $dish_num_serving, $dish_cook_time, $dish_ingredients, $dish_steps){
        //connect to DB
        $dbCon=Database::getDB();
        
        //query to UPDATE the table for the values passed by parameters of this method
        $query = "UPDATE recipes SET "
                . "dish_id='$dish_id , "                
                . "dish_name='$dish_name', "
                . "dish_cat='$cat_id' "
                . "dish_key= '$dish_key', "
                . "dish_num_serving = '$dish_num_serving', "
                . "dish_cook_time= '$dish_cook_time', "
                . "dish_ingredients = '$dish_ingredients', "
                . "dish_steps = '$dish_steps' ";
        $dbCon->exec($query);
        
    }
     public static function addRecipe($recipe){
         //the parameter is an object of Recipe class
         //connectDB
         $dbCon=Database::getDB();
         
         //get the values of the object ($recipe) from functions/methods of RecipeDB class
         $dish_id= $recipe -> getRecipeID();
         $dish_name = $recipe -> getRecipeName();    
         $dish_cat = $recipe -> getRecipeCategory();
         $dish_key = $recipe -> getRecipeKeyIngredient();
         $dish_num_serving = $recipe -> getRecipeNumServing();
         $dish_cook_time = $recipe -> getRecipeCookTime();
         $dish_ingredients = $recipe -> getRecipeIngredients();
         $dish_steps= $recipe -> getRecipeSteps();
         
         //Insert the values of the object into the recipes table
         $query= "INSERT INTO recipes (dish_id, dish_name, dish_cat, dish_key, dish_num_serving, dish_cook_time, dish_ingredients, dish_steps)"
                 . "VALUES ($dish_id, '$dish_name', $dish_cat, '$dish_key', '$dish_num_serving', '$dish_cook_time', '$dish_ingredients', '$dish_steps' )";
         $dbCon->exec($query);           
    }
}

class Validation{
    
}

