<?php  //include "c:/xampp/htdocs/GotoReicpes2015/config.php";  ?>
<?php  include "C:/wamp/www/GotorecipesGITHUB/GotoReicpes2015/config.php";  

require_once( PATH_DATABASE);  
require(PATH_MODEL_VOTES);
require(PATH_MODEL_VOTES_DB);

//declaring variables from input
if(isset($_POST['submit'])){
    //text field name variable
    $vote_up = $_POST['vote_up'];
    $review = $_POST['review'];
    
    if($review != ' '){
    //validating the review ensuring not empty before adding to DB
    $vote = new Vote($vote_up, $review);
    //passing values to database from vote_submit.php
    VotesDB::addVote($vote);
        header("Location: user_review.php");
    }
    else{
        echo  'Missing fields.';
        exit();
    }
}
?>
<?php include PATH_HEADER_ADMIN;    ?>
<script src="<?php echo  PATH_CKEDITOR; ?>/ckeditor.js"></script>
<!--end top-->

<script type="text/javascript">
	$(document).ready(function(){
		var postID;
                var voteDownScript='voteDown.php';
                var voteUpScript='voteUp.php';
                
                // vote up
                $("button.up").click(function(){ // when people click an up button
                       $("div#response").show().html('<h2>voting, please wait...</h2>'); // show wait message

                       itemID=$(this).val(); // get post id

                       $.post(voteUpScript,{id:itemID},function(response){ // post to up script
                               $("div#response").html(response).hide(3000); // show response
                       });

                       $(this).attr({"disabled":"disabled"}); // disable button
                });

                // vote down
                $("button.down").click(function(){
                       $("div#response").show().html('<h2>voting, please wait...</h2>');

                       itemID=$(this).val();
                       $.post(voteDownScript,{id:itemID},function(response){ // post to down script
                               $("div#response").html(response).hide(3000); // show response
                       });
                       $(this).attr({"disabled":"disabled"}); // disable button

                });
	});
</script>

<div id="main">
    <ol class="breadcrumb">
        <li><a href="<?php echo PATH_VIEW_ADMIN; ?>/index.php">Home</a></li>
        <li><a href="<?php echo PATH_VIEW_ADMIN; ?>/UserReview/user_review.php" class="active">Recipe Review</a></li>
    </ol>
    
    <div id="response"></div>
    
    <h1>Submit your review</h1>
    <form action="vote_submit.php" method="POST" enctype="multipart/form-data">
        <input type="image" value="1" src="<?php echo PATH_IMAGES; ?>/UserReview/votup.png" class="up" />
        <input type="image" value="1" src="<?php echo PATH_IMAGES; ?>/UserReview/votdown.png" class="down" />
        
        <textarea name="editor1" id="editor1" rows="10" cols="80">
            What did you think about this recipe?
        </textarea>
        <script>
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace( 'editor1' );
        </script>
        
        <div>
            <button type="submit" class="btn btn-primary" name="vote_submit">Submit</button>
            <a class="btn btn-default" href="user_review.php">Back</a>
        </div>
    </form>
    
</div>
<?php

     include PATH_FOOTER_ADMIN;   
     ?>