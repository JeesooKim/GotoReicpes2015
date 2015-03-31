<?php
class ToprecipeDB {
	//use category and jobapplicants class
	//four static method
    public static function getRecipeCategory() {
        $db = Database::getDB();
        $query = 'select cat_id, cat_name from categories';
        $result = $db->query($query);
        $categories = array();
        foreach ($result as $row) {
            $category = new Category( $row['cat_id'], $row['cat_name']);
            
            $categories[] = $category;
        }
        return $categories;
    }

    public static function getTopRecipeByCategory($category) {
        $db = Database::getDB();
        $query = "select * from ( "
                 ."select  (select count(cmt_id) from comments where dish_id = a.dish_id ) cnt, dish_id,"
		 ."dish_name, (select cat_name from categories where cat_id = a.dish_cat) dish_cat,"
                 ."dish_key, dish_num_serving, dish_cook_time "
                 .",(select display_yes_no from top_recipes where dish_id = a.dish_id ) dispYn "
                 ."from recipes a ";
 
        if( $category != "" ){
            $query .= "where dish_cat = '$category' order by cnt desc ";
        }

        $query .= ") b "
               ."where ( b.dispYn is null or b.dispYn = '' or b.dispYn = 'Y') order by cnt desc";
 
        
        $result = $db->query($query);
        $toprecipes = array();
        foreach ($result as $row) {
            $toprecipe = new Toprecipe(
                                   $row['cnt'],
                                   $row['dish_id'],
                                   $row['dish_name'],
                                   $row['dish_cat'],
                                   $row['dish_key'],
                                   $row['dish_num_serving'],
                                   $row['dish_cook_time']
                    );
            $toprecipes[] = $toprecipe;
        }
        return $toprecipes;
    }
    
    public static function getTotCount( $filter ) { 
        $db = Database::getDB();
        
        $query = "select COUNT(*) from ( "
                 ."select  (select count(cmt_id) from comments where dish_id = a.dish_id ) cnt, dish_id,"
		 ."dish_name, (select cat_name from categories where cat_id = a.dish_cat) dish_cat,"
                 ."dish_key, dish_num_serving, dish_cook_time "
                 .",(select display_yes_no from top_recipes where dish_id = a.dish_id ) dispYn "
                 ."from recipes a ";
 
        if( $filter != "" ){
            $query .= "where dish_cat = '$filter' order by cnt desc ";
        }

        $query .= ") b "
               ."where ( b.dispYn is null or b.dispYn = '' or b.dispYn = 'Y') order by cnt desc";

        $count = $db->query($query);
        //convert result into array
        $row = $count->fetch();
        $result = $row[0];

        return $result;
    } 

    public static function getPageTopRecipeByCategory($category, $cntPerPage, $pgPage) {

        $offset = ($pgPage - 1) * $cntPerPage; 
        
        $db = Database::getDB();
        $query = "select * from ( "
                 ."select  (select count(cmt_id) from comments where dish_id = a.dish_id ) cnt, dish_id,"
		 ."dish_name, (select cat_name from categories where cat_id = a.dish_cat) dish_cat,"
                 ."dish_key, dish_num_serving, dish_cook_time "
                 .",(select display_yes_no from top_recipes where dish_id = a.dish_id ) dispYn "
                 ."from recipes a ";
 
        if( $category != "" ){
            $query .= "where dish_cat = '$category' order by cnt desc ";
        }

        $query .= ") b "
               ."where ( b.dispYn is null or b.dispYn = '' or b.dispYn = 'Y') order by cnt desc";

        $query .= " LIMIT ".$cntPerPage." OFFSET ".$offset;
        $result = $db->query($query);
        $toprecipes = array();
        foreach ($result as $row) {
            $toprecipe = new Toprecipe(
                                   $row['cnt'],
                                   $row['dish_id'],
                                   $row['dish_name'],
                                   $row['dish_cat'],
                                   $row['dish_key'],
                                   $row['dish_num_serving'],
                                   $row['dish_cook_time']
                    );
            $toprecipes[] = $toprecipe;
        }
        return $toprecipes;
    }
    
    public static function deleteTopRecipes($dish_id) {
        $db = Database::getDB();
        $query = "DELETE FROM top_recipes
                  WHERE dish_id = '$dish_id'";
        $row_count = $db->exec($query);
        return $row_count;
    }

    public static function addTopRecipes($toprecipedisplay) {
        $db = Database::getDB();

        $dish_id = $toprecipedisplay->getDishId();
        $displayYn = $toprecipedisplay->getDisplyYN();

        $query =
            "INSERT INTO top_recipes
                 (dish_id, display_yes_no)
             VALUES
                 ('$dish_id', '$displayYn')";

        $row_count = $db->exec($query);
        return $row_count;
    }

    public static function updateTopRecipes($toprecipedisplay) {
        $db = Database::getDB();

        $dish_id = $toprecipedisplay->getDishId();
        $displayYn = $toprecipedisplay->getDisplyYN();
        
        $query = "UPDATE top_recipes SET "
                . "display_yes_no = '$displayYn' "
                . "WHERE dish_id = '$dish_id'";
        
        $row_count = $db->exec($query);
        return $row_count;
    }

}
?>