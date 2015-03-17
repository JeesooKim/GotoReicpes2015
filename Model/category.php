<?php

class Category{
    //Caegory class to create an object to PLACE DATA from categories table
    //two properties with methods to read/write category id and name
    
    private $category_id, $category_name;
    //two properties for this class: category id and category name
    
    public function __construct($category_id, $category_name){
        //construction function to initialize this class (create an object having properties and methods in this class
        $this->category_id=$category_id;
        $this->category_name=$category_name;
    }
 
    public function getCatID(){   
       //read the category id from the table
        return $this->category_id;
    }
    
    public function setCatID($value){
        //write the category id for the $value
        $this->category_id=$value;
    }
    
    public function getCatName(){
        //read the category name from the table
        return $this->category_name;
    }
    
    public function setCatName($value){
        //write the category name for the $value
        $this->category_name=$value;
    }    
}

//PHP project-gotorecipes.com
//Humber College 2015
//Jeesoo Kim, March 16
?>
