<?php  include "C:/wamp/www/GotorecipesGITHUB/GotoReicpes2015/config.php";


require_once( SITEROOT.PATH_DATABASE);  
require(SITEROOT.PATH_MODEL_IMAGESLIDERS);
require(SITEROOT.PATH_MODEL_IMAGESLIDER_DB);

//delete option
if(isset($_POST['image_id'])){
$img_id = $_POST['image_id'];
ImagesliderDB::deleteImageslider($img_id);
    header("Location: UserReview_Admin.php");
}
?>

<?php include SITEROOT.PATH_HEADER;    ?>
<!--end top-->
    <div id="main">
        <form action="UserReview_Admin.php" method="POST">
            
            <div class="rating">
            <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
            </div>
            <input type="text" name="rating" value="" />
            
        </form>
    </div>
<?php include SITEROOT.PATH_FOOTER;    ?>