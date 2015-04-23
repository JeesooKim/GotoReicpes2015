<?php
require_once( '../../../Model/database.php');
require_once( '../../../Model/imagesliders.php');
require_once( '../../../Model/imageslider_db.php');

$img_id = "";
if(isset($_GET['image_id'])) {
    $img_id = $_GET['image_id'];
} elseif(isset($_POST['image_id'])) {
    $img_id = $_POST['image_id'];
}
$imageslider = ImagesliderDB::getImageslider($img_id);
$img_id = $imageslider->getImageID();
$img_name = $imageslider->getName();
$img_path = $imageslider->getPath();

if (isset($_POST['imageslider_update'])) {
    $img_id = $_POST['image_id'];
    //text field name variable
    $img_name = $_POST['img_name'];
    
    
    //image name being uploaded
    $filename = basename($_FILES['image']['name']);
    //tmp folder
    $t_name = $_FILES['image']['tmp_name'];
    //declaring the folder to be uploaded into
    $dir = PATH_IMAGES_IMAGESLIDER;
    //this is the path of the specific image uploaded
    //$path is to be inserted into db
    $img_path = $dir . "/" . $filename;
        
    // Validate the entered data
    //if ($img_id != '' || $img_name != '' || $img_path != '') {
        if(move_uploaded_file($t_name,$dir . "/" . $filename)){
            $imageslider = new Imageslider($img_name, $img_path);
            ImagesliderDB::updateImageslider($imageslider, $img_id);
            header("Location: imageslider_admin.php");
    }else{
        echo "Missing fields.";
        exit(); 
   }
}
//}
?>

<!--Update form-->
<?php include '../../Shared/_Layout/header-admin.php';    ?>
<!--end top-->


    <div id="sidebar">
       <?php include '../../Shared/_Layout/side-menu.php';  ?> 
    </div> <!-- end of #sidebar -->
<!--end top-->
<div id="main">
    <ol class="breadcrumb">
        <li><a href="../index.php">Admin Panel</a></li>
        <li><a href="../Imageslider_admin/imageslider_admin.php">Image list</a></li>
        <li class="active">Update Image</li>
    </ol>
    
    <h1>Update this image</h1>

    <form action="imageslider_update.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="image_id" value="<?php echo $_GET['image_id']; ?>" />
        
        <div class="form-group">
            <label for="img_name">Name</label>
            <input type="text" value="<?php echo $img_name; ?>" class="form-control" name="img_name">
        </div>
        
        <div class="form-group">
            <img style="width:650px;" src="<?php echo '../../../Content/uploads/images/imageslider/'.  $img_path; ?>" alt="<?php echo $img_name; ?>" title="<?php echo $img_name; ?>" />
            <input type="file" name="image" id="image" />
            <input type="submit" name="imageslider_update" value="Update" />
            <p>Must be less than 512kb. Only JPG, GIF and PNG files.</p>
        </div>
        
        <a class="btn btn-default" href="imageslider_admin.php">Back to list</a>
    </form>
</div>
<!--End of update form-->

<?php include '../../Shared/_Layout/footer-admin.php'; ?>
         
