<?php

class CategoryDB {    
    //CategoryDB class is to control the data from the categories table
    //two methods to manipulate the data
    //(1) getCategories() : to get all the categories. (list of categories)
    //(2) getCategory($category_id) : to get a chosen category
    
    public static function getCategories() {
        $dbCon = Database::getDB();
        $query = 'SELECT * FROM categories ORDER BY cat_id';
        $result = $dbCon->query($query);
        $categories = array();
        foreach ($result as $row) {
            $category = new Category($row['cat_id'], $row['cat_name']);
            $categories[] = $category;
        }
        return $categories;   //return the array of categories
    }

    public static function getCategory($category_id) {
        //this function returns the category id and name having $category_id
        $db = Database::getDB();
        $query = "SELECT * FROM categories  WHERE cat_id = '$category_id' ";
        $statement = $db->query($query);
        $row = $statement->fetch();   //one record fetched to a $row
        
        //new category object instantiated with a selected category through $category_id
        $category = new Category($row['cat_id'], $row['cat_name']);
        return $category;
    }    
}

//PHP project-gotorecipes.com
//Humber College 2015
//Jeesoo Kim, March 16
?>