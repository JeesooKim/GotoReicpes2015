<?php  //include "c:/xampp/htdocs/GotoReicpes2015/config.php";  ?>
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
                <th>Dish name</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php
        $recipes = RecipeDB::getRecipes();
        foreach ($recipes as $row):
            ?>
            <tr>
                <td><?php echo $row->getRecipeName(); ?></td>
                
                <td><a href="review_list.php?id=<?php echo $row->getRecipeID(); ?>">
                        See reviews
                </a></td>
                <td><a class="btn-link" href="review_submit.php?id=<?php echo $row->getRecipeID(); ?>">
                        Submit review
                </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div><!--End of main-->