<?php  //include "c:/xampp/htdocs/GotoReicpes2015/config.php";  ?>
<?php  include "C:/wamp/www/GotorecipesGITHUB/GotoReicpes2015/config.php";  

require_once( PATH_DATABASE); 
require(PATH_MODEL_CATEGORY);
require( PATH_MODEL_RECIPE);
require( PATH_MODEL_RECIPES_DB);
require(PATH_MODEL_REVIEWS);
require(PATH_MODEL_REVIEWS_DB);

//declaring variables from input
if(isset($_POST['review_submit'])){
    $name = $_POST['name'];
    $rating = $_POST['rating'];
    $recipe_review = $_POST['review'];
    
    if($name != ' ' || $rating != ' ' || $recipe_review != ' '){
        $review = new Review($name, $rating, $recipe_review);
        ReviewDB::addReview($review);
        header("Location: review_list.php");
    }else{
        echo 'Submit failed.';
    }
}

?>
<?php include PATH_HEADER_ADMIN;    ?>
<script src="<?php echo  PATH_CKEDITOR; ?>/ckeditor.js"></script>
<!--end top-->


<div id="main">
    
    <div id="response"></div>
    
    <h1>Submit your review</h1></h1>
    <form action="review_submit.php" method="POST" enctype="multipart/form-data">
        
        <div class="form-group">
            <label for="name">Your name: </label>
            <input type="text" class="form-control" name="name">
        </div>
        
        <div class="form-group">
            <label for="rating">Rating - 1(bad) to 4(good): </label>
            <input type="text" class="form-control" name="rating">
        </div>
        
        <textarea name="review" id="editor1" rows="10" cols="80">
            What did you think about this recipe?
        </textarea>
        <script>
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace( 'review' );
        </script>
        
        <div>
            <button type="submit" class="btn btn-primary" name="review_submit">Submit</button>
            <a class="btn btn-default" href="review_index.php">Back</a>
        </div>
    </form>
    
</div>
<?php

     include PATH_FOOTER_ADMIN;   
     ?>