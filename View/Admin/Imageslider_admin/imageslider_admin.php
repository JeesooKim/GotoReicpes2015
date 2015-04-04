<?php  include "C:/wamp/www/GotorecipesGITHUB/GotoReicpes2015/config.php";  ?>


<?php
require_once( SITEROOT.PATH_DATABASE);  
require(SITEROOT.PATH_MODEL_IMAGESLIDERS);
require(SITEROOT.PATH_MODEL_IMAGESLIDER_DB);

//delete option
if(isset($_POST['image_id'])){
$img_id = $_POST['image_id'];
ImagesliderDB::deleteImageslider($img_id);
    header("Location: imageslider_admin.php");
}
?>

<?php include PATH_HEADER;    ?>
<!--end top-->

<div id="main">
    <ol class="breadcrumb">
        <li><a href="<?php echo PATH_VIEW_ADMIN; ?>/index.php">Admin Panel</a></li>        
        <li class="active">Imageslider</li>
    </ol>

    <article>
        <a href="imageslider_insert.php">Add new image</a>
    </article>

    <table class="table table-responsive table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Image</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $imagesliders = ImagesliderDB::getImagesliders();
        foreach ($imagesliders as $row):
            ?>
            <tr>
                <td><?php echo $row->getName(); ?></td>
                <td width="500px"><?php echo "<img style='width: 300px' src='".$row->getPath()."' />" ?></td>
                <td>
                    <a class="btn-link" href="imageslider_update.php?image_id=<?php echo $row->getImageID(); ?>">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                </td>
                <td>
                    <form action="imageslider_admin.php" method="post">
                        <input type="hidden" name="image_id" value="<?php echo $row->getImageID(); ?>"/>
                        <button class="btn-link" type="submit" value="delete"  onclick="return confirm('Are you sure you want to delete this?');">
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div><!--End of main-->

<?php
    include PATH_FOOTER;   
?>
                
