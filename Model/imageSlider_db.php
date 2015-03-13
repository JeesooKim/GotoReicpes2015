<?php

class ImageSliderDB {

    public static function GetImage(){
        $db = Database::getDB();
        $query = 'SELECT * FROM imageslider';
        $result = $db->query($query);
        
//        $articles = array();
//        foreach($result as $row){
//            $article = new Article($row['id'], $row['title'], $row['description'],$row['author']);
//            $articles[] = $article;
//        }
        
        return $result;
    }
}


?>