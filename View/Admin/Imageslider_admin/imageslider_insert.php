<?php
require('../../../model/database.php');
require('../../../model/imagesliders.php');
require('../../../model/imageslider_db.php');

if(isset($_POST['imageslider_insert'])){
    $image_name = $_POST['image_name'];
    $image_description = $_POST['image_description'];
    $image_image = $_POST['image_image'];
    $image_date = $_POST['image_date'];
    

    if($image_name != ' ' || $image_description != ' ' || $image_image !=' ' || $image_date !=' '){
        $imageslider = new Slideshow($image_name, $image_description, $image_image, $image_date);
        ImagesliderDB::addImageslider($imageslider);
        header("Location: imageslider_admin.php");
    }
    else{
        echo  'Missing data fields.';
        exit();
    }
}
?>

<?php include('../../../view/shared/header.php'); ?>
<ol class="breadcrumb">
        <li><a href="../../../View/Admin/index.php">Admin Panel</a></li>
        <li><a href="../../../View/Admin/GoogleMap_admin/imageslider_admin.php">Imageslider</a></li>
        <li class="active">Insert</li>
    </ol>

<div id="main">
    <h1>Insert an image</h1>

    <form action="imageslider_insert.php" method="post">
        <div class="form-group">
            <label for="image_name">Name</label>
            <input type="text" class="form-control" name="image_name">
        </div>

        <div class="form-group">
            <label for="image_description">Description</label>
            <textarea class="form-control" name="image_description"></textarea>
        </div>

        <div class="form-group">
            <!--inserting image file in here-->
            <label for="image_image">Image</label>
            <input type="file" class="form-control" name="image_image">
        </div>

        <div class="form-group">
            <label for="image_date">Date</label>
            <!--input date here-->
        </div>
        <button type="submit" class="btn btn-primary" name="imageslider_insert">Submit</button>
        <a class="btn btn-default" href="imageslider_admin.php">Back to list</a>
    </form>
</div><!-- /main -->

<?php
include '../../Shared/footer.php';
?>