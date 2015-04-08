<?php
//this has dish (dish_id as foreign key in recipe table that links to vote table)
//total of 8 properties with methods to be pased with value in a single class called Vote
class Vote {
    private $id, $dish, $vote_up, $review;

    public function __construct($id, $dish, $vote_up, $review) {
        $this->id = $id;
        $this->dish = $dish;
        $this->vote_up = $vote_up;
        $this->review = $review;
    }
    
    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }
    
    public function getDish() {
        return $this->dish;
    }

    public function setDish($value) {
        $this->dish = $value;
    }
    
    public function getVoteUp() {
        return $this->vote_up;
    }

    public function setVoteUp($value) {
        $this->vote_up = $value;
    }
    
    public function getReview() {
        return $this->review;
    }

    public function setReview($value) {
        $this->review = $value;
    }
}
?>