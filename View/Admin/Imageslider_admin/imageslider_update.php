<?php
require('../../../model/database.php');
require('../../../model/imagesliders.php');
require('../../../model/imageslider_db.php');

if(isset($_GET['imageId'])) {
    $image_id = $_GET['imageId'];
} else {
    $image_id = $_POST['image_id'];
}
$imageslider = ImagesliderDB::getImageslider($image_id);
$image_id = $imageslider->getImageID();
$imageslider_name = $imageslider->getName();
$imageslider_description = $imageslider->getDescription();
$imageslider_image = $imageslider->getImage();
$imageslider_date = $imageslider->getDate();

if (isset($_POST['imageslider_update'])) {
    $image_id = $_POST['image_id'];
    $imageslider_name = $_POST['image_name'];
    $imageslider_description = $_POST['image_description'];
    $imageslider_image = $_POST['image_image'];
    $imageslider_date = $_POST['image_date'];

    // Validate the entered data
    if ($image_id != '' || $imageslider_name != '' || $imageslider_description != '' || $imageslider_image != '' || $imageslider_date !='') {
        $imageslider = new Slideshow($imageslider_name, $imageslider_description, $imageslider_image, $imageslider_date);

        locationDB::UpdateLocation($imageslider, $image_id);

        header("Location: imageslider_admin.php");
    }else{
        echo "Missing fields.";
        exit(); 
   }
}
?>

<!--Update form-->
<?php include('../../../view/shared/header.php'); ?>
<div>
    <h1><?php echo $imageslider_name; ?></h1>

    <form action="imageslider_update.php" method="POST">
        <input type="hidden" name="image_id" value="<?php echo $image_id; ?>" />
        <div class="form-group">
            <label for="image_name">Name</label>
            <input type="text" value="<?php echo $imageslider_name; ?>" class="form-control" name="image_name">
        </div>
        <div class="form-group">
            <label for="image_description">Description</label>
            <input type="text" value="<?php echo $imageslider_description; ?>" class="form-control" name="image_description">
        </div>
        
        <div class="form-group">
            <label for="image_image">Image</label>
            <input type="file" value="<?php echo $imageslider_image; ?>" class="form-control" name="image_image">
        </div>
        
        <div class="form-group">
            <label for="image_date">Date</label>
            <input type="text" value="<?php echo $imageslider_date; ?>" class="form-control" name="image_date">
        </div>
        
        <button type="submit" class="btn btn-primary" name="imageslider_update">Update</button>
        <a class="btn btn-default" href="imageslider_admin.php">Back to list</a>
    </form>
</div>
<!--End of update form-->

<?php
include '../../Shared/footer.php';
?>
         