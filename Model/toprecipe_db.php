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
        $query = "select  (select count(cmt_id) from comments where dish_id = a.dish_id ) cnt, dish_id,"
		 ."dish_name, (select cat_name from categories where cat_id = a.dish_cat) dish_cat,"
                 ."dish_key, dish_num_serving, dish_cook_time from recipes a ";

        if( $category == "" ){
            $query .= "order by cnt desc";
        }else{
            $query .= " where dish_cat = '$category' order by cnt desc";
        }

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
        $query = "SELECT COUNT(*) FROM recipes";
        
        if ($filter != "") { 
            $query .= " WHERE dish_cat = '$filter'"; 
        }
        
        $count = $db->query($query);
        //convert result into array
        $row = $count->fetch();
        $result = $row[0];

        return $result;
    } 

    public static function getPageTopRecipeByCategory($category, $cntPerPage, $pgPage) {

        $offset = ($pgPage - 1) * $cntPerPage; 
        
        $db = Database::getDB();
        $query = "select  (select count(cmt_id) from comments where dish_id = a.dish_id ) cnt, dish_id,"
		 ."dish_name, (select cat_name from categories where cat_id = a.dish_cat) dish_cat,"
                 ."dish_key, dish_num_serving, dish_cook_time from recipes a ";

        if( $category == "" ){
            $query .= "order by cnt desc";
        }else{
            $query .= " where dish_cat = '$category' order by cnt desc";
        }
        
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
}
?>