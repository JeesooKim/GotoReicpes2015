<?php
require_once( '../../../Model/database.php');
require_once( '../../../Model/imagesliders.php');
require_once( '../../../Model/imageslider_db.php');

//delete option
if (isset($_POST['image_id'])) {
    $img_id = $_POST['image_id'];
    ImagesliderDB::deleteImageslider($img_id);
    header("Location: imageslider_admin.php");
}
?>

<?php include '../../Shared/_Layout/header-admin.php'; ?>
<!--end top-->

<?php include '../../Shared/_Layout/side-menu.php'; ?>

<?php
require_once( '../../../Model/database.php');
require_once( '../../../Model/imagesliders.php');
require_once( '../../../Model/imageslider_db.php');
?>

<article>
    <a href="imageslider_insert.php">Add new image</a>
</article>

<!--div id="content">
<!-- display a table of products -->
<table id="recipeTB" class="display">   
    <!-- table id="recipe_insert_table"    width="900" -->
    <thead bgcolor="#a8cb81" >                
        <tr style="font-variant:small-caps;font-style:normal;color:black;font-size:18px;">
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
                <td width="500px"><img style="width: 300px;" src="<?php echo '../../../Content/uploads/images/imageslider/' . $row->getPath(); ?>"/></td>
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

<?php include '../../Shared/_Layout/footer-admin.php'; ?>
                
