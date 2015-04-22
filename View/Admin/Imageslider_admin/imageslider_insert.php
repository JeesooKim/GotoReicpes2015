<?php
require_once( PATH_DATABASE);  
require(PATH_MODEL_IMAGESLIDERS);
require(PATH_MODEL_IMAGESLIDER_DB);

//declaring variables from input
if(isset($_POST['submit'])){
    //text field name variable
    $img_name = $_POST['img_name'];
    
    
    $filename = basename($_FILES['image']['name']);
    $file_type = $_FILES['image']['type'];
    $file_size = $_FILES['image']['size'];
    $file_error = $_FILES['image']['error'];
    
    //validate file extension (ensures file is image)
    if($_FILES['image']['type'] != 'image/jpeg'
    &&  $_FILES['image']['type'] != 'image/jpg'
    &&  $_FILES['image']['type'] != 'image/gif'
    && $_FILES['image']['type'] != 'image/png')
    {
         echo "Please upload only Image file";
         exit();
    }
    
    //handles error
    if($file_error > 0){
        echo "Error : ";
        switch($file_error){
            case 1:
                echo "File exceeded upload_max_filesize";
                break;
            case 2:
                echo "File exceeded max_filesize";
                break;
            case 3:
                echo "File partially uploaded";
                break;
            case 4:
                echo "No file uploaded";
                break;
        }
    }
    
    //handle file size. Max size 5MB
    $max_file_size = 50000000;
    if($file_size > $max_file_size){
        echo "File size should not exceed 2mb";
        exit();
    }
    
    //tmp folder
    $t_name = $_FILES['image']['tmp_name'];
    //declaring the folder to be uploaded into
    $dir = PATH_IMAGES_IMAGESLIDER;
    //this is the path of the specific image uploaded
    //$path is to be inserted into db
    $img_path = $dir . "/" . $filename;
    
    if($img_name != ' ' || $img_path != ' '){
    //validating the file being uploaded from tmp folder to $dir folder
    if(move_uploaded_file($t_name,$dir . "/" . $filename)){
        //here we are storing the image name and file name to the db (not the path)
        $imageslider = new Imageslider($img_name, $filename);
        ImagesliderDB::addImageslider($imageslider);
        header("Location: imageslider_admin.php");
    }else{
        echo 'Upload failed.';
    }
    
    }
}
?>
<?php include '../../Shared/header-admin.php';    ?>
<!--end top-->
<ol class="breadcrumb">
        <li><a href="<?php echo PATH_VIEW_ADMIN; ?>/index.php">Admin Panel</a></li>
        <li><a href="<?php echo PATH_VIEW_ADMIN; ?>/Imageslider_admin/imageslider_admin.php">Imageslider</a></li>
        <li class="active">Insert</li>
    </ol>

<div id="main">
    <h1>Insert a branch</h1>
    <form action="imageslider_insert.php" method="POST" enctype="multipart/form-data">
        
        <div class="form-group">
            <label for="img_name">Name</label>
            <input type="text" class="form-control" name="img_name">
        </div>
        
        File:
        <input type="file" name="image" id="image" />
        <input type="submit" name="submit" value="Upload" />
        <p>Must be less than 5MB. Only JPG, GIF and PNG files.</p>
        
        <a class="btn btn-default" href="imageslider_admin.php">Back to list</a>
    </form>
    
</div>
<?php include '../../Shared/footer-admin.php'; ?>