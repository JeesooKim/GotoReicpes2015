<?php
class VotesDB {
    public static function getVotes() {
        $db = Database::getDB();
        $query = 'SELECT * FROM vote INNER JOIN recipes ON review.dish_id=recipe.dish_id';
        $result = $db->query($query);
        $votes = array();
        foreach ($result as $row) {
            $recipe= new Recipe($row['dish_id'], $row['dish_name']);
            $recipe_id= $recipe->getRecipeID();
            
            $vote = new Vote(
                            $row['id'],
                            $row['name'],
                            $row['vote_up'],
                            $row['vote_down'],
                            $row['review']);
            $vote->setID($row['id']);
            $votes[] = $vote;
        }
        return $votes;
    }

    public static function getVote($id) {
        $db = Database::getDB();
        $query = "SELECT * FROM vote
                  WHERE id = '$id'";
        $result = $db->query($query);
        //convert result into array
        $row = $result->fetch();
        
        //create category object
        $dish_id=$row['dish_id'];
        $recipe= RecipeDB::GetRecipe($dish_id);
        
            $vote = new Vote(
                            $row['id'],
                            $row['vote_up'],
                            $row['review']);
       $vote->setID($row['id']);
        return $vote;
    }

    public static function deleteVote($id) {
        $db = Database::getDB();
        $query = "DELETE FROM vote
                  WHERE id = '$id'";
        $row_count = $db->exec($query);
        return $row_count;
    }

    public static function addVote($vote) {
        $db = Database::getDB();

        $vote_up = $vote->getVoteUp();
        $review = $vote->getReview();

        $query =
            "INSERT INTO vote
                 (vote_up, review)
             VALUES
                 ('$vote_up', '$review')";

        $statement = $db->prepare($query);
        $statement -> bindParam(':vote_up', $vote_up,PDO::PARAM_INT, 255 );
        $statement -> bindParam(':review', $review, PDO::PARAM_STR, 255);
                                                            
        $statement->execute(); 
    }

    
    public static function updateVote($vote, $id)
    {
        $db = Database::getDB();
        $vote_up = $vote->getVoteUp();
        $review = $vote->getReview();

        $query = "UPDATE vote SET vote_up = '$vote_up',
                                    review = '$review' WHERE id = '$id' ";
        $statement = $db->prepare($query);
        $statement -> bindParam(':vote_up', $vote_up,PDO::PARAM_INT, 255 );
        $statement -> bindParam(':review', $review, PDO::PARAM_STR, 255);
                                                            
        $statement->execute(); 

    }
}
?>