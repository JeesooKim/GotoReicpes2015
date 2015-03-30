<?php
class Imageslider {
    private $id, $name, $path;

    public function __construct($name, $path) {
        //$this->id = $id;
        $this->name = $name;
        $this->path = $path;
    }
    
    public function getImageID() {
        return $this->id;
    }

    public function setImageID($value) {
        $this->id = $value;
    }
    
    public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;
    }
    
    public function getPath() {
        return $this->path;
    }

    public function setPath($value) {
        $this->path = $value;
    }
    
}

?>