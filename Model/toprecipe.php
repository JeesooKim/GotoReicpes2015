<?php

class Toprecipe{
    
    private $cnt, $dish_id, $dish_name, $dish_cat, $dish_key, $dish_num_serving,$dish_cook_time;
    
    public function __construct($cnt, $dish_id, $dish_name, $dish_cat, $dish_key, $dish_num_serving,$dish_cook_time){
        $this->cnt=$cnt;
        $this->dish_id=$dish_id;
        $this->dish_name=$dish_name;
        $this->dish_cat=$dish_cat;
        $this->dish_key=$dish_key;
        $this->dish_num_serving=$dish_num_serving;
        $this->dish_cook_time=$dish_cook_time;
    }
 
    public function getCnt(){   
        return $this->cnt;
    }
    
    public function setCnt($value){
        $this->cnt=$value;
    }
    
    public function getDishId(){
        return $this->dish_id;
    }
    
    public function setDishId($value){
        $this->dish_id=$value;
    }    
    
    public function getDishName(){   
        return $this->dish_name;
    }
    
    public function setDishName($value){
        $this->dish_name=$value;
    }
    
    public function getDishCat(){
        return $this->dish_cat;
    }
    
    public function setDishCat($value){
        $this->dish_cat=$value;
    }    

    public function getDishKey(){
        return $this->dish_key;
    }
    
    public function setDishKey($value){
        $this->dish_key=$value;
    }    

    public function getDishNumServing(){
        return $this->dish_num_serving;
    }
    
    public function setDishNumServing($value){
        $this->dish_num_serving=$value;
    }    

    public function getDishCookTime(){
        return $this->dish_cook_time;
    }
    
    public function setDishCookTime($value){
        $this->dish_cook_time=$value;
    }    
    
}

class TopRecipeDisplay{
    
    private $dish_id, $displayYN;
    
    public function __construct($dish_id, $displayYN){
        $this->dish_id=$dish_id;
        $this->displayYN=$displayYN;
    }
 
    public function getDishId(){
        return $this->dish_id;
    }
    
    public function setDishId($value){
        $this->dish_id=$value;
    }    
    
    public function getDisplyYN(){   
        return $this->displayYN;
    }
    
    public function setDisplayYN($value){
        $this->displayYN=$value;
    }
    
}

class Toprecipeadmin{
    
    private $cnt, $dish_id, $dish_name, $dish_cat, $dish_key, $dish_num_serving,$dish_cook_time,$disp_yn;
    
    public function __construct($cnt, $dish_id, $dish_name, $dish_cat, $dish_key, $dish_num_serving,$dish_cook_time, $disp_yn){
        $this->cnt=$cnt;
        $this->dish_id=$dish_id;
        $this->dish_name=$dish_name;
        $this->dish_cat=$dish_cat;
        $this->dish_key=$dish_key;
        $this->dish_num_serving=$dish_num_serving;
        $this->dish_cook_time=$dish_cook_time;
        $this->disp_yn=$disp_yn;
    }
 
    public function getCnt(){   
        return $this->cnt;
    }
    
    public function setCnt($value){
        $this->cnt=$value;
    }
    
    public function getDishId(){
        return $this->dish_id;
    }
    
    public function setDishId($value){
        $this->dish_id=$value;
    }    
    
    public function getDishName(){   
        return $this->dish_name;
    }
    
    public function setDishName($value){
        $this->dish_name=$value;
    }
    
    public function getDishCat(){
        return $this->dish_cat;
    }
    
    public function setDishCat($value){
        $this->dish_cat=$value;
    }    

    public function getDishKey(){
        return $this->dish_key;
    }
    
    public function setDishKey($value){
        $this->dish_key=$value;
    }    

    public function getDishNumServing(){
        return $this->dish_num_serving;
    }
    
    public function setDishNumServing($value){
        $this->dish_num_serving=$value;
    }    

    public function getDishCookTime(){
        return $this->dish_cook_time;
    }
    
    public function setDishCookTime($value){
        $this->dish_cook_time=$value;
    }    
    
    public function getDispYn(){
        return $this->disp_yn;
    }
    
    public function setDispYn($value){
        $this->disp_yn=$value;
    }    
}

?>

