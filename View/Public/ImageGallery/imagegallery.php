<?php  include "c:/xampp/htdocs/GotoReicpes2015/config.php";  ?>

<?php include PATH_HEADER;  ?>  
<!--end top-->

<?php
require_once( SITEROOT.PATH_DATABASE);   //SERVER ROOT is not working but SITEROOT is working ......why?
require_once( SITEROOT.PATH_MODEL_CATEGORY);
require_once( SITEROOT.PATH_MODEL_CATEGORY_DB);
require_once( SITEROOT.PATH_MODEL_IMAGEGALLERY);
require_once( SITEROOT.PATH_MODEL_IMAGEGALLERY_DB);


#File name: imagegallery.php
#File for Image Gallery-Public
#Team Project: gotorecipes
#Author: Jeesoo Kim
#March 2015
#Reference: Class material -PDO Class

//connect to db
//bring data here
//images are stored in content/images and each image has its own path
//display the data

//For selected images....depending on category,    list of images will be rendered.
//get the imagesobject,,,ImageGalleryDB::getPath()

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_view_images';
}

if ($action == 'list_view_images') {
    if(!isset($_GET['category_id'])) {
        $category_id = 1;
    }else
    {
       $category_id = $_GET['category_id'];   
    }

    $current_category = CategoryDB::getCategory($category_id);
    $categories = CategoryDB::getCategories();
    $images = ImageGalleryDB::GetImagesByCategory($category_id);
    //images under a selected/current category

include('image_list_view.php');
}
?>
