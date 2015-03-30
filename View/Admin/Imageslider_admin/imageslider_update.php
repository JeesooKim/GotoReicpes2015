<?php
require('../../../model/database.php');
require('../../../model/imagesliders.php');
require('../../../model/imageslider_db.php');

if(isset($_GET['image_id'])) {
    $img_id = $_GET['image_id'];
} else {
    $img_id = $_POST['image_id'];
}
$imageslider = ImagesliderDB::getImageslider($img_id);
$img_id = $imageslider->getImageID();
$img_name = $imageslider->getName();
$img_path = $imageslider->getPath();

if (isset($_POST['imageslider_update'])) {
    $img_id = $_POST['img_id'];
    //text field name variable
    $img_name = $_POST['img_name'];
    
    //image name being uploaded
    $filename = basename($_FILES['image']['name']);
    //tmp folder
    $t_name = $_FILES['image']['tmp_name'];
    //declaring the folder to be uploaded into
    $dir = '../../../Content/uploads/images/imageslider';
    //this is the path of the specific image uploaded
    //$path is to be inserted into db
    $img_path = $dir . "/" . $filename;

    // Validate the entered data
    if ($img_id != '' || $img_name != '' || $img_path != '') {
        if(move_uploaded_file($t_name,$dir . "/" . $filename)){
            $imageslider = new Imageslider($img_name, $img_path);
            ImagesliderDB::addImageslider($imageslider);
            header("Location: imageslider_admin.php");
    }else{
        echo "Missing fields.";
        exit(); 
   }
    }
}
?>

<!--Update form-->
<?php include('../../../view/shared/header.php'); ?>
<div>
    <h1><?php echo $img_name; ?></h1>

    <form action="imageslider_update.php" method="POST">
        <input type="hidden" name="image_id" value="<?php echo $img_id; ?>" />
        
        <div class="form-group">
            <label for="img_name">Name</label>
            <input type="text" value="<?php echo $img_name; ?>" class="form-control" name="img_name">
        </div>
        
        <div class="form-group">
            <label for="location_branch">File:</label>
            <img src="<?php echo $img_path; ?>" alt="<?php echo $img_name; ?>" title="<?php echo $img_name; ?>" />
            <input type="file" name="image" id="image" />
            <p>Must be less than 512kb. Only JPG, GIF and PNG files.</p>
        </div>
        
        <button type="submit" class="btn btn-primary" name="imageslider_update">Update</button>
        <a class="btn btn-default" href="imageslider_admin.php">Back to list</a>
    </form>
</div>
<!--End of update form-->

<?php
include '../../Shared/footer.php';
?>
         