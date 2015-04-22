<?php
require_once( '../../../Model/database.php');
require_once( '../../../Model/category.php');
require_once( '../../../Model/category_db.php');
require_once( '../../../Model/imagegallery.php');
require_once( '../../../Model/imagegallery_db.php');

#File name: index.php
#File for Image Gallery-Admin
#Team Project: PHP project-gotorecipes.com
#Author: Jeesoo Kim @Humber College 2015
#Created: March 16 2015
#Modified: March 25,2015
#Reference: Class material -PDO Class


error_reporting();
$error = '';

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_images';  //when this page is loaded for the first time, assign 'list_images' string to $action
}
//'action' is the name of the hidden type input under a form from 'image_upload.php' 

if ($action == 'list_images') { //when the page is loaded for the first time
// First thing to do is to get the category id
// 
    // Get the current category ID
    if (!isset($_GET['category_id'])) {
        $category_id = 1; //default category id=1 (when the category is not been set/selected
    } else {
        $category_id = $_GET['category_id'];
    }
    // Get image and category data
    $current_category = CategoryDB::getCategory($category_id);   //Category object having name and id properties
    $categories = CategoryDB::getCategories();
    $images = ImageGalleryDB::GetImagesByCategory($category_id);

    // Display the image list
    include('image_list.php');
}
// ------------------- DELETE image---------------------
else if ($action == 'delete_image') {
    // Get the IDs
    $img_id = $_POST['image_id'];
    $category_id = $_POST['category_id'];

    // Delete the image
    ImageGalleryDB::deleteImage($img_id);

    // Display the Image List page for the current category
    header("Location: .?category_id=$category_id");
}
// ------------------- EDIT image--------------------
//******************Editing Image Gallery starts ******************//
else if ($action == 'show_edit_form') {
    // this action is triggered by line 50 of image_list.php 
    // Get the IDs
    //gets the id of the selected image
    $img_id = $_POST['image_id'];
    //get the category of the selected image
    $category_id = $_POST['category_id'];
    //the category object of the selected image to get the name of the category below
    $current_category = CategoryDB::getCategory($category_id);
    //name of the current category for the selected image
    $category_name = $current_category->getCatName();

    $categories = CategoryDB::getCategories();
    $image = ImageGalleryDB::GetImage($img_id);

    //including the following file to get the form for editing
    include('image_edit.php');
} else if ($action == 'Edit_Image') {

    $img_id = $_POST['image_id'];   //gets the id of the image
    $category_id = $_POST['category_id']; //gets the category id of the image
    $current_category = CategoryDB::getCategory($category_id);   //Category object having name and id properties for the selected image
    $category_name = $current_category->getCatName(); //category name for the selected image

    $image = ImageGalleryDB::GetImage($img_id);
    $img_path = $image->getPath();
    $img_size = $image->getSize();

    $img_title = $_POST['img_title'];
    $img_key = $_POST['img_key'];
    $img_detail = $_POST['img_detail'];
    $img_author = $_POST['img_author'];
    $img_source = $_POST['img_source'];
    $img_edit_filename = $_POST['img_filename'];  //file name from the edit page, 
    $img_new_filename = basename($_FILES['file_upload']['name']); //get the file name if there is any file browsed for uploading


    /*     * ******* Required field validation ******** */
    if ($img_title === NULL || empty($img_title)) {
        $error .= "Please enter the title of the image.";
    }
    if ($img_key === NULL || empty($img_key)) {
        $error .= "Please enter the key ingredient for the image file.";
    }
    /*     * **** required field validaton (end) ************ */

    // if both are the same, new name is the same as the old one.
    //otherwise, the new name should be the one from the new one to be uploaded.    
    //when file upload is blank, that is the file should be the same as old on in DB
    //there should be no change in the file itself
    //$image_filename_from_DB == $img_filename) 
    //$img_filename = $image_filename_from_DB;
    if ($img_new_filename === NULL || empty($img_new_filename)) {
        $img_filename = $img_edit_filename; //new image file name is to be replaced by the name in edit page if any
        //in order to get the value for $img_type, the followings are needed
        $dir = PATH_UPLOADS_IMAGES . '/';
        $img_file_path = $dir . $category_name . "/" . $img_filename;
        $img_type = pathinfo($img_file_path, PATHINFO_EXTENSION);  //holds the file extension of the file  
//        
//        $fp      = fopen($t_name, 'r');
//        $img_content = fread($fp, filesize($t_name));
//        $img_content = addslashes($img_content);
//        fclose($fp);

        if (!get_magic_quotes_gpc()) {
            $img_filename = addslashes($img_filename);
        }

        ImageGalleryDB::editImage($img_id, $img_title, $img_key, $img_detail, $img_filename, $img_path, $img_size, $img_type, $img_author, $img_source, $category_id);

        // Display the Image List page for the current category
        header("Location: .?category_id=$category_id");
    } else {
        //when file to be uploaded is not blank/null
        //should upload the new one.
        //the following are when uploading a new file.
        //$img_filename = basename($_FILES['file_upload']['name']); //image file name to be newly uploaded     
        $img_filename = $img_new_filename;
        $t_name = $_FILES['file_upload']['tmp_name'];
        $dir = PATH_UPLOADS_IMAGES . '/';    //specifies the directory where the file is going to be placed,
        $img_path = $dir . $category_name . "/";
        $img_file_path = $dir . $category_name . "/" . $img_filename;
        $img_size = $_FILES["file_upload"]["size"];
        $img_type = pathinfo($img_file_path, PATHINFO_EXTENSION);  //holds the file extension of the file  
        // $fp      = fopen($t_name, 'r');
        // $img_content = fread($fp, filesize($t_name));
        // $img_content = addslashes($img_content);
        // fclose($fp);

        if (!get_magic_quotes_gpc()) {
            $img_filename = addslashes($img_filename);
        }

        /*         * ************   Image File Validation*************** */
        //$uploadOk is the variable to store the validation result.   True/False
        $isImage = ImageFileValidation::isImage($t_name);
        $doesExist = ImageFileValidation::doesExist($img_file_path); //value will be overwritten
        $sizeCheck = ImageFileValidation::sizeCheck($img_size);
        $formatCheck = ImageFileValidation::formatCheck($img_type);

        if ($isImage && $doesExist && $sizeCheck && $formatCheck) {
            $uploadOK = true;
        } else {
            $uploadOK = false;
        }
        /*         * ********** end of  ImageFile Validation (EDIT)********** */

        if (!$uploadOK) {
            $error .= ImageFileValidation::$error;
            $error .= "Sorry, your file was not uploaded.";

            //header("Location: .?category_id=$category_id");
            //include( PATH_ERRORS . '/error_uploading.php');  
            echo $error;
        } else if ($uploadOK) {

            if (move_uploaded_file($t_name, "$img_file_path")) {

                $pathToImages = $img_path;
                $pathToThumbs = $img_path . "thumbnails/";
                $thumbWidth = 150;   //in dpi              
                ImageEdit::CreateThumbs($pathToImages, $pathToThumbs, $thumbWidth);
                ImageGalleryDB::editImage($img_id, $img_title, $img_key, $img_detail, $img_filename, $img_path, $img_size, $img_type, $img_author, $img_source, $category_id);

                // Display the Image List page for the current category
                header("Location: .?category_id=$category_id");
            } else {
                $error.= 'Image FIle upload fail.<br/>';
            }
        }//end of else if($uploadOK) 
    } //end of uploading a file in EDIT page     
}  //******************Editing Image Gallery ends ******************//
else if ($action == 'show_upload_form') {

    //************Uploading (Inserting) Image Gallery starts ***********//    
    $categories = CategoryDB::getCategories();

    include('image_upload.php');
} else if ($action == 'Upload Image') {

    $category_id = $_POST['category_id'];
    $current_category = CategoryDB::getCategory($category_id);   //Category object having name and id properties
    $category_name = $current_category->getCatName();

    $img_title = $_POST['img_title'];
    $img_key = $_POST['img_key'];
    $img_detail = $_POST['img_detail'];
    $img_author = $_POST['img_author'];
    $img_source = $_POST['img_source'];

    $img_filename = basename($_FILES['file_upload']['name']);
    $t_name = $_FILES['file_upload']['tmp_name'];
    $dir = PATH_UPLOADS_IMAGES . '/';    //specifies the directory where the file is going to be placed,
    $img_path = $dir . $category_name . "/";
    $img_file_path = $dir . $category_name . "/" . $img_filename;

    $img_size = $_FILES["file_upload"]["size"];
    $img_type = pathinfo($img_file_path, PATHINFO_EXTENSION);  //holds the file extension of the file
    //$img_type=$_FILES['file_upload']['type'];
    //http://www.php-mysql-tutorial.com/wikis/mysql-tutorials/uploading-files-to-mysql-database.aspx    
    $fp = fopen($t_name, 'r');
    $img_content = fread($fp, filesize($t_name));
    $img_content = addslashes($img_content);
    fclose($fp);

    if (!get_magic_quotes_gpc()) {
        $img_filename = addslashes($img_filename);
    }
    //http://www.w3schools.com/php/php_file_upload.asp
    //check if image file is an actual image or fake one
    //echo "Image type $img_type";

    /*     * ******* Required field validation ******** */
    if ($img_title === NULL || empty($img_title)) {
        $error .= "Please enter the title of the image.";
    }
    if ($img_key === NULL || empty($img_key)) {
        $error .= "Please enter the key ingredient for the image file.";
    }
    /*     * **** required field validaton (end) ************ */

    /*     * ************   Image File Validation*************** */
    //$uploadOk is the variable to store the validation result.   True/False
    $isImage = ImageFileValidation::isImage($t_name);
    $doesExist = ImageFileValidation::doesExist($img_file_path); //value will be overwritten
    $sizeCheck = ImageFileValidation::sizeCheck($img_size);
    $formatCheck = ImageFileValidation::formatCheck($img_type);

    if ($isImage && $doesExist && $sizeCheck && $formatCheck) {
        $uploadOK = true;
    } else {
        $uploadOK = false;
    }
    /*     * *************** end of  ImageFile Validation ******************* */

    //Depending on the result of the above validation, do the following.
    //Check if $uploadOK is set to 0 by an error             
    if (!$uploadOK) {
        $error .= "Sorry, your file was not uploaded.";
        //include(PATH_ERRORS. '/error.php');    
        echo $error;
    } else if ($uploadOK) {
        // if everything is ok, try to upload file        
        //$current_category = CategoryDB::getCategory($category_id);       
        //$current category...is a category Object...not a string         
        $imageObj = new ImageGallery($img_title, $category_id, $img_key, $img_detail, $img_filename, $img_file_path, $img_size, $img_type, $img_author, $img_source);

        if (move_uploaded_file($t_name, "$img_file_path")) {
            //move_uploaded_file — Moves an uploaded file to a new location
            //bool move_uploaded_file ( string $filename , string $destination )              
            $pathToImages = $img_path;
            $pathToThumbs = $img_path . "thumbnails/";
            $thumbWidth = 100;   //in dpi              
            ImageEdit::CreateThumbs($pathToImages, $pathToThumbs, $thumbWidth);
            ImageGalleryDB::addImage($imageObj);

            // Display the Image List page for the current category
            header("Location: .?category_id=$category_id");
        } else {
            $error.= 'Moving file_upload fail.<br/>';
        }
    }
    //******************Uploading (Inserting) Image Gallery ends ******************//
    //Ref: http://www.w3schools.com/php/php_file_upload.asp  Feb 25,2015
}
?>