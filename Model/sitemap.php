<?php

class Menu{
    
    private $id, $menu_level, $menu_name, $upper_menu, $url;
    
    public function __construct($id, $menu_level, $menu_name, $upper_menu, $url){
        $this->id=$id;
        $this->menu_level=$menu_level;
        $this->menu_name=$menu_name;
        $this->upper_menu=$upper_menu;
        $this->url=$url;
    }
 
    public function getId(){   
        return $this->id;
    }
    
    public function setId($value){
        $this->id=$value;
    }
    
    public function getMenuLevel(){
        return $this->menu_level;
    }
    
    public function setMenuLevel($value){
        $this->menu_level=$value;
    }    
    
    public function getMenuName(){   
        return $this->menu_name;
    }
    
    public function setMenuName($value){
        $this->menu_name=$value;
    }
    
    public function getUpperMenu(){
        return $this->upper_menu;
    }
    
    public function setUpperMenu($value){
        $this->upper_menu=$value;
    }    

    public function getUrl(){
        return $this->url;
    }
    
    public function setUrl($value){
        $this->url=$value;
    }    
    
}

class Menulevel{
    
    private $level_id, $level_name;
    
    public function __construct($level_id, $level_name){
        $this->level_id=$level_id;
        $this->level_name=$level_name;
    }
 
    public function getLevelId(){   
       //read the level id from the table
        return $this->level_id;
    }
    
    public function setLevelId($value){
        //write the level id for the $value
        $this->level_id=$value;
    }
    
    public function getLevelName(){
        //read the level name from the table
        return $this->level_name;
    }
    
    public function setLevelName($value){
        //write the level name for the $value
        $this->level_name=$value;
    }    
}

?>

