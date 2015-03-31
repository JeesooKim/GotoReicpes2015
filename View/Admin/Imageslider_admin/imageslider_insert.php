<?php  include "c:/xampp/htdocs/GotoReicpes2015/config.php";  ?>
<?php
require_once( PATH_DATABASE);  
require(PATH_MODEL_IMAGESLIDERS);
require(PATH_MODEL_IMAGESLIDER_DB);

//declaring variables from input
if(isset($_POST['submit'])){
    //text field name variable
    $img_name = $_POST['img_name'];
    
    //image name being uploaded
    $filename = basename($_FILES['image']['name']);
    //tmp folder
    $t_name = $_FILES['image']['tmp_name'];
    //declaring the folder to be uploaded into
    $dir = PATH_IMAGES.'/imageslider';
    //this is the path of the specific image uploaded
    //$path is to be inserted into db
    $img_path = $dir . "/" . $filename;
    
    if($img_name != ' ' || $img_path != ' '){
    //validating the file being uploaded from tmp folder to $dir folder
    if(move_uploaded_file($t_name,$dir . "/" . $filename)){
        $imageslider = new Imageslider($img_name, $img_path);
        ImagesliderDB::addImageslider($imageslider);
        header("Location: imageslider_admin.php");
    }else{
        echo 'Upload failed.';
    }
    
    }
}
?>
<?php include PATH_HEADER;    ?>
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
        <p>Must be less than 512kb. Only JPG, GIF and PNG files.</p>
    </form>
    
</div>
<?php
     include PATH_FOOTER;   
?>