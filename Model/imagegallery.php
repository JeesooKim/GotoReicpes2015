<?php
#File name: imagegallery.php
#File for Image Gallery
#Team Project: gotorecipes
#Author: Jeesoo Kim
#March 2015
#Reference: Class material -PDO Class

class ImageGallery{
    //Gallery class to create an object to PLACE DATA from the gallery table
    //twelve(12) properties with mtehods to read/write such properties
    //$id for img_id, PRIMARY KEY of the table
    //category(cat_id in the table) is a foreign key related to the primary key of the categories table
   
    private $id, $title, $cat_id, $key, $detail, $filename, $path, $size, $type,  $author, $source;
        
    public function __construct($title, $cat_id, $key, $detail, $filename, $path, $size, $type,  $author, $source){
        $this->title=$title;
        $this->cat_id =$cat_id;
        $this->key=$key;
        $this->detail=$detail;
        $this->filename=$filename;
        $this->path=$path;
        $this->size=$size;
        $this->type=$type;
        //$this->content =$content;
        $this->author=$author;
        $this->source=$source;        
    }
    
    public function getID(){
        //to read and place img_id from the gallery table 
        //but this is the primary key of the table and auto-incremented
        return $this->id ;
    }
    public function setID($value){
        //to write/update/edit  img_id for the $value
        //but this is the primary key of the table and auto-incremented        
        $this->id =$value;
    }    
       
    public function getTitle(){
        //to read and place img_title from the gallery table
        return $this->title ;
    }
    public function setTitle($value){
        //to write/update/edit  img_title for the $value
        $this->title =$value;
    }             
    
    public function getCategoryID(){
        //to read and place cat_id from the gallery table
        return $this->cat_id ;
    }
    public function setCategoryID($value){
        //to write/update/edit  cat_id for the $value
        $this->cat_id =$value;
    }     
    public function getKeyIngredient(){
        //to read and place img_key from the gallery table
        return $this->key ;
    }
    public function setKeyIngredient($value){
        //to write/update/edit  img_key for the $value
        $this->key =$value;
    }     
    public function getDetail(){
        //to read and place img_detail from the gallery table
        return $this->detail ;
    }
    public function setDetail($value){
        //to write/update/edit  img_detail for the $value
        $this->detail =$value;
    }         
            
    public function getFilename(){
        //to read and place img_filename from the gallery table
        return $this->filename ;
    }
    public function setFilename($value){
        //to write/update/edit  img_filename for the $value
        $this->filename =$value;
    }     
    public function getPath(){
        //to read and place img_path from the gallery table
        return $this->path ;
    }
    public function setPath($value){
        //to write/update/edit  img_path for the $value
        $this->path =$value;
    }     
    public function getSize(){
       //to read and place img_size from the gallery table
        return $this->size ;
    }
    public function setSize($value){
        //to write/update/edit  img_size for the $value
        $this->size =$value;
    }     
    public function getType(){
        //to read and place img_type from the gallery table
        return $this->type ;
    }
    public function setType($value){
        //to write/update/edit  img_type for the $value
        $this->type =$value;
    }     
    
//    public function getContent(){
//        //to read and place img_content from the gallery table
//        return $this->content  ;
//    }
//    public function seContent($value){
//        //to write/update/edit  img_content for the $value
//        $this->content  =$value;
//    }     
    public function getAuthor(){
        //to read and place img_author from the gallery table
        return $this->author ;
    }
    public function setAuthor($value){
        //to write/update/edit  img_autho for the $value
       $this->author =$value;
    }     
    public function getSource(){
        //to read and place img_source from the gallery table
        return $this->source ;
    }
    public function setSource($value){
        //to write/update/edit  img_source for the $value
        $this->source =$value;
    }   
}

//PHP project-gotorecipes.com
//Humber College 2015
//Jeesoo Kim, March 16
?>