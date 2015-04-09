<?php
class ReviewDB {
    public static function getReviews() {
        $db = Database::getDB();
        $query = 'SELECT * FROM review
                  INNER JOIN recipes
                      ON review.dish_id = recipes.dish_id';
        $result = $db->query($query);
        $reviews = array();
        foreach ($result as $row) {
            $recipe = new Recipe(   $row['dish_id'],
                                    $row['dish_name']);
            
            $review = new Review(
                            $row['id'],
                            $row['name'],
                            $row['rating'],
                            $row['review']);
            $review->setID($row['id']);
            $reviews[] = $review;
        }
        return $reviews;
    }
    
//    public static function getProductsByCategory($category_id) {
//        $db = Database::getDB();
//
//        $category = CategoryDB::getCategory($category_id);
//	//select product in category
//        $query = "SELECT * FROM products
//                  WHERE categoryID = '$category_id'
//                  ORDER BY productID";
//        $result = $db->query($query);
//        //create product array
//        $products = array();
//        //for each row in the result, create product object
//        foreach ($result as $row) {
//            $product = new Product($category, //store category object
//                                   $row['productCode'],
//                                   $row['productName'],
//                                   $row['listPrice']);
//            $product->setId($row['productID']);
//            //apend the product object to product array
//            $products[] = $product;
//        }
//        return $products;
//    }

    public static function getReview($id) {
        $db = Database::getDB();
        $query = "SELECT * FROM review
                  WHERE id = '$id'";
        $result = $db->query($query);
        //convert result into array
        $row = $result->fetch();
        $recipe = RecipeDB::GetRecipe($row['dish_id']);
            $review = new Review($recipe,
                            $row['id'],
                            $row['name'],
                            $row['rating'],
                            $row['review']);
       $review->setID($row['id']);
        return $review;
    }

    public static function addReview($review) {
        $db = Database::getDB();

        $name = $review->getName();
        $rating = $review->getRating();
        $review = $review->getReview();

        $query =
            "INSERT INTO review
                 (name, rating, review)
             VALUES
                 ('$name', '$rating', '$review')";

        $statement = $db->prepare($query);
        $statement -> bindParam(':name',$name, PDO::PARAM_STR, 100 );
        $statement -> bindParam(':rating', $rating,PDO::PARAM_STR, 100 );
        $statement -> bindParam(':review',$review,PDO::PARAM_STR, 100);
                                                            
        $statement->execute(); 
    }
}
?>