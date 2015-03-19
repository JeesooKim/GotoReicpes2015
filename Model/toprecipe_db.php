<?php
class ToprecipeDB {
	//use category and jobapplicants class
	//four static method
    public static function getRecipeCategory() {
        $db = Database::getDB();
        $query = 'select distinct dish_cat from recipes';
        $result = $db->query($query);
        $categories = array();
        foreach ($result as $row) {
            $categories[] = $row['dish_cat'];
        }
        return $categories;
    }

    public static function getTopRecipeByCategory($category) {
        $db = Database::getDB();
        if( $category == "" ){
            $query = "select  (select count(cmt_id) from comments where dish_id = a.dish_id ) cnt, dish_id,"
		."dish_name, dish_cat, dish_key, dish_num_serving, dish_cook_time from recipes a "
		."order by cnt desc";
        }else{
            $query = "select  (select count(cmt_id) from comments where dish_id = a.dish_id ) cnt, dish_id,"
		."dish_name, dish_cat, dish_key, dish_num_serving, dish_cook_time from recipes a "
		." where dish_cat = '$category' order by cnt desc";
        }
        $result = $db->query($query);
        $toprecipe = array();
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