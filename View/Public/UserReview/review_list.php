<?php  include "C:/wamp/www/GotorecipesGITHUB/GotoReicpes2015/config.php";  ?>


<?php
require_once( PATH_DATABASE);  
require(PATH_MODEL_CATEGORY);
require( PATH_MODEL_RECIPE);
require( PATH_MODEL_RECIPES_DB);
require( PATH_MODEL_REVIEWS);
require( PATH_MODEL_REVIEWS_DB);
?>
<?php include PATH_HEADER_ADMIN;    ?>
<!--end top-->

<div id="main">

    <table class="table table-responsive table-bordered">
        <thead>
        <tr>
            <th>Dish ID</th>
            <th>Name</th>
            <th>Rating</th>
            <th>Review</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $review = ReviewDB::getReviews();
        foreach ($review as $r):
            ?>
            <tr>
                <td><?php echo $r->getID(); ?></td>
                <td><?php echo $r->getName(); ?></td>
                <td><?php echo $r->getRating(); ?></td>
                <td><?php echo $r->getReview(); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    
    <div>
        <a class="btn btn-default" href="review_index.php">Back to recipes</a>
    </div>
</div><!--End of main-->

<?php
    include PATH_FOOTER_ADMIN;   
?>
                
