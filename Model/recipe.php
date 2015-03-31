<?php
#File name: recipe.php 
#File for Recipes -Model
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim
#March 25, 2015
#Reference: Class material -PDO Class

class Recipe{
    //Recipe class to create an object to PLACE DATA from the recipes table
    //Eight(8) properties with methods to read/write such properties
    //$dish_id : PRIMARY KEY of the table
    //$dish_cat : category(cat_id in the table) is a foreign key related to the primary key of the categories table
    
    private $dish_id, $dish_name, $dish_cat, $dish_key, $dish_num_serving, $dish_cook_time, $dish_ingredients, $dish_steps;
    
    public function __construct($dish_name, $dish_cat, $dish_key, $dish_num_serving, $dish_cook_time, $dish_ingredients, $dish_steps){
        
        $this-> dish_name=$dish_name;
        $this-> dish_cat=$dish_cat;
        $this-> dish_key=$dish_key;
        $this-> dish_num_serving=$dish_num_serving;
        $this-> dish_cook_time=$dish_cook_time;
        $this-> dish_ingredients = $dish_ingredients;
        $this-> dish_steps=$dish_steps;
    }
    
    public function getRecipeID(){
        return $this->dish_id;
    }
    public function setRecipeID($value){
        $this->dish_id=$value;
    }
    
    public function getRecipeName(){
        return $this-> dish_name;
    }
    public function setRecipeName($value){
        $this-> dish_name =$value;
    }
    
    public function getRecipeCategory(){
        return $this-> dish_cat;
    }
    public function setRecipeCategory($value){
        $this-> dish_cat=$value;
    }
    
    public function getRecipeKeyIngredient(){
        return $this->dish_key;
    }
    public function setRecipeKeyIngredient($value){
        $this-> dish_key =$value;
    }
    
    public function getRecipeNumServing(){
        return $this-> dish_num_serving;
    }
    public function setRecipeNumServing($value){
        $this-> dish_num_serving=$value;
    }
    
    public function getRecipeCookTime(){
        return $this-> dish_cook_time;
    }
    public function setRecipeCookTime($value){
        $this-> dish_cook_time =$value;
    }
   
    public function getRecipeIngredients(){
        return $this-> dish_ingredients;
    }
    public function setRecipeIngredients($value){
        $this-> dish_ingredients =$value;
    }
    
    
    public function getRecipeSteps(){
        return $this-> dish_steps;
    }
    public function setRecipeSteps($value){
        $this-> dish_steps =$value;    
    }
}