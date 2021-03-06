<?php

#File name: recipes_db.php 
#File for Recipes -Model/Controller
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim
#March 25, 2015
#Reference: Class material -PDO Class
//RecipesDB class (controller)
//Validation class

class RecipeDB {

    //this class is a controller to connect Data from DB with pages in View
    //(1)GetRecipes(): method for getting all the recipes
    //(2)GetRecipe($dish_id): method for getting a recipe of a certain id
    //(3)GeRecipesByCategory($cat_id): method for getting categorized recipes
    //(4)deleteRecipe(): method for deleting a recipe
    //(5)editRecipe(): method for editing(updating) a recipe
    //(6)addRecipe(): method for adding(inserting) a recipe

    public static function GetRecipes() {
        $dbCon = Database::getDB();

        $query = "SELECT * FROM recipes INNER JOIN categories ON recipes.dish_cat = categories.cat_id";
        $result = $dbCon->query($query);
        $recipes = array();
        foreach ($result as $row) {
            //instantiating a Category object from data queried above 
            $category = new Category($row['cat_id'], $row['cat_name']);
            $category_id = $category->getCatID();

            //instantiating a Recipe object
            $recipe = new Recipe($row['dish_name'], $category_id, $row['dish_key'], $row['dish_num_serving'], $row['dish_cook_time'], $row['dish_ingredients'], $row['dish_steps'], $row['votes']);
            $recipe->setRecipeID($row['dish_id']);
            $recipes[] = $recipe; //adding each recipe to the array of recipes as an element
        }
        return $recipes; //return an array        
    }

    public static function GetRecipe($dish_id) {
        $dbCon = Database::getDB();
        $query = "SELECT * FROM recipes WHERE dish_id = '$dish_id' ";
        $result = $dbCon->query($query);
        //convert result into array
        $row = $result->fetch();

        //create category object
        $category_id = $row['dish_cat'];
        $category = CategoryDB::getCategory($category_id);

        $recipe = new Recipe($row['dish_name'], $category_id, $row['dish_key'], $row['dish_num_serving'], $row['dish_cook_time'], $row['dish_ingredients'], $row['dish_steps'], $row['votes']);
        $recipe->setRecipeID($dish_id);

        return $recipe;  //return an object of the Recipe class 
    }

    public static function GetRecipesByCategory($cat_id) {
        $dbCon = Database::getDB();
        $query = "SELECT * FROM recipes WHERE dish_cat='$cat_id' ORDER BY dish_id ";
        $result = $dbCon->query($query);
        $recipes = array();

        foreach ($result as $row) {
            $recipe = new Recipe($row['dish_name'], $cat_id, $row['dish_key'], $row['dish_num_serving'], $row['dish_cook_time'], $row['dish_ingredients'], $row['dish_steps'], $row['votes']);
            $recipe->setRecipeID($row['dish_id']);
            $recipes[] = $recipe;
        }
        return $recipes; //return an array        
    }

    public static function deleteRecipe($dish_id) {
        try {
            //connect to DB
            $dbCon = Database::getDB();

            //query to delete the object of the given id, $dish)id
            $query = "DELETE FROM recipes WHERE dish_id=" . $dish_id;
            $q = $dbCon->prepare($query);
            $q->execute();

            //$dbCon->exec($query);
            //$row_count= exec($query);
            //return $row_count;
        } catch (Exception $ex) {
            $err = $ex->getMessage();
            echo $err;
            die();
        }
    }

    public static function editRecipe($dish_id, $dish_name, $cat_id, $dish_key, $dish_num_serving, $dish_cook_time, $dish_ingredients, $dish_steps) {
        try {

            //connect to DB
            $dbCon = Database::getDB();

            $query = "UPDATE recipes SET "
                    . "dish_name=?,"
                    . "dish_cat=?, "
                    . "dish_key=?, "
                    . "dish_num_serving = ?, "
                    . "dish_cook_time= ?, "
                    . "dish_ingredients =?, "
                    . "dish_steps = ? "
                    . "WHERE dish_id = ?";

            $statement = $dbCon->prepare($query);
            $statement->execute(array(
                $dish_name, $cat_id, $dish_key, $dish_num_serving, $dish_cook_time, $dish_ingredients, $dish_steps, $dish_id));
        } catch (Exception $ex) {
            $err = $ex->getMessage();
            echo $err;
            die();
        }
    }

    public static function plusVote($dish_id, $votes) {
        $dbCon = Database::getDB();
        $votes++;

        //query to UPDATE the table for the values passed by parameters of this method
        $query = "UPDATE recipes SET votes =:votes WHERE dish_id = $dish_id ORDER BY votes";

        $statement = $dbCon->prepare($query);
        $statement->bindParam(':votes', $votes, PDO::PARAM_INT);

        $statement->execute();
    }

    public static function addRecipe($recipe) {
        //the parameter is an object of Recipe class
        try {
            //connectDB
            $dbCon = Database::getDB();

            //get the values of the object ($recipe) from functions/methods of RecipeDB class
            //$dish_id= $recipe -> getRecipeID();
            $dish_name = $recipe->getRecipeName();
            $dish_cat = $recipe->getRecipeCategory();
            $dish_key = $recipe->getRecipeKeyIngredient();
            $dish_num_serving = $recipe->getRecipeNumServing();
            $dish_cook_time = $recipe->getRecipeCookTime();
            $dish_ingredients = $recipe->getRecipeIngredients();
            $dish_steps = $recipe->getRecipeSteps();

            //Insert the values of the object into the recipes table
            $query = "INSERT INTO recipes (dish_name, dish_cat, dish_key, dish_num_serving, dish_cook_time, dish_ingredients, dish_steps)"
                    . "VALUES (:dish_name, :dish_cat, :dish_key, :dish_num_serving, :dish_cook_time, :dish_ingredients, :dish_steps )";

            $statement = $dbCon->prepare($query);
            $statement->bindParam(':dish_name', $dish_name, PDO::PARAM_STR, 150);
            $statement->bindParam(':dish_cat', $dish_cat, PDO::PARAM_INT);
            $statement->bindParam(':dish_key', $dish_key, PDO::PARAM_STR, 100);
            $statement->bindParam(':dish_num_serving', $dish_num_serving, PDO::PARAM_INT, 100);
            $statement->bindParam(':dish_cook_time', $dish_cook_time, PDO::PARAM_STR, 50);
            $statement->bindParam(':dish_ingredients', $dish_ingredients, PDO::PARAM_STR, 250);
            $statement->bindParam(':dish_steps', $dish_steps, PDO::PARAM_STR);

            $statement->execute();
        } catch (Exception $ex) {
            $err = $ex->getMessage();
            echo $err;
            die();
        }
    }

}

class Validation {    
}
