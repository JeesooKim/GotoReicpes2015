<?php  //include "c:/xampp/htdocs/GotoReicpes2015/config.php";  ?>
<?php  include "C:/wamp/www/GotorecipesGITHUB/GotoReicpes2015/config.php";  ?>


<?php
require_once( PATH_DATABASE);  
require(PATH_MODEL_VOTES);
require(PATH_MODEL_VOTES_DB);

 include PATH_HEADER_ADMIN;    ?>

<div id="main">
    <ol class="breadcrumb">
        <li><a href="<?php echo PATH_VIEW_ADMIN; ?>/index.php">Home</a></li>        
        <li class="active">Recipe Review</li>
    </ol>
    
    <h1>Recipe Review</h1>
    <?php
        $votes = VotesDB::getVotes();
        foreach ($votes as $row):
            ?>
            <?php //GET RECIPE HERE FOREACH ?>
            <p><?php echo $row->getReview(); ?></p>
        <article>
        <a href="vote_submit.php">Submit review</a>
        </article>
    <?php endforeach; ?>
    
</div>

<?php
    include PATH_FOOTER_ADMIN;   
?>
                
