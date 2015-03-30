<?php
require('../../../model/database.php');
require('../../../model/imagesliders.php');
require('../../../model/imageslider_db.php');

//delete option
if(isset($_POST['image_id'])){
$img_id = $_POST['image_id'];
ImagesliderDB::deleteImageslider($img_id);
    header("Location: imageslider_admin.php");
}
?>

<?php include('../../../view/shared/header.php'); ?>
<div id="main">
    <ol class="breadcrumb">
        <li><a href="../../../View/Admin/index.php">Admin Panel</a></li>
        <li class="active">Imageslider</li>
    </ol>

    <article>
        <a href="imageslider_insert.php">Add new image</a>
    </article>

    <table class="table table-responsive table-bordered">
        <thead>
        <tr>
            <th>Image ID</th>
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
                <td><?php echo $row->getImageID(); ?></td>
                <td><?php echo $row->getName(); ?></td>
                <td><?php echo $row->getPath(); ?></td>
                <td>
                    <a class="btn-link" href="imageslider_update.php?id=<?php echo $row->getImageID(); ?>">
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
require('../../../view/shared/footer.php');
?>
                