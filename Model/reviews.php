<?php
//this has dish (dish_id as foreign key in recipe table that links to vote table)
//total of 8 properties with methods to be pased with value in a single class called Vote
class Review {
    private $id, $name, $rating, $review;

    public function __construct($id, $name, $rating, $review) {
        $this->id = $id;
        $this->name = $name;
        $this->rating = $rating;
        $this->review = $review;
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
    
    public function getRating() {
        return $this->rating;
    }

    public function setRating($value) {
        $this->rating = $value;
    }
    
    public function getReview() {
        return $this->review;
    }

    public function setReview($value) {
        $this->review = $value;
    }
}
?>