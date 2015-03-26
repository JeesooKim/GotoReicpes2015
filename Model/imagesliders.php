<?php
class Imageslider {
    private $imageId, $name, $description, $image, $date;

    public function __construct($imageId, $name, $description, $image, $date) {
        $this->imageId = $imageId;
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        $this->date = $date;
    }
    
    public function getImageID() {
        return $this->imageId;
    }

    public function setImageID($value) {
        $this->imageId = $value;
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