<?php

class ImageGallery {

    private $id;
    private $name;
    private $description;
    private $image;
    private $date;

    public function __construct( $id, $name, $description, $image, $date ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        $this->date = $date;
    }
    
    public function getID() {
        return $this->id;
    }
    public function setID($value) {
        $this->id = $value;
    }
    
    public function getName() {
        return $this->name;
    }
    public function setName($value) {
        $this->name = $value;
    }
    
    public function getDescription() {
        return $this->description;
    }
    public function setDescription($value) {
        $this->description = $value;
    }
    
    public function getImage() {
        return $this->image;
    }
    public function setImage($value) {
        $this->image = $value;
    }
    
    public function getDate() {
        return $this->date;
    }
    public function setDate($value) {
        $this->date = $value;
    }


}
?>